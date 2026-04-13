<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
        $data['created_at'] = now();
        $data['updated_at'] = now();

        User::create($data);

        return redirect()->route('admin.users.index')->with('success', 'New user invited successfully.');
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
}
