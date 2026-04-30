<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function users(Request $request)
    {
        $statuses = ['Active', 'Suspended', 'Pending Verification'];

        $query = User::query();

        if ($search = $request->query('q')) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('id', 'like', "%{$search}%");
            });
        }

        if ($status = $request->query('status')) {
            if (in_array($status, $statuses, true)) {
                $query->where('status', $status);
            }
        }

        $sort = $request->query('sort', 'newest');
        if ($sort === 'alphabetical') {
            $query->orderBy('name');
        } else {
            $query->orderByDesc('created_at');
        }

        $users = $query->paginate(10)->withQueryString();
        $totalUsers = User::count();

        $users->getCollection()->transform(function (User $user) {
            $user->contracts = rand(0, 14);
            $user->status = $user->status ?: 'Active';
            return $user;
        });

        return view('admin.GestionUtilisateur', compact('users', 'totalUsers', 'statuses'));
    }

    public function show(User $user)
    {
        $statuses = ['Active', 'Suspended', 'Pending Verification'];
        return view('admin.user_show', compact('user', 'statuses'));
    }

    public function create()
    {
        $statuses = ['Active', 'Suspended', 'Pending Verification'];

        return view('admin.user_create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
            'status' => ['required', 'in:Active,Suspended,Pending Verification'],
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'New user created successfully.');
    }

    public function edit(User $user)
    {
        $statuses = ['Active', 'Suspended', 'Pending Verification'];

        return view('admin.user_edit', compact('user', 'statuses'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'status' => ['required', 'in:Active,Suspended,Pending Verification'],
        ]);

        $user->update($data);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', "{$user->name} was deleted successfully.");
    }

    public function toggleStatus(User $user)
    {
        $user->status = $user->status === 'Suspended' ? 'Active' : 'Suspended';
        $user->save();

        return redirect()->route('admin.users.index')->with('success', "{$user->name} is now {$user->status}.");
    }

    /**
     * Payment tracking view for admin
     */
    public function payments(Request $request)
    {
        $query = \App\Models\Payment::with('bill')->orderByDesc('paid_at');

        if ($q = $request->query('q')) {
            $query->where(function ($qry) use ($q) {
                $qry->where('id', 'like', "%{$q}%")
                    ->orWhere('note', 'like', "%{$q}%");
            });
        }

        if ($status = $request->query('status')) {
            // simple status filter (example mapping)
            if (in_array($status, ['Success', 'Pending', 'Failed'], true)) {
                // assume payments with amount>1000 are 'Success' for demo
                if ($status === 'Success') {
                    $query->where('amount', '>', 1000);
                } elseif ($status === 'Pending') {
                    $query->where('amount', '<=', 1000);
                } elseif ($status === 'Failed') {
                    $query->where('amount', '<', 0);
                }
            }
        }

        $payments = $query->paginate(10)->withQueryString();
        $totalTransactions = \App\Models\Payment::count();

        $payments->getCollection()->transform(function ($p) {
            $p->display_id = sprintf('#FP-%s', str_pad($p->id, 7, '0', STR_PAD_LEFT));
            $p->user_name = $p->bill && $p->bill->contract ? ($p->bill->contract->title ?? 'Client') : 'Guest User';
            $p->email = 'no-reply@example.com';
            $p->amount_display = '$' . number_format($p->amount, 2);
            $p->method = $p->method ?: 'Card';
            $p->status_label = $p->amount > 0 ? 'Success' : 'Pending';
            return $p;
        });

        return view('admin.suivie-paiement', compact('payments', 'totalTransactions'));
    }

    /**
     * Export payments as CSV
     */
    public function exportPaymentsCsv(Request $request)
    {
        $query = \App\Models\Payment::with('bill')->orderByDesc('paid_at');

        if ($q = $request->query('q')) {
            $query->where(function ($qry) use ($q) {
                $qry->where('id', 'like', "%{$q}%")
                    ->orWhere('note', 'like', "%{$q}%");
            });
        }

        if ($status = $request->query('status')) {
            if (in_array($status, ['Success', 'Pending', 'Failed'], true)) {
                if ($status === 'Success') {
                    $query->where('amount', '>', 1000);
                } elseif ($status === 'Pending') {
                    $query->where('amount', '<=', 1000);
                } elseif ($status === 'Failed') {
                    $query->where('amount', '<', 0);
                }
            }
        }

        $filename = 'payments_' . date('Ymd_His') . '.csv';

        $callback = function () use ($query) {
            $out = fopen('php://output', 'w');
            fputcsv($out, ['ID', 'Display ID', 'User', 'Email', 'Amount', 'Date', 'Method', 'Status', 'Note']);

            $query->chunk(200, function ($payments) use ($out) {
                foreach ($payments as $p) {
                    $displayId = sprintf('#FP-%s', str_pad($p->id, 7, '0', STR_PAD_LEFT));
                    $user = $p->bill && $p->bill->contract ? ($p->bill->contract->title ?? 'Client') : 'Guest User';
                    $email = 'no-reply@example.com';
                    $amount = number_format($p->amount, 2);
                    $date = $p->paid_at ? $p->paid_at : $p->created_at;
                    $method = $p->method ?: 'Card';
                    $status = $p->amount > 0 ? 'Success' : 'Pending';
                    fputcsv($out, [$p->id, $displayId, $user, $email, $amount, $date, $method, $status, $p->note]);
                }
            });

            fclose($out);
        };

        return response()->stream($callback, 200, [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$filename}\"",
        ]);
    }

    /**
     * Export payments as PDF (uses Dompdf if installed, otherwise returns print view)
     */
    public function exportPaymentsPdf(Request $request)
    {
        $query = \App\Models\Payment::with('bill')->orderByDesc('paid_at');

        if ($q = $request->query('q')) {
            $query->where(function ($qry) use ($q) {
                $qry->where('id', 'like', "%{$q}%")
                    ->orWhere('note', 'like', "%{$q}%");
            });
        }

        $payments = $query->get();

        if (class_exists(\Dompdf\Dompdf::class)) {
            $html = view('admin.exports.payments_pdf', compact('payments'))->render();
            $dompdf = new \Dompdf\Dompdf();
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'landscape');
            $dompdf->render();
            $filename = 'payments_' . date('Ymd_His') . '.pdf';

            return response($dompdf->output(), 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => "attachment; filename=\"{$filename}\"",
            ]);
        }

        return view('admin.exports.payments_print', compact('payments'));
    }

    // Dashboard and other simple admin pages
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function invoices()
    {
        return view('admin.invoices');
    }

    public function analytics()
    {
        return view('admin.analytics');
    }

    public function help()
    {
        return view('admin.help');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
