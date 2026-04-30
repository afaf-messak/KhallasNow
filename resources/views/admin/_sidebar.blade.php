<aside
        class="h-screen w-64 fixed left-0 top-0 z-50 bg-slate-50 border-r border-slate-200 flex flex-col p-4 gap-2 font-inter text-sm font-medium tracking-wide">
        <div class="flex items-center gap-3 px-2 py-4 mb-4">
                <div class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white">
                        <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                </div>
                <div>
                        <h1 class="text-lg font-black text-blue-900 tracking-tight">Fatora Admin</h1>
                        <p class="text-[10px] uppercase tracking-widest text-slate-500 font-bold">Management Console</p>
                </div>
        </div>
        <nav class="flex-1 space-y-1">
                <a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl"
                        href="{{ route('admin.dashboard') }}">
                        <span class="material-symbols-outlined">dashboard</span>
                        <span>Dashboard</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl"
                        href="{{ route('admin.users.index') }}">
                        <span class="material-symbols-outlined">group</span>
                        <span>Users</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl"
                        href="{{ route('admin.invoices.index') }}">
                        <span class="material-symbols-outlined">receipt_long</span>
                        <span>Invoices</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 bg-white text-blue-700 rounded-xl shadow-sm font-semibold"
                        href="{{ route('admin.payments.index') }}">
                        <span class="material-symbols-outlined"
                                style="font-variation-settings: 'FILL' 1;">payments</span>
                        <span>Payments</span>
                </a>
                <a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl"
                        href="{{ route('admin.analytics.index') }}">
                        <span class="material-symbols-outlined">insights</span>
                        <span>Analytics</span>
                </a>
        </nav>
        <div class="mt-auto space-y-1 pt-4 border-t border-slate-200">
                <a class="flex items-center gap-3 px-3 py-2.5 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl"
                        href="{{ route('admin.help') }}">
                        <span class="material-symbols-outlined">help</span>
                        <span>Help Center</span>
                </a>
                <div class="px-3 py-2.5 text-xs font-bold text-secondary flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-secondary"></span>
                        System Status: Healthy
                </div>
                <a class="flex items-center gap-3 px-3 py-2.5 text-error hover:bg-error-container/20 transition-all rounded-xl"
                        href="{{ route('admin.logout') }}">
                        <span class="material-symbols-outlined">logout</span>
                        <span>Logout</span>
                </a>
        </div>
</aside>