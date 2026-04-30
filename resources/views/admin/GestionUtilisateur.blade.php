<!DOCTYPE html>
<html class="light" lang="en">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>User Management - FatoraPay Admin</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
                rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <script id="tailwind-config">
                tailwind.config = {
                        darkMode: "class",
                        theme: {
                                extend: {
                                        colors: {
                                                "primary": "#003d9b",
                                                "primary-container": "#0052cc",
                                                "secondary": "#006b5f",
                                                "secondary-container": "#9cefdf",
                                                "on-secondary-container": "#0b6f63",
                                                "background": "#f7f9fb",
                                                "surface-container-lowest": "#ffffff",
                                                "surface-container-low": "#f2f4f6",
                                                "error": "#ba1a1a",
                                                "error-container": "#ffdad6",
                                                "on-error-container": "#93000a"
                                        },
                                        fontFamily: {
                                                "headline": ["Manrope"],
                                                "body": ["Inter"]
                                        },
                                        borderRadius: { "DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px" },
                                },
                        },
                }
        </script>
        <style>
                body {
                        font-family: 'Inter', sans-serif;
                }

                h1,
                h2,
                h3 {
                        font-family: 'Manrope', sans-serif;
                }

                .material-symbols-outlined {
                        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                        vertical-align: middle;
                }
        </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-background text-slate-900">
        <aside
                class="fixed left-0 top-0 z-50 flex h-screen w-64 flex-col gap-2 border-r border-slate-200 bg-slate-50 p-4 text-sm font-medium tracking-wide">
                <div class="mb-8 flex items-center gap-3 px-2">
                        <div class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary text-white shadow-lg shadow-primary/20">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                        </div>
                        <div>
                                <div class="text-lg font-black tracking-tight text-blue-900">Fatora Admin</div>
                                <div class="text-[10px] uppercase tracking-widest text-slate-500">Management Console</div>
                        </div>
                </div>

                <nav class="flex-1 space-y-1">
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-blue-50/50 hover:text-blue-600"
                                href="{{ route('admin.dashboard') }}">
                                <span class="material-symbols-outlined">dashboard</span>
                                <span>Dashboard</span>
                        </a>
                        <a class="flex items-center gap-3 rounded-xl bg-white px-4 py-3 font-semibold text-blue-700 shadow-sm"
                                href="{{ route('admin.users.index') }}">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">group</span>
                                <span>Users</span>
                        </a>
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-blue-50/50 hover:text-blue-600"
                                href="{{ route('admin.invoices.index') }}">
                                <span class="material-symbols-outlined">receipt_long</span>
                                <span>Invoices</span>
                        </a>
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-blue-50/50 hover:text-blue-600"
                                href="{{ route('admin.payments.index') }}">
                                <span class="material-symbols-outlined">payments</span>
                                <span>Payments</span>
                        </a>
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-blue-50/50 hover:text-blue-600"
                                href="{{ route('admin.analytics.index') }}">
                                <span class="material-symbols-outlined">insights</span>
                                <span>Analytics</span>
                        </a>
                </nav>

                <div class="mt-auto space-y-1 border-t border-slate-200 pt-4">
                        <div class="mb-2 flex items-center gap-2 rounded-lg bg-secondary-container/30 px-4 py-2 text-[11px] font-bold text-secondary">
                                <span class="h-2 w-2 rounded-full bg-secondary"></span>
                                System Status: Healthy
                        </div>
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-blue-50/50 hover:text-blue-600"
                                href="{{ route('admin.help') }}">
                                <span class="material-symbols-outlined">help</span>
                                <span>Help Center</span>
                        </a>
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-error-container/20 hover:text-error"
                                href="{{ route('admin.logout') }}">
                                <span class="material-symbols-outlined">logout</span>
                                <span>Logout</span>
                        </a>
                </div>
        </aside>

        <main class="ml-64 min-h-screen w-[calc(100%-16rem)] min-w-0">
                <header
                        class="sticky top-0 z-40 flex w-full items-center justify-between border-b border-slate-100 bg-white/80 px-8 py-3 font-semibold tracking-tight text-blue-800 backdrop-blur-md">
                        <h1 class="text-xl font-bold tracking-tight text-green-900">FatoraPay Admin</h1>
                        <div class="flex items-center gap-4">
                                <button class="relative rounded-full p-2 text-slate-500 transition-colors hover:bg-slate-100">
                                        <span class="material-symbols-outlined">notifications</span>
                                        <span class="absolute right-2 top-2 h-2 w-2 rounded-full border-2 border-white bg-error"></span>
                                </button>
                                <button class="rounded-full p-2 text-slate-500 transition-colors hover:bg-slate-100">
                                        <span class="material-symbols-outlined">settings</span>
                                </button>
                                <div class="mx-2 h-8 w-px bg-slate-200"></div>
                                <div class="flex items-center gap-3">
                                        <div class="hidden text-right sm:block">
                                                <p class="text-xs font-bold leading-none text-slate-900">Alex Rivera</p>
                                                <p class="text-[10px] font-medium text-slate-500">System Administrator</p>
                                        </div>
                                        <img alt="Admin profile avatar" class="h-9 w-9 rounded-full bg-slate-200 object-cover"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsPXtjNwxhSlUZrvgfUet-FCq4O0Tfcbx9ou50N6QYquFwT0pEMKvJi8bcVpZtvZLyCFq_ul-z-GN_lPpbweAtzCa913SbYb5S3QtoPD0K_n1p6vP-Xte0DNP2DYLB_bsR7Rm-Yy8HZZPxNEyLIZpy1vx0ptHJDf67R3S0nkPrlEQFx9BdguF2eNKrcD2gj0kR1zFlNgpCujvYFlsr3rxdbLYQi1jSh9-8lpMsEYrAxhRDSpSfVOMr8j_ugS6PQxMy0ehL2QgCsc51" />
                                </div>
                        </div>
                </header>

                <div class="mx-auto max-w-6xl space-y-9 px-8 py-16">
                        <div class="flex flex-col gap-5 md:flex-row md:items-end md:justify-between">
                                <div>
                                        <h2 class="text-3xl font-extrabold tracking-tight text-primary">User Management</h2>
                                        <p class="mt-1 font-medium text-slate-500">Oversee and manage your financial ecosystem members</p>
                                </div>
                                <a href="{{ route('admin.users.create') }}"
                                        class="inline-flex items-center gap-3 rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/20 transition-all hover:bg-blue-700">
                                        <span class="material-symbols-outlined">person_add</span>
                                        Invite New User
                                </a>
                        </div>

                        @if (session('success'))
                                <div class="rounded-2xl border border-green-200 bg-green-50 px-6 py-4 text-sm text-green-800">
                                        {{ session('success') }}
                                </div>
                        @endif

                        <form method="get" action="{{ route('admin.users.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <input type="hidden" name="sort" value="{{ request('sort', 'newest') }}" />
                                <div class="rounded-2xl bg-surface-container-low p-4 md:col-span-2">
                                        <div class="relative">
                                                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                                                        <span class="material-symbols-outlined">filter_list</span>
                                                </span>
                                                <input name="q" value="{{ request('q') }}"
                                                        class="w-full rounded-xl border-none bg-white py-3 pl-10 pr-12 text-sm focus:ring-2 focus:ring-primary/10"
                                                        placeholder="Filter by name, email or ID..." type="text" />
                                                <button type="submit"
                                                        class="absolute inset-y-0 right-3 inline-flex items-center justify-center rounded-full px-3 text-slate-500 transition-colors hover:text-slate-700">
                                                        <span class="material-symbols-outlined">search</span>
                                                </button>
                                        </div>
                                </div>
                                <div class="rounded-2xl bg-surface-container-low p-4">
                                        <select name="status" onchange="this.form.submit()"
                                                class="w-full rounded-xl border-none bg-white px-4 py-3 text-sm font-medium text-slate-700 focus:ring-2 focus:ring-primary/10">
                                                <option value="">All Account Status</option>
                                                @foreach ($statuses as $status)
                                                        <option value="{{ $status }}" {{ request('status') === $status ? 'selected' : '' }}>
                                                                {{ $status }}
                                                        </option>
                                                @endforeach
                                        </select>
                                </div>
                        </form>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                                <div class="overflow-x-auto">
                                        <table class="w-full min-w-[880px] border-collapse text-left">
                                                <thead>
                                                        <tr class="bg-slate-50/70">
                                                                <th class="border-b border-slate-100 px-8 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">User Name</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">Email Address</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-center text-[11px] font-black uppercase tracking-widest text-slate-400">Contracts</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">Registration</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">Status</th>
                                                                <th class="border-b border-slate-100 px-8 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-400">Actions</th>
                                                        </tr>
                                                </thead>
                                                @php
                                                        $statusClasses = [
                                                                'Active' => 'bg-secondary-container text-on-secondary-container',
                                                                'Suspended' => 'bg-error-container text-on-error-container',
                                                                'Pending Verification' => 'bg-slate-100 text-slate-700',
                                                        ];
                                                @endphp
                                                <tbody class="divide-y divide-slate-100">
                                                        @forelse ($users as $user)
                                                                <tr class="transition-colors hover:bg-slate-50/80">
                                                                        <td class="px-8 py-5">
                                                                                <div class="flex items-center gap-4">
                                                                                        <img class="h-10 w-10 rounded-full bg-primary/10"
                                                                                                alt="{{ $user->name }} avatar"
                                                                                                src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=3B82F6&color=ffffff&size=128" />
                                                                                        <div>
                                                                                                <div class="text-sm font-bold text-slate-900">{{ $user->name }}</div>
                                                                                                <div class="text-[10px] font-medium text-slate-400">ID: #FP-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</div>
                                                                                        </div>
                                                                                </div>
                                                                        </td>
                                                                        <td class="px-6 py-5">
                                                                                <span class="text-sm font-medium text-slate-600">{{ $user->email }}</span>
                                                                        </td>
                                                                        <td class="px-6 py-5 text-center">
                                                                                <span class="inline-flex h-8 w-8 items-center justify-center rounded-lg bg-slate-100 text-sm font-bold text-slate-700">{{ $user->contracts }}</span>
                                                                        </td>
                                                                        <td class="px-6 py-5">
                                                                                <div class="text-sm font-medium text-slate-600">{{ $user->created_at ? $user->created_at->format('M d, Y') : 'Unknown' }}</div>
                                                                        </td>
                                                                        <td class="px-6 py-5">
                                                                                <span class="rounded-full px-3 py-1 text-[10px] font-bold uppercase tracking-wider {{ $statusClasses[$user->status] ?? 'bg-slate-100 text-slate-700' }}">
                                                                                        {{ $user->status }}
                                                                                </span>
                                                                        </td>
                                                                        <td class="px-8 py-5 text-right">
                                                                                <div class="flex justify-end gap-2">
                                                                                        <a href="{{ route('admin.users.show', $user) }}"
                                                                                                class="rounded-lg p-2 text-slate-400 transition-all hover:bg-primary/5 hover:text-primary"
                                                                                                title="View Profile">
                                                                                                <span class="material-symbols-outlined text-[20px]">visibility</span>
                                                                                        </a>
                                                                                        <a href="{{ route('admin.users.edit', $user) }}"
                                                                                                class="rounded-lg p-2 text-slate-400 transition-all hover:bg-primary/5 hover:text-primary"
                                                                                                title="Edit">
                                                                                                <span class="material-symbols-outlined text-[20px]">edit</span>
                                                                                        </a>
                                                                                        <form method="POST" action="{{ route('admin.users.destroy', $user) }}" class="inline"
                                                                                                onsubmit="return confirm('Delete this user?');">
                                                                                                @csrf
                                                                                                @method('DELETE')
                                                                                                <button type="submit"
                                                                                                        class="rounded-lg p-2 text-slate-400 transition-all hover:bg-error/5 hover:text-error"
                                                                                                        title="Delete">
                                                                                                        <span class="material-symbols-outlined text-[20px]">delete</span>
                                                                                                </button>
                                                                                        </form>
                                                                                </div>
                                                                        </td>
                                                                </tr>
                                                        @empty
                                                                <tr>
                                                                        <td colspan="6" class="px-8 py-10 text-center text-sm font-medium text-slate-500">
                                                                                No users found.
                                                                        </td>
                                                                </tr>
                                                        @endforelse
                                                </tbody>
                                        </table>
                                </div>

                                <div class="flex flex-col gap-4 border-t border-slate-100 bg-slate-50/60 px-8 py-5 lg:flex-row lg:items-center lg:justify-between">
                                        <p class="text-[11px] font-bold uppercase tracking-wider text-slate-400">
                                                Showing {{ $users->firstItem() ?: 0 }} - {{ $users->lastItem() ?: 0 }} of {{ $totalUsers }} Users
                                        </p>
                                        <div class="flex flex-wrap items-center justify-center gap-1 lg:justify-end">
                                                @if ($users->onFirstPage())
                                                        <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-300">
                                                                <span class="material-symbols-outlined">chevron_left</span>
                                                        </span>
                                                @else
                                                        <a href="{{ $users->previousPageUrl() }}"
                                                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-100">
                                                                <span class="material-symbols-outlined">chevron_left</span>
                                                        </a>
                                                @endif

                                                @php
                                                        $currentPage = $users->currentPage();
                                                        $lastPage = $users->lastPage();
                                                        $start = max(1, $currentPage - 2);
                                                        $end = min($lastPage, $currentPage + 2);
                                                @endphp

                                                @if ($start > 1)
                                                        <a href="{{ $users->url(1) }}"
                                                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white font-bold text-slate-600 transition-colors hover:bg-slate-100">1</a>
                                                        @if ($start > 2)
                                                                <span class="px-2 text-slate-400">...</span>
                                                        @endif
                                                @endif

                                                @for ($page = $start; $page <= $end; $page++)
                                                        @if ($page === $currentPage)
                                                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary font-bold text-white shadow-sm">{{ $page }}</span>
                                                        @else
                                                                <a href="{{ $users->url($page) }}"
                                                                        class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white font-bold text-slate-600 transition-colors hover:bg-slate-100">{{ $page }}</a>
                                                        @endif
                                                @endfor

                                                @if ($end < $lastPage)
                                                        @if ($end < $lastPage - 1)
                                                                <span class="px-2 text-slate-400">...</span>
                                                        @endif
                                                        <a href="{{ $users->url($lastPage) }}"
                                                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white font-bold text-slate-600 transition-colors hover:bg-slate-100">{{ $lastPage }}</a>
                                                @endif

                                                @if ($users->hasMorePages())
                                                        <a href="{{ $users->nextPageUrl() }}"
                                                                class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-500 transition-colors hover:bg-slate-100">
                                                                <span class="material-symbols-outlined">chevron_right</span>
                                                        </a>
                                                @else
                                                        <span class="flex h-10 w-10 items-center justify-center rounded-xl border border-slate-200 bg-white text-slate-300">
                                                                <span class="material-symbols-outlined">chevron_right</span>
                                                        </span>
                                                @endif
                                        </div>
                                </div>
                        </div>
                </div>
        </main>
</body>

</html>
