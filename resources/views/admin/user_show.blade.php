<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>User Details - FatoraPay Admin</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap"
                rel="stylesheet" />
        <style>
                body {
                        font-family: 'Inter', sans-serif;
                }

                h1,
                h2,
                h3 {
                        font-family: 'Manrope', sans-serif;
                }
        </style>
</head>

<body class="bg-background text-on-background min-h-screen p-8">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 bg-surface-container-lowest">
                        <div class="flex items-center justify-between gap-4">
                                <div>
                                        <h1 class="text-2xl font-bold text-slate-900">User Profile</h1>
                                        <p class="text-sm text-slate-500">Details for {{ $user->name }}</p>
                                </div>
                                <a href="{{ route('admin.users.index') }}"
                                        class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-full font-semibold hover:bg-blue-700 transition">
                                        <span class="material-symbols-outlined">arrow_back</span>
                                        Back to users
                                </a>
                        </div>
                </div>
                <div class="px-8 py-8 space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="rounded-3xl bg-slate-50 p-6">
                                        <h2 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-4">User
                                        </h2>
                                        <p class="text-lg font-bold text-slate-900">{{ $user->name }}</p>
                                        <p class="text-sm text-slate-500">ID:
                                                #FP-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</p>
                                </div>
                                <div class="rounded-3xl bg-slate-50 p-6">
                                        <h2 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-4">
                                                Status</h2>
                                        <span
                                                class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold uppercase tracking-wider {{ $user->status === 'Active' ? 'bg-secondary-container text-on-secondary-container' : ($user->status === 'Suspended' ? 'bg-error-container text-on-error-container' : 'bg-slate-100 text-slate-600') }}">
                                                {{ $user->status }}
                                        </span>
                                </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="rounded-3xl bg-slate-50 p-6">
                                        <h2 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-4">
                                                Email</h2>
                                        <p class="text-sm text-slate-700">{{ $user->email }}</p>
                                </div>
                                <div class="rounded-3xl bg-slate-50 p-6">
                                        <h2 class="text-sm font-bold uppercase tracking-widest text-slate-400 mb-4">
                                                Registered</h2>
                                        <p class="text-sm text-slate-700">{{ $user->created_at->format('M d, Y') }}</p>
                                </div>
                        </div>
                        <div class="flex flex-wrap gap-3">
                                <a href="{{ route('admin.users.edit', $user) }}"
                                        class="bg-primary text-white px-5 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">Edit
                                        user</a>
                                <form method="POST" action="{{ route('admin.users.status', $user) }}" class="inline">
                                        @csrf
                                        <button type="submit"
                                                class="bg-slate-900 text-white px-5 py-3 rounded-xl font-semibold hover:bg-slate-700 transition">{{ $user->status === 'Suspended' ? 'Activate' : 'Suspend' }}</button>
                                </form>
                        </div>
                </div>
        </div>
</body>

</html>