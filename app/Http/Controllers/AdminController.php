<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function users(Request $request)
    {
        $query = User::query();

        if ($request->filled('q')) {
            $query->where(function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->q . '%')
                    ->orWhere('email', 'like', '%' . $request->q . '%')
                    ->orWhere('id', 'like', '%' . $request->q . '%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $users = $query->paginate(10)->withQueryString();

        $statusClasses = [
            'Active' => 'bg-secondary-container text-on-secondary-container',
            'Suspended' => 'bg-error-container text-on-error-container',
            'Pending Verification' => 'bg-slate-100 text-slate-600',
        ];

        return view('admin.GestionUtilisateur', [
            'users' => $users,
            'statusClasses' => $statusClasses,
            'totalUsers' => $users->total(),
        ]);
    }

    public function create()
    {
        $statuses = ['Active', 'Suspended', 'Pending Verification'];

        return view('admin.user_create', compact('statuses'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:8',
            'status' => 'required|in:Active,Suspended,Pending Verification',
        ]);

        $data['password'] = Hash::make($data['password']);

        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'New user created successfully.');
    }

    public function show(User $user)
    {
        return view('admin.user_show', compact('user'));
    }

    public function edit(User $user)
    {
        $statuses = ['Active', 'Suspended', 'Pending Verification'];

        return view('admin.user_edit', compact('user', 'statuses'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'status' => 'required|in:Active,Suspended,Pending Verification',
        ]);

        $user->update($data);

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function toggleStatus(User $user)
    {
        $user->status = $user->status === 'Suspended' ? 'Active' : 'Suspended';
        $user->save();

        return back()->with('success', 'User status updated successfully.');
    }
}
