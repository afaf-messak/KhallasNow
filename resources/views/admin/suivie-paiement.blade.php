<!DOCTYPE html>
<html class="light" lang="en">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Payment Tracking | FatoraPay Admin</title>
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
                                                "primary-fixed": "#002e7d",
                                                "primary-fixed-dim": "#b2c5ff",
                                                "on-primary": "#ffffff",
                                                "on-primary-fixed": "#001848",
                                                "secondary": "#006b5f",
                                                "secondary-container": "#9cefdf",
                                                "on-secondary-container": "#0b6f63",
                                                "surface": "#f7f9fb",
                                                "background": "#f7f9fb",
                                                "surface-container-lowest": "#ffffff",
                                                "surface-container-low": "#f2f4f6",
                                                "surface-container": "#eceef0",
                                                "surface-container-high": "#e6e8ea",
                                                "surface-variant": "#e0e3e5",
                                                "outline": "#737685",
                                                "on-surface": "#191c1e",
                                                "on-surface-variant": "#434654",
                                                "on-background": "#191c1e",
                                                "error": "#ba1a1a",
                                                "error-container": "#ffdad6",
                                                "on-error-container": "#93000a"
                                        },
                                        fontFamily: {
                                                "headline": ["Manrope"],
                                                "body": ["Inter"],
                                                "label": ["Inter"]
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
                h3,
                .font-headline {
                        font-family: 'Manrope', sans-serif;
                }

                .material-symbols-outlined {
                        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                        vertical-align: middle;
                }
        </style>
</head>

<body class="min-h-screen bg-background text-on-background">
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
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-blue-50/50 hover:text-blue-600"
                                href="{{ route('admin.users.index') }}">
                                <span class="material-symbols-outlined">group</span>
                                <span>Users</span>
                        </a>
                        <a class="flex items-center gap-3 rounded-xl px-4 py-3 text-slate-600 transition-all hover:bg-blue-50/50 hover:text-blue-600"
                                href="{{ route('admin.invoices.index') }}">
                                <span class="material-symbols-outlined">receipt_long</span>
                                <span>Invoices</span>
                        </a>
                        <a class="flex items-center gap-3 rounded-xl bg-white px-4 py-3 font-semibold text-blue-700 shadow-sm"
                                href="{{ route('admin.payments.index') }}">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">payments</span>
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

        <main class="ml-64 min-h-screen">
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
                                        <h2 class="text-3xl font-extrabold tracking-tight text-primary">Payment Management</h2>
                                        <p class="mt-1 font-medium text-slate-500">Track and export financial transactions</p>
                                </div>
                                <div class="flex flex-wrap gap-3">
                                        <a href="{{ route('admin.payments.export.pdf') }}@if(request()->getQueryString())?{{ request()->getQueryString() }}@endif"
                                                class="inline-flex items-center gap-2 rounded-xl bg-white px-5 py-3 text-sm font-bold text-slate-700 shadow-sm ring-1 ring-slate-100 transition-all hover:text-primary"
                                                target="_blank" rel="noopener">
                                                <span class="material-symbols-outlined text-lg">picture_as_pdf</span>
                                                PDF Export
                                        </a>
                                        <a href="{{ route('admin.payments.export.csv') }}@if(request()->getQueryString())?{{ request()->getQueryString() }}@endif"
                                                class="inline-flex items-center gap-2 rounded-xl bg-primary px-5 py-3 text-sm font-bold text-white shadow-lg shadow-primary/20 transition-all hover:bg-blue-700"
                                                target="_blank" rel="noopener">
                                                <span class="material-symbols-outlined text-lg">download</span>
                                                Export CSV
                                        </a>
                                </div>
                        </div>

                        <form method="get" action="{{ route('admin.payments.index') }}" class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <div class="rounded-2xl bg-surface-container-low p-4 md:col-span-2">
                                        <div class="relative">
                                                <span class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                                                        <span class="material-symbols-outlined">filter_list</span>
                                                </span>
                                                <input name="q" value="{{ request('q') }}"
                                                        class="w-full rounded-xl border-none bg-white py-3 pl-10 pr-12 text-sm focus:ring-2 focus:ring-primary/10"
                                                        placeholder="Filter by transaction ID or note..." type="text" />
                                                <button type="submit"
                                                        class="absolute inset-y-0 right-3 inline-flex items-center justify-center rounded-full px-3 text-slate-500 transition-colors hover:text-slate-700">
                                                        <span class="material-symbols-outlined">search</span>
                                                </button>
                                        </div>
                                </div>
                                <div class="rounded-2xl bg-surface-container-low p-4">
                                        <select name="status" onchange="this.form.submit()"
                                                class="w-full rounded-xl border-none bg-white px-4 py-3 text-sm font-medium text-slate-700 focus:ring-2 focus:ring-primary/10">
                                                <option value="">All Payment Status</option>
                                                <option value="Success" {{ request('status') === 'Success' ? 'selected' : '' }}>Success Only</option>
                                                <option value="Pending" {{ request('status') === 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="Failed" {{ request('status') === 'Failed' ? 'selected' : '' }}>Failed</option>
                                        </select>
                                </div>
                        </form>

                        <div class="overflow-hidden rounded-[2rem] border border-slate-100 bg-white shadow-sm">
                                <div class="overflow-x-auto">
                                        <table class="w-full min-w-[900px] border-collapse text-left">
                                                <thead>
                                                        <tr class="bg-slate-50/70">
                                                                <th class="border-b border-slate-100 px-8 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">Transaction</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">User</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-right text-[11px] font-black uppercase tracking-widest text-slate-400">Amount</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">Date</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">Method</th>
                                                                <th class="border-b border-slate-100 px-6 py-5 text-[11px] font-black uppercase tracking-widest text-slate-400">Status</th>
                                                                <th class="border-b border-slate-100 px-8 py-5 text-center text-[11px] font-black uppercase tracking-widest text-slate-400">Action</th>
                                                        </tr>
                                                </thead>
                                                <tbody class="divide-y divide-slate-100">
                                                        @forelse ($payments as $p)
                                                                @php
                                                                        $status = $p->status_label ?? ($p->amount > 0 ? 'Success' : 'Pending');
                                                                        $initials = collect(explode(' ', trim($p->user_name)))->filter()->map(fn($part) => substr($part, 0, 1))->take(2)->implode('');
                                                                @endphp
                                                                <tr class="transition-colors hover:bg-slate-50/60">
                                                                        <td class="px-8 py-5">
                                                                                <div class="font-mono text-xs font-bold text-primary">{{ $p->display_id }}</div>
                                                                                <div class="mt-1 text-[10px] font-bold uppercase tracking-wider text-slate-400">Payment ID: {{ $p->id }}</div>
                                                                        </td>
                                                                        <td class="px-6 py-5">
                                                                                <div class="flex items-center gap-3">
                                                                                        <div class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-blue-500 text-xs font-bold text-white">
                                                                                                {{ strtoupper($initials ?: 'GU') }}
                                                                                        </div>
                                                                                        <div>
                                                                                                <p class="text-sm font-bold leading-tight text-slate-950">{{ $p->user_name }}</p>
                                                                                                <p class="text-xs font-medium text-slate-500">{{ $p->email }}</p>
                                                                                        </div>
                                                                                </div>
                                                                        </td>
                                                                        <td class="px-6 py-5 text-right">
                                                                                <span class="text-sm font-extrabold text-slate-950">{{ $p->amount_display }}</span>
                                                                        </td>
                                                                        <td class="px-6 py-5">
                                                                                <p class="text-sm font-semibold text-slate-800">
                                                                                        {{ optional($p->paid_at)->format('M d, Y') ?? optional($p->created_at)->format('M d, Y') }}
                                                                                </p>
                                                                                <p class="text-[10px] font-bold uppercase tracking-wider text-slate-400">
                                                                                        {{ optional($p->paid_at)->format('H:i') ?? optional($p->created_at)->format('H:i') }}
                                                                                        GMT
                                                                                </p>
                                                                        </td>
                                                                        <td class="px-6 py-5">
                                                                                <div class="flex items-center gap-2 text-sm font-semibold text-slate-600">
                                                                                        <span class="material-symbols-outlined text-lg text-slate-400">credit_card</span>
                                                                                        {{ $p->method }}
                                                                                </div>
                                                                        </td>
                                                                        <td class="px-6 py-5">
                                                                                <span
                                                                                        class="inline-flex items-center rounded-full px-3 py-1 text-[10px] font-black uppercase tracking-wider {{ $status === 'Success' ? 'bg-secondary-container text-on-secondary-container' : ($status === 'Failed' ? 'bg-error-container text-on-error-container' : 'bg-slate-100 text-slate-700') }}">
                                                                                        {{ $status }}
                                                                                </span>
                                                                        </td>
                                                                        <td class="px-8 py-5 text-center">
                                                                                <a href="{{ route('admin.payments.index') }}?id={{ $p->id }}"
                                                                                        class="inline-flex h-9 w-9 items-center justify-center rounded-full text-slate-400 transition-colors hover:bg-blue-50 hover:text-primary">
                                                                                        <span class="material-symbols-outlined text-lg">visibility</span>
                                                                                </a>
                                                                        </td>
                                                                </tr>
                                                        @empty
                                                                <tr>
                                                                        <td colspan="7" class="px-8 py-12 text-center text-sm font-medium text-slate-500">
                                                                                No transactions found.
                                                                        </td>
                                                                </tr>
                                                        @endforelse
                                                </tbody>
                                        </table>
                                </div>

                                <div class="flex flex-col gap-3 border-t border-slate-100 bg-slate-50/60 px-8 py-4 sm:flex-row sm:items-center sm:justify-between">
                                        <p class="text-xs font-medium text-slate-500">
                                                Showing
                                                <span class="font-bold text-slate-900">{{ $payments->firstItem() ?: 0 }}-{{ $payments->lastItem() ?: 0 }}</span>
                                                of
                                                <span class="font-bold text-slate-900">{{ $totalTransactions }}</span>
                                                transactions
                                        </p>
                                        <div class="text-sm">
                                                {!! $payments->links() !!}
                                        </div>
                                </div>
                        </div>

                        <div class="grid grid-cols-1 gap-4 md:grid-cols-3">
                                <div class="rounded-2xl bg-primary p-5 text-white shadow-lg shadow-primary/20">
                                        <p class="text-[10px] font-black uppercase tracking-[0.18em] text-blue-100">Total Transactions</p>
                                        <p class="mt-4 text-3xl font-extrabold">{{ $totalTransactions }}</p>
                                </div>
                                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                                        <p class="text-[10px] font-black uppercase tracking-[0.18em] text-slate-400">Current Page</p>
                                        <p class="mt-4 text-3xl font-extrabold text-slate-950">{{ $payments->count() }}</p>
                                </div>
                                <div class="rounded-2xl border border-slate-100 bg-white p-5 shadow-sm">
                                        <p class="text-[10px] font-black uppercase tracking-[0.18em] text-slate-400">Active Filter</p>
                                        <p class="mt-4 text-xl font-extrabold text-slate-950">{{ request('status') ?: 'All Statuses' }}</p>
                                </div>
                        </div>
                </div>
        </main>
</body>

</html>
