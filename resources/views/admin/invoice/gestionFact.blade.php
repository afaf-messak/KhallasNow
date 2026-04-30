<!DOCTYPE html>
<html class="light" lang="en">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Invoice Management | KhallasNow Admin</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
                rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <script>
                tailwind.config = {
                        theme: {
                                extend: {
                                        colors: {
                                                primary: "#003d9b",
                                                "primary-container": "#0052cc",
                                                secondary: "#006b5f",
                                                "secondary-container": "#9cefdf",
                                                "on-secondary-container": "#0b6f63",
                                                background: "#f7f9fb",
                                                "surface-container-low": "#f2f4f6",
                                                "surface-container-high": "#e6e8ea",
                                                "surface-container-highest": "#e0e3e5",
                                                "on-surface": "#191c1e",
                                                "on-surface-variant": "#434654",
                                                error: "#ba1a1a",
                                                "error-container": "#ffdad6",
                                                "on-error-container": "#93000a"
                                        },
                                        fontFamily: {
                                                headline: ["Manrope"],
                                                body: ["Inter"]
                                        }
                                }
                        }
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

<body class="min-h-screen bg-background text-on-surface">
        <aside class="fixed left-0 top-0 z-50 flex h-screen w-64 flex-col gap-2 border-r border-slate-200 bg-slate-50 p-4 text-sm font-medium tracking-wide">
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
                        <a class="flex items-center gap-3 rounded-xl bg-white px-4 py-3 font-semibold text-blue-700 shadow-sm"
                                href="{{ route('admin.invoices.index') }}">
                                <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">receipt_long</span>
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

        <main class="ml-64 min-h-screen">
                <header class="sticky top-0 z-40 flex w-full items-center justify-between border-b border-slate-100 bg-white/80 px-8 py-3 backdrop-blur-md">
                        <form method="GET" action="{{ route('admin.invoices.index') }}" class="max-w-md flex-1">
                                <div class="relative">
                                        <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-slate-400">search</span>
                                        <input name="q" value="{{ request('q') }}"
                                                class="w-full rounded-xl border-none bg-slate-50 py-2 pl-10 pr-4 text-sm transition-all focus:ring-2 focus:ring-primary/20"
                                                placeholder="Search invoices or contracts..." type="text" />
                                </div>
                        </form>
                        <div class="ml-8 flex items-center gap-4">
                                <button class="rounded-full p-2 text-slate-500 transition-colors hover:bg-slate-100">
                                        <span class="material-symbols-outlined">notifications</span>
                                </button>
                                <a class="rounded-full p-2 text-slate-500 transition-colors hover:bg-slate-100" href="{{ route('admin.settings') }}">
                                        <span class="material-symbols-outlined">settings</span>
                                </a>
                                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-primary text-xs font-black text-white">AD</div>
                        </div>
                </header>

                <div class="space-y-8 p-8">
                        <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                                <div>
                                        <h1 class="text-4xl font-extrabold tracking-tight text-primary">Invoices & Contracts</h1>
                                        <p class="mt-1 font-medium text-on-surface-variant">Manage billing cycles and provider agreements.</p>
                                </div>
                                <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.invoices.index', ['status' => 'unpaid']) }}"
                                                class="flex items-center gap-2 rounded-xl bg-surface-container-high px-5 py-2.5 text-sm font-semibold text-on-surface-variant transition-all hover:bg-error-container hover:text-error">
                                                <span class="material-symbols-outlined text-xl">filter_list</span>
                                                Unpaid Only
                                        </a>
                                        <a href="{{ route('admin.invoices.index') }}"
                                                class="flex items-center gap-2 rounded-xl bg-primary px-5 py-2.5 text-sm font-semibold text-white shadow-lg shadow-primary/20 transition-all hover:bg-blue-700">
                                                <span class="material-symbols-outlined text-xl">receipt_long</span>
                                                All Invoices
                                        </a>
                                </div>
                        </div>

                        @if (session('success'))
                                <div class="rounded-2xl border border-green-200 bg-green-50 px-6 py-4 text-sm font-semibold text-green-800">
                                        {{ session('success') }}
                                </div>
                        @endif

                        @if ($errors->any())
                                <div class="rounded-2xl border border-error-container bg-error-container/60 px-6 py-4 text-sm font-semibold text-on-error-container">
                                        {{ $errors->first() }}
                                </div>
                        @endif

                        <div class="grid grid-cols-12 gap-6">
                                <div class="col-span-12 space-y-6 lg:col-span-4">
                                        <section class="rounded-3xl border border-slate-100 bg-white p-6 shadow-sm">
                                                <div class="mb-6">
                                                        <h2 class="flex items-center gap-2 text-xl font-bold text-on-surface">
                                                                <span class="material-symbols-outlined text-primary">post_add</span>
                                                                Add New Invoice
                                                        </h2>
                                                        <p class="mt-1 text-xs font-medium uppercase tracking-wider text-on-surface-variant">Manual Entry</p>
                                                </div>

                                                <form class="space-y-4" method="POST" action="{{ route('admin.invoices.store') }}">
                                                        @csrf
                                                        <div class="space-y-1">
                                                                <label class="pl-1 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Contract</label>
                                                                <select name="contract_id"
                                                                        class="w-full rounded-xl border-none bg-surface-container-high px-4 py-3 text-sm transition-all focus:ring-1 focus:ring-primary/20"
                                                                        required>
                                                                        <option value="">Choose contract</option>
                                                                        @foreach ($contracts as $contract)
                                                                                <option value="{{ $contract->id }}" {{ old('contract_id') == $contract->id ? 'selected' : '' }}>
                                                                                        {{ $contract->contract_number }} - {{ $contract->title ?: 'Untitled Contract' }}
                                                                                </option>
                                                                        @endforeach
                                                                </select>
                                                        </div>

                                                        <div class="space-y-1">
                                                                <label class="pl-1 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Status</label>
                                                                <select name="status"
                                                                        class="w-full rounded-xl border-none bg-surface-container-high px-4 py-3 text-sm transition-all focus:ring-1 focus:ring-primary/20"
                                                                        required>
                                                                        <option value="pending" {{ old('status') === 'pending' ? 'selected' : '' }}>Pending</option>
                                                                        <option value="paid" {{ old('status') === 'paid' ? 'selected' : '' }}>Paid</option>
                                                                        <option value="overdue" {{ old('status') === 'overdue' ? 'selected' : '' }}>Overdue</option>
                                                                </select>
                                                        </div>

                                                        <div class="space-y-1">
                                                                <label class="pl-1 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Amount</label>
                                                                <div class="relative">
                                                                        <span class="absolute left-4 top-1/2 -translate-y-1/2 font-semibold text-slate-400">$</span>
                                                                        <input name="amount" value="{{ old('amount') }}"
                                                                                class="w-full rounded-xl border-none bg-surface-container-high py-3 pl-8 pr-4 text-sm transition-all focus:ring-1 focus:ring-primary/20"
                                                                                placeholder="0.00" step="0.01" min="0" type="number" required />
                                                                </div>
                                                        </div>

                                                        <div class="space-y-1">
                                                                <label class="pl-1 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Due Date</label>
                                                                <input name="due_date" value="{{ old('due_date') }}"
                                                                        class="w-full rounded-xl border-none bg-surface-container-high px-4 py-3 text-sm transition-all focus:ring-1 focus:ring-primary/20"
                                                                        type="date" required />
                                                        </div>

                                                        <button class="mt-4 w-full rounded-2xl bg-gradient-to-r from-primary to-primary-container py-4 font-bold tracking-tight text-white shadow-md transition-all hover:shadow-lg active:scale-[0.98]"
                                                                type="submit">
                                                                Create Invoice
                                                        </button>
                                                </form>
                                        </section>

                                        <div class="relative overflow-hidden rounded-3xl bg-primary p-6 text-white">
                                                <div class="relative z-10">
                                                        <h3 class="mb-1 text-xs font-bold uppercase tracking-widest text-blue-100">Total Receivables</h3>
                                                        <div class="text-3xl font-black">${{ number_format($totalReceivables, 2) }}</div>
                                                        <div class="mt-4 flex items-center gap-2 text-xs font-medium text-blue-100">
                                                                <span class="rounded-full bg-primary-container px-2 py-0.5">{{ $unpaidInvoices }} unpaid</span>
                                                                <span>{{ $paidInvoices }} paid</span>
                                                        </div>
                                                </div>
                                                <span class="material-symbols-outlined absolute -bottom-4 -right-4 text-8xl opacity-10">account_balance_wallet</span>
                                        </div>
                                </div>

                                <div class="col-span-12 space-y-6 lg:col-span-8">
                                        <section class="space-y-4">
                                                <div class="flex items-center justify-between px-2">
                                                        <h2 class="text-xl font-bold text-on-surface">Active Contracts</h2>
                                                        <span class="text-sm font-semibold text-primary">{{ $contracts->count() }} contracts</span>
                                                </div>
                                                <div class="grid grid-cols-1 gap-4 md:grid-cols-2">
                                                        @forelse ($contracts->take(4) as $contract)
                                                                <div class="rounded-3xl border border-slate-100 bg-surface-container-low p-5 transition-all hover:border-primary/20">
                                                                        <div class="mb-4 flex items-start justify-between gap-3">
                                                                                <div class="flex items-center gap-3">
                                                                                        <div class="flex h-12 w-12 items-center justify-center rounded-2xl bg-secondary-container text-on-secondary-container">
                                                                                                <span class="material-symbols-outlined">description</span>
                                                                                        </div>
                                                                                        <div>
                                                                                                <h4 class="font-bold text-on-surface">{{ $contract->title ?: 'Untitled Contract' }}</h4>
                                                                                                <p class="text-xs font-medium text-on-surface-variant">ID: {{ $contract->contract_number }}</p>
                                                                                        </div>
                                                                                </div>
                                                                                <span class="rounded-full bg-green-100 px-3 py-1 text-[10px] font-bold uppercase text-green-700">{{ $contract->status }}</span>
                                                                        </div>
                                                                        <div class="flex items-center justify-between border-t border-slate-200 pt-4 text-sm">
                                                                                <span class="font-medium text-on-surface-variant">Invoices:</span>
                                                                                <span class="font-bold text-primary">{{ $contract->bills_count }}</span>
                                                                        </div>
                                                                </div>
                                                        @empty
                                                                <div class="rounded-3xl border border-slate-100 bg-white p-6 text-sm font-medium text-slate-500 md:col-span-2">
                                                                        No contracts found. Seed contracts first before creating invoices.
                                                                </div>
                                                        @endforelse
                                                </div>
                                        </section>

                                        <section class="overflow-hidden rounded-3xl border border-slate-100 bg-white shadow-sm">
                                                <div class="flex flex-col justify-between gap-4 border-b border-slate-100 p-6 md:flex-row md:items-center">
                                                        <div>
                                                                <h2 class="text-xl font-bold text-on-surface">Invoice History</h2>
                                                                <p class="mt-1 text-xs font-medium text-on-surface-variant">Real-time tracking of billing states.</p>
                                                        </div>
                                                        <div class="text-xs font-bold uppercase tracking-widest text-slate-400">
                                                                {{ $invoices->total() }} invoices
                                                        </div>
                                                </div>

                                                <div class="overflow-x-auto">
                                                        <table class="w-full min-w-[760px] text-left">
                                                                <thead class="bg-surface-container-low">
                                                                        <tr>
                                                                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Invoice / Contract</th>
                                                                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Amount</th>
                                                                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Due Date</th>
                                                                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Status</th>
                                                                                <th class="px-6 py-4 text-[10px] font-bold uppercase tracking-widest text-on-surface-variant">Actions</th>
                                                                        </tr>
                                                                </thead>
                                                                <tbody class="divide-y divide-slate-100">
                                                                        @forelse ($invoices as $invoice)
                                                                                @php
                                                                                        $isOverdue = !$invoice->is_paid && $invoice->due_date && $invoice->due_date->isPast();
                                                                                        $statusLabel = $invoice->is_paid ? 'Paid' : ($isOverdue || $invoice->status === 'overdue' ? 'Overdue' : ucfirst($invoice->status));
                                                                                        $statusClass = $invoice->is_paid ? 'bg-secondary-container text-on-secondary-container' : ($statusLabel === 'Overdue' ? 'bg-error-container text-on-error-container' : 'bg-surface-container-highest text-on-surface-variant');
                                                                                @endphp
                                                                                <tr class="transition-colors hover:bg-surface-container-low/50">
                                                                                        <td class="px-6 py-5">
                                                                                                <div class="font-bold text-on-surface">#{{ $invoice->invoice_number }}</div>
                                                                                                <div class="text-xs text-on-surface-variant">
                                                                                                        {{ optional($invoice->contract)->contract_number }} -
                                                                                                        {{ optional($invoice->contract)->title ?: 'No contract title' }}
                                                                                                </div>
                                                                                        </td>
                                                                                        <td class="px-6 py-5">
                                                                                                <div class="font-black text-on-surface">${{ number_format($invoice->amount, 2) }}</div>
                                                                                        </td>
                                                                                        <td class="px-6 py-5">
                                                                                                <div class="text-sm font-semibold text-on-surface">
                                                                                                        {{ optional($invoice->due_date)->format('M d, Y') ?: 'No date' }}
                                                                                                </div>
                                                                                                @if ($isOverdue)
                                                                                                        <div class="text-[10px] font-bold uppercase text-error">Overdue</div>
                                                                                                @endif
                                                                                        </td>
                                                                                        <td class="px-6 py-5">
                                                                                                <span class="rounded-full px-3 py-1 text-[10px] font-bold uppercase {{ $statusClass }}">
                                                                                                        {{ $statusLabel }}
                                                                                                </span>
                                                                                        </td>
                                                                                        <td class="px-6 py-5">
                                                                                                <a href="{{ route('admin.invoices.index', ['q' => $invoice->invoice_number]) }}"
                                                                                                        class="inline-flex rounded-lg p-1.5 text-primary transition-colors hover:bg-blue-50">
                                                                                                        <span class="material-symbols-outlined">visibility</span>
                                                                                                </a>
                                                                                        </td>
                                                                                </tr>
                                                                        @empty
                                                                                <tr>
                                                                                        <td colspan="5" class="px-6 py-12 text-center text-sm font-medium text-slate-500">
                                                                                                No invoices found.
                                                                                        </td>
                                                                                </tr>
                                                                        @endforelse
                                                                </tbody>
                                                        </table>
                                                </div>

                                                <div class="flex flex-col gap-3 bg-surface-container-low px-6 py-4 sm:flex-row sm:items-center sm:justify-between">
                                                        <p class="text-xs font-medium text-slate-500">
                                                                Showing {{ $invoices->firstItem() ?: 0 }} - {{ $invoices->lastItem() ?: 0 }} of {{ $invoices->total() }}
                                                        </p>
                                                        <div>
                                                                {!! $invoices->links() !!}
                                                        </div>
                                                </div>
                                        </section>
                                </div>
                        </div>
                </div>
        </main>
</body>

</html>
