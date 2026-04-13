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
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <script id="tailwind-config">
                tailwind.config = {
                        darkMode: "class",
                        theme: {
                                extend: {
                                        colors: {
                                                "primary-fixed": "#dae2ff",
                                                "outline-variant": "#c3c6d6",
                                                "secondary-fixed-dim": "#83d5c6",
                                                "surface-container": "#eceef0",
                                                "primary-container": "#0052cc",
                                                "on-tertiary-fixed-variant": "#005312",
                                                "surface-variant": "#e0e3e5",
                                                "error": "#ba1a1a",
                                                "surface-dim": "#d8dadc",
                                                "on-surface": "#191c1e",
                                                "inverse-on-surface": "#eff1f3",
                                                "on-background": "#191c1e",
                                                "primary-fixed-dim": "#b2c5ff",
                                                "on-secondary-fixed": "#00201c",
                                                "surface-container-high": "#e6e8ea",
                                                "secondary-container": "#9cefdf",
                                                "inverse-surface": "#2d3133",
                                                "on-error-container": "#93000a",
                                                "on-tertiary-fixed": "#002204",
                                                "primary": "#003d9b",
                                                "on-secondary-fixed-variant": "#005047",
                                                "on-primary-container": "#c4d2ff",
                                                "secondary-fixed": "#9ff2e2",
                                                "on-primary-fixed": "#001848",
                                                "tertiary-fixed": "#a3f69c",
                                                "background": "#f7f9fb",
                                                "tertiary-container": "#166921",
                                                "surface-tint": "#0c56d0",
                                                "inverse-primary": "#b2c5ff",
                                                "on-surface-variant": "#434654",
                                                "secondary": "#006b5f",
                                                "on-secondary-container": "#0b6f63",
                                                "surface-container-highest": "#e0e3e5",
                                                "surface-container-low": "#f2f4f6",
                                                "outline": "#737685",
                                                "on-error": "#ffffff",
                                                "error-container": "#ffdad6",
                                                "on-primary-fixed-variant": "#0040a2",
                                                "on-tertiary": "#ffffff",
                                                "surface-container-lowest": "#ffffff",
                                                "tertiary": "#004f11",
                                                "tertiary-fixed-dim": "#88d982",
                                                "on-tertiary-container": "#94e68e",
                                                "surface-bright": "#f7f9fb",
                                                "on-secondary": "#ffffff",
                                                "surface": "#f7f9fb",
                                                "on-primary": "#ffffff"
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
                .material-symbols-outlined {
                        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                        vertical-align: middle;
                }

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

<body class="bg-background text-on-background min-h-screen flex">
        <!-- SideNavBar Component -->
        <aside
                class="h-screen w-64 fixed left-0 top-0 z-50 bg-slate-50 flex flex-col p-4 gap-2 border-r border-slate-200 font-inter text-sm font-medium tracking-wide">
                <div class="mb-8 px-2 flex items-center gap-3">
                        <div
                                class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white shadow-lg">
                                <span class="material-symbols-outlined"
                                        data-icon="account_balance_wallet">account_balance_wallet</span>
                        </div>
                        <div>
                                <div class="text-lg font-black text-blue-900 tracking-tight">Fatora Admin</div>
                                <div class="text-[10px] uppercase tracking-widest text-slate-500">Management Console
                                </div>
                        </div>
                </div>
                <nav class="flex-1 space-y-1">
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                                <span>Dashboard</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 bg-white text-blue-700 rounded-xl shadow-sm font-semibold active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="group">group</span>
                                <span>Users</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
                                <span>Invoices</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="payments">payments</span>
                                <span>Payments</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="insights">insights</span>
                                <span>Analytics</span>
                        </a>
                </nav>
                <div class="mt-auto pt-4 border-t border-slate-200 space-y-1">
                        <div
                                class="px-4 py-2 mb-2 text-[11px] font-bold text-secondary flex items-center gap-2 bg-secondary-container/30 rounded-lg">
                                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                                System Status: Healthy
                        </div>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="help">help</span>
                                <span>Help Center</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-error hover:bg-error-container/20 transition-all rounded-xl"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="logout">logout</span>
                                <span>Logout</span>
                        </a>
                </div>
        </aside>
        <!-- Main Canvas -->
        <main class="ml-64 flex-1 flex flex-col min-h-screen">
                <!-- TopNavBar Component -->
                <header
                        class="bg-white/80 backdrop-blur-md text-blue-800 font-manrope font-semibold tracking-tight docked full-width top-0 z-40 sticky flex justify-between items-center px-8 py-3 w-full border-b border-slate-100">
                        <div class="flex items-center gap-8">
                                <h1 class="text-xl font-bold text-blue-900 tracking-tight">FatoraPay Admin</h1>
                        </div>
                        <div class="flex items-center gap-4">
                                <button
                                        class="p-2 text-slate-500 hover:bg-slate-100 transition-colors rounded-full relative">
                                        <span class="material-symbols-outlined"
                                                data-icon="notifications">notifications</span>
                                        <span
                                                class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
                                </button>
                                <button class="p-2 text-slate-500 hover:bg-slate-100 transition-colors rounded-full">
                                        <span class="material-symbols-outlined" data-icon="settings">settings</span>
                                </button>
                                <div class="h-8 w-px bg-slate-200 mx-2"></div>
                                <div class="flex items-center gap-3">
                                        <div class="text-right">
                                                <p class="text-xs font-bold text-slate-900 leading-none">Alex Rivera</p>
                                                <p class="text-[10px] text-slate-500 font-medium">System Administrator
                                                </p>
                                        </div>
                                        <img alt="Admin profile avatar" class="w-9 h-9 rounded-full bg-slate-200"
                                                data-alt="close-up of a professional man with glasses and a friendly expression in a clean studio setting"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsPXtjNwxhSlUZrvgfUet-FCq4O0Tfcbx9ou50N6QYquFwT0pEMKvJi8bcVpZtvZLyCFq_ul-z-GN_lPpbweAtzCa913SbYb5S3QtoPD0K_n1p6vP-Xte0DNP2DYLB_bsR7Rm-Yy8HZZPxNEyLIZpy1vx0ptHJDf67R3S0nkPrlEQFx9BdguF2eNKrcD2gj0kR1zFlNgpCujvYFlsr3rxdbLYQi1jSh9-8lpMsEYrAxhRDSpSfVOMr8j_ugS6PQxMy0ehL2QgCsc51" />
                                </div>
                        </div>
                </header>
                <!-- Page Content -->
                <div class="p-8 space-y-8">
                        <!-- Header Section -->
                        <div class="flex justify-between items-end">
                                <div class="space-y-1">
                                        <h2 class="text-3xl font-extrabold text-primary tracking-tight">User Management
                                        </h2>
                                        <p class="text-slate-500 font-medium">Oversee and manage your financial
                                                ecosystem members</p>
                                </div>
<<<<<<< HEAD
=======
                                <a href="<?php echo e(route('admin.users.create')); ?>"
                                        class="bg-primary hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-primary/20 transition-all active:scale-95">
                                        <span class="material-symbols-outlined" data-icon="person_add">person_add</span>
                                        Invite New User
                                </a>
                        </div>
                        <?php if (session('success')): ?>
                        <div class="rounded-2xl border border-green-200 bg-green-50 px-6 py-4 text-sm text-green-800">
                                <?php        echo e(session('success')); ?>
                        </div>
                        <?php endif; ?>
                        <!-- Bento Filter Bar -->
                        <form method="get" action="<?php echo e(url('/admin/users')); ?>"
                                class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <input type="hidden" name="sort" value="<?php echo e(request('sort', 'newest')); ?>" />
                                <div
                                        class="md:col-span-2 bg-surface-container-low rounded-2xl p-4 flex items-center gap-4">
                                        <div class="flex-1 relative">
                                                <span
                                                        class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                                                        <span class="material-symbols-outlined"
                                                                data-icon="filter_list">filter_list</span>
                                                </span>
                                                <input name="q" value="<?php echo e(request('q')); ?>"
                                                        class="w-full bg-surface-container-lowest border-none rounded-xl pl-10 pr-12 py-3 text-sm focus:ring-2 focus:ring-primary/10"
                                                        placeholder="Filter by name, email or ID..." type="text" />
                                                <button type="submit"
                                                        class="absolute inset-y-0 right-3 inline-flex items-center justify-center rounded-full px-3 text-slate-500 hover:text-slate-700 transition-colors">
                                                        <span class="material-symbols-outlined"
                                                                data-icon="search">search</span>
                                                </button>
                                        </div>
                                </div>
                                <div class="bg-surface-container-low rounded-2xl p-4">
                                        <select name="status" onchange="this.form.submit()"
                                                class="w-full bg-surface-container-lowest border-none rounded-xl py-3 px-4 text-sm font-medium text-slate-700 focus:ring-2 focus:ring-primary/10">
                                                <option value="">All Account Status</option>
                                                <option value="Active" <?php echo e(request('status') === 'Active' ? 'selected' : ''); ?>>Active Only</option>
                                                <option value="Suspended" <?php echo e(request('status') === 'Suspended' ? 'selected' : ''); ?>>Suspended</option>
                                                <option value="Pending Verification" <?php echo e(request('status') === 'Pending Verification' ? 'selected' : ''); ?>>Pending Verification</option>
                                        </select>
                                </div>
                        </form>
                        <!-- Data Table Container -->
                        <div
                                class="bg-surface-container-lowest rounded-[2rem] shadow-sm overflow-hidden border border-slate-100">
                                <table class="w-full text-left border-collapse">
                                        <thead>
                                                <tr class="bg-slate-50/50">
                                                        <th
                                                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                User Name</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                Email Address</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">
                                                                Contracts</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                Registration</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                Status</th>
                                                        <th
                                                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-right">
                                                                Actions</th>
                                                </tr>
                                        </thead>
                                        <?php
$statusClasses = [
        'Active' => 'bg-secondary-container text-on-secondary-container',
        'Suspended' => 'bg-error-container text-on-error-container',
        'Pending Verification' => 'bg-slate-100 text-slate-600',
];
                                        ?>
                                        <tbody class="divide-y divide-slate-50">
                                                <?php $__empty_1 = true;
$__currentLoopData = $users;
$__env->addLoop($__currentLoopData);
foreach ($__currentLoopData as $user):
        $__env->incrementLoopIndices();
        $loop = $__env->getLastLoop();
        $__empty_1 = false; ?>
                                                <tr class="hover:bg-slate-50/80 transition-colors group">
                                                        <td class="px-8 py-5">
                                                                <div class="flex items-center gap-4">
                                                                        <img class="w-10 h-10 rounded-full bg-primary/10"
                                                                                alt="<?php        echo e($user->name); ?> avatar"
                                                                                src="https://ui-avatars.com/api/?name=<?php        echo e(urlencode($user->name)); ?>&background=3B82F6&color=ffffff&size=128" />
                                                                        <div>
                                                                                <div
                                                                                        class="text-sm font-bold text-slate-900">
                                                                                        <?php        echo e($user->name); ?>
                                                                                </div>
                                                                                <div
                                                                                        class="text-[10px] text-slate-400 font-medium">
                                                                                        ID:
                                                                                        #FP-<?php        echo e(str_pad($user->id, 4, '0', STR_PAD_LEFT)); ?>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </td>
                                                        <td class="px-6 py-5">
                                                                <span
                                                                        class="text-sm text-slate-600 font-medium"><?php        echo e($user->email); ?></span>
                                                        </td>
                                                        <td class="px-6 py-5 text-center">
                                                                <span
                                                                        class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-sm font-bold text-slate-700"><?php        echo e($user->contracts); ?></span>
                                                        </td>
                                                        <td class="px-6 py-5">
                                                                <div class="text-sm text-slate-600 font-medium">
                                                                        <?php        echo e($user->created_at ? $user->created_at->format('M d, Y') : 'Unknown'); ?>
                                                                </div>
                                                        </td>
                                                        <td class="px-6 py-5">
                                                                <span
                                                                        class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider <?php        echo e($statusClasses[$user->status] ?? 'bg-slate-100 text-slate-600'); ?>"><?php        echo e($user->status); ?></span>
                                                        </td>
                                                        <td class="px-8 py-5 text-right">
                                                                <div class="flex justify-end gap-2 transition-opacity">
                                                                        <a href="<?php        echo e(route('admin.users.show', $user)); ?>"
                                                                                class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all"
                                                                                title="View Profile">
                                                                                <span class="material-symbols-outlined text-[20px]"
                                                                                        data-icon="visibility">visibility</span>
                                                                        </a>
                                                                        <a href="<?php        echo e(route('admin.users.edit', $user)); ?>"
                                                                                class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all"
                                                                                title="Edit">
                                                                                <span class="material-symbols-outlined text-[20px]"
                                                                                        data-icon="edit">edit</span>
                                                                        </a>
                                                                        <form method="POST"
                                                                                action="<?php        echo e(route('admin.users.destroy', $user)); ?>"
                                                                                class="inline"
                                                                                onsubmit="return confirm('Delete this user?');">
                                                                                <?php        echo csrf_field(); ?>
                                                                                <?php        echo method_field('DELETE'); ?>
                                                                                <button type="submit"
                                                                                        class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all"
                                                                                        title="Delete">
                                                                                        <span class="material-symbols-outlined text-[20px]"
                                                                                                data-icon="delete">delete</span>
                                                                                </button>
                                                                        </form>
                                                                </div>
                                                        </td>
                                                </tr>
                                                <?php endforeach;
$__env->popLoop();
$loop = $__env->getLastLoop();
if ($__empty_1): ?>
                                                <tr>
                                                        <td colspan="6" class="px-8 py-10 text-center text-slate-500">No
                                                                users found. Run <code>php artisan db:seed</code> to
                                                                generate sample users.</td>
                                                </tr>
                                                <?php endif; ?>
                                        </tbody>
                                </table>
                                <!-- Pagination Footer -->
                                <div
                                        class="px-8 py-6 bg-slate-50/50 flex flex-col lg:flex-row justify-between items-center gap-4 border-t border-slate-100">
                                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Showing
                                                <?php echo e($users->firstItem() ?: 0); ?> -
                                                <?php echo e($users->lastItem() ?: 0); ?> of
                                                <?php echo e($totalUsers); ?> Users
                                        </p>
                                        <div class="flex items-center gap-1 flex-wrap justify-center lg:justify-end">
                                                <?php if ($users->onFirstPage()): ?>
                                                <span
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-300">
                                                        <span class="material-symbols-outlined">chevron_left</span>
                                                </span>
                                                <?php else: ?>
                                                <a href="<?php        echo e($users->previousPageUrl()); ?>"
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:bg-slate-100 transition-colors">
                                                        <span class="material-symbols-outlined">chevron_left</span>
                                                </a>
                                                <?php endif; ?>

                                                <?php
$currentPage = $users->currentPage();
$lastPage = $users->lastPage();
$start = max(1, $currentPage - 2);
$end = min($lastPage, $currentPage + 2);
                                                ?>

                                                <?php if ($start > 1): ?>
                                                <a href="<?php        echo e($users->url(1)); ?>"
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors font-bold">1</a>
                                                <?php        if ($start > 2): ?>
                                                <span class="px-2 text-slate-400">...</span>
                                                <?php        endif; ?>
                                                <?php endif; ?>

                                                <?php for ($page = $start; $page <= $end; $page++): ?>
                                                <?php        if ($page === $currentPage): ?>
                                                <span
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-white font-bold shadow-sm"><?php                echo e($page); ?></span>
                                                <?php        else: ?>
                                                <a href="<?php                echo e($users->url($page)); ?>"
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors font-bold"><?php                echo e($page); ?></a>
                                                <?php        endif; ?>
                                                <?php endfor; ?>

                                                <?php if ($end < $lastPage): ?>
                                                <?php        if ($end < $lastPage - 1): ?>
                                                <span class="px-2 text-slate-400">...</span>
                                                <?php        endif; ?>
                                                <a href="<?php        echo e($users->url($lastPage)); ?>"
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors font-bold"><?php        echo e($lastPage); ?></a>
                                                <?php endif; ?>

                                                <?php if ($users->hasMorePages()): ?>
                                                <a href="<?php        echo e($users->nextPageUrl()); ?>"
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:bg-slate-100 transition-colors">
                                                        <span class="material-symbols-outlined">chevron_right</span>
                                                </a>
                                                <?php else: ?>
                                                <span
                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-300">
                                                        <span class="material-symbols-outlined">chevron_right</span>
                                                </span>
                                                <?php endif; ?>
                                        </div>
                                </div>
                        </div>
                </div>
        </main>
</body>

</html>
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
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <script id="tailwind-config">
                tailwind.config = {
                        darkMode: "class",
                        theme: {
                                extend: {
                                        colors: {
                                                "primary-fixed": "#dae2ff",
                                                "outline-variant": "#c3c6d6",
                                                "secondary-fixed-dim": "#83d5c6",
                                                "surface-container": "#eceef0",
                                                "primary-container": "#0052cc",
                                                "on-tertiary-fixed-variant": "#005312",
                                                "surface-variant": "#e0e3e5",
                                                "error": "#ba1a1a",
                                                "surface-dim": "#d8dadc",
                                                "on-surface": "#191c1e",
                                                "inverse-on-surface": "#eff1f3",
                                                "on-background": "#191c1e",
                                                "primary-fixed-dim": "#b2c5ff",
                                                "on-secondary-fixed": "#00201c",
                                                "surface-container-high": "#e6e8ea",
                                                "secondary-container": "#9cefdf",
                                                "inverse-surface": "#2d3133",
                                                "on-error-container": "#93000a",
                                                "on-tertiary-fixed": "#002204",
                                                "primary": "#003d9b",
                                                "on-secondary-fixed-variant": "#005047",
                                                "on-primary-container": "#c4d2ff",
                                                "secondary-fixed": "#9ff2e2",
                                                "on-primary-fixed": "#001848",
                                                "tertiary-fixed": "#a3f69c",
                                                "background": "#f7f9fb",
                                                "tertiary-container": "#166921",
                                                "surface-tint": "#0c56d0",
                                                "inverse-primary": "#b2c5ff",
                                                "on-surface-variant": "#434654",
                                                "secondary": "#006b5f",
                                                "on-secondary-container": "#0b6f63",
                                                "surface-container-highest": "#e0e3e5",
                                                "surface-container-low": "#f2f4f6",
                                                "outline": "#737685",
                                                "on-error": "#ffffff",
                                                "error-container": "#ffdad6",
                                                "on-primary-fixed-variant": "#0040a2",
                                                "on-tertiary": "#ffffff",
                                                "surface-container-lowest": "#ffffff",
                                                "tertiary": "#004f11",
                                                "tertiary-fixed-dim": "#88d982",
                                                "on-tertiary-container": "#94e68e",
                                                "surface-bright": "#f7f9fb",
                                                "on-secondary": "#ffffff",
                                                "surface": "#f7f9fb",
                                                "on-primary": "#ffffff"
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
                .material-symbols-outlined {
                        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                        vertical-align: middle;
                }

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

<body class="bg-background text-on-background min-h-screen flex">
        <!-- SideNavBar Component -->
        <aside
                class="h-screen w-64 fixed left-0 top-0 z-50 bg-slate-50 flex flex-col p-4 gap-2 border-r border-slate-200 font-inter text-sm font-medium tracking-wide">
                <div class="mb-8 px-2 flex items-center gap-3">
                        <div
                                class="w-10 h-10 rounded-xl bg-primary flex items-center justify-center text-white shadow-lg">
                                <span class="material-symbols-outlined"
                                        data-icon="account_balance_wallet">account_balance_wallet</span>
                        </div>
                        <div>
                                <div class="text-lg font-black text-blue-900 tracking-tight">Fatora Admin</div>
                                <div class="text-[10px] uppercase tracking-widest text-slate-500">Management Console
                                </div>
                        </div>
                </div>
                <nav class="flex-1 space-y-1">
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="dashboard">dashboard</span>
                                <span>Dashboard</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 bg-white text-blue-700 rounded-xl shadow-sm font-semibold active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="group">group</span>
                                <span>Users</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="receipt_long">receipt_long</span>
                                <span>Invoices</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="payments">payments</span>
                                <span>Payments</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl active:scale-95"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="insights">insights</span>
                                <span>Analytics</span>
                        </a>
                </nav>
                <div class="mt-auto pt-4 border-t border-slate-200 space-y-1">
                        <div
                                class="px-4 py-2 mb-2 text-[11px] font-bold text-secondary flex items-center gap-2 bg-secondary-container/30 rounded-lg">
                                <span class="w-2 h-2 rounded-full bg-secondary animate-pulse"></span>
                                System Status: Healthy
                        </div>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-blue-600 hover:bg-blue-50/50 transition-all rounded-xl"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="help">help</span>
                                <span>Help Center</span>
                        </a>
                        <a class="flex items-center gap-3 px-4 py-3 text-slate-600 hover:text-error hover:bg-error-container/20 transition-all rounded-xl"
                                href="#">
                                <span class="material-symbols-outlined" data-icon="logout">logout</span>
                                <span>Logout</span>
                        </a>
                </div>
        </aside>
        <!-- Main Canvas -->
        <main class="ml-64 flex-1 flex flex-col min-h-screen">
                <!-- TopNavBar Component -->
                <header
                        class="bg-white/80 backdrop-blur-md text-blue-800 font-manrope font-semibold tracking-tight docked full-width top-0 z-40 sticky flex justify-between items-center px-8 py-3 w-full border-b border-slate-100">
                        <div class="flex items-center gap-8">
                                <h1 class="text-xl font-bold text-blue-900 tracking-tight">FatoraPay Admin</h1>
                        </div>
                        <div class="flex items-center gap-4">
                                <button
                                        class="p-2 text-slate-500 hover:bg-slate-100 transition-colors rounded-full relative">
                                        <span class="material-symbols-outlined"
                                                data-icon="notifications">notifications</span>
                                        <span
                                                class="absolute top-2 right-2 w-2 h-2 bg-error rounded-full border-2 border-white"></span>
                                </button>
                                <button class="p-2 text-slate-500 hover:bg-slate-100 transition-colors rounded-full">
                                        <span class="material-symbols-outlined" data-icon="settings">settings</span>
                                </button>
                                <div class="h-8 w-px bg-slate-200 mx-2"></div>
                                <div class="flex items-center gap-3">
                                        <div class="text-right">
                                                <p class="text-xs font-bold text-slate-900 leading-none">Alex Rivera</p>
                                                <p class="text-[10px] text-slate-500 font-medium">System Administrator
                                                </p>
                                        </div>
                                        <img alt="Admin profile avatar" class="w-9 h-9 rounded-full bg-slate-200"
                                                data-alt="close-up of a professional man with glasses and a friendly expression in a clean studio setting"
                                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDsPXtjNwxhSlUZrvgfUet-FCq4O0Tfcbx9ou50N6QYquFwT0pEMKvJi8bcVpZtvZLyCFq_ul-z-GN_lPpbweAtzCa913SbYb5S3QtoPD0K_n1p6vP-Xte0DNP2DYLB_bsR7Rm-Yy8HZZPxNEyLIZpy1vx0ptHJDf67R3S0nkPrlEQFx9BdguF2eNKrcD2gj0kR1zFlNgpCujvYFlsr3rxdbLYQi1jSh9-8lpMsEYrAxhRDSpSfVOMr8j_ugS6PQxMy0ehL2QgCsc51" />
                                </div>
                        </div>
                </header>
                <!-- Page Content -->
                <div class="p-8 space-y-8">
                        <!-- Header Section -->
                        <div class="flex justify-between items-end">
                                <div class="space-y-1">
                                        <h2 class="text-3xl font-extrabold text-primary tracking-tight">User Management
                                        </h2>
                                        <p class="text-slate-500 font-medium">Oversee and manage your financial
                                                ecosystem members</p>
                                </div>
>>>>>>> afaf
                                <a href="{{ route('admin.users.create') }}"
                                        class="bg-primary hover:bg-blue-700 text-white px-6 py-3 rounded-xl font-bold flex items-center gap-2 shadow-lg shadow-primary/20 transition-all active:scale-95">
                                        <span class="material-symbols-outlined" data-icon="person_add">person_add</span>
                                        Invite New User
                                </a>
                        </div>
                        @if (session('success'))
                                <div class="rounded-2xl border border-green-200 bg-green-50 px-6 py-4 text-sm text-green-800">
                                        {{ session('success') }}
                                </div>
                        @endif
                        <!-- Bento Filter Bar -->
                        <form method="get" action="{{ url('/admin/users') }}"
                                class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <input type="hidden" name="sort" value="{{ request('sort', 'newest') }}" />
                                <div
                                        class="md:col-span-2 bg-surface-container-low rounded-2xl p-4 flex items-center gap-4">
                                        <div class="flex-1 relative">
                                                <span
                                                        class="absolute inset-y-0 left-3 flex items-center text-slate-400">
                                                        <span class="material-symbols-outlined"
                                                                data-icon="filter_list">filter_list</span>
                                                </span>
                                                <input name="q" value="{{ request('q') }}"
                                                        class="w-full bg-surface-container-lowest border-none rounded-xl pl-10 pr-12 py-3 text-sm focus:ring-2 focus:ring-primary/10"
                                                        placeholder="Filter by name, email or ID..." type="text" />
                                                <button type="submit"
                                                        class="absolute inset-y-0 right-3 inline-flex items-center justify-center rounded-full px-3 text-slate-500 hover:text-slate-700 transition-colors">
                                                        <span class="material-symbols-outlined"
                                                                data-icon="search">search</span>
                                                </button>
                                        </div>
                                </div>
                                <div class="bg-surface-container-low rounded-2xl p-4">
                                        <select name="status" onchange="this.form.submit()"
                                                class="w-full bg-surface-container-lowest border-none rounded-xl py-3 px-4 text-sm font-medium text-slate-700 focus:ring-2 focus:ring-primary/10">
                                                <option value="">All Account Status</option>
                                                <option value="Active" {{ request('status') === 'Active' ? 'selected' : '' }}>Active Only</option>
                                                <option value="Suspended" {{ request('status') === 'Suspended' ? 'selected' : '' }}>Suspended</option>
                                                <option value="Pending Verification" {{ request('status') === 'Pending Verification' ? 'selected' : '' }}>Pending Verification</option>
                                        </select>
                                </div>
                        </form>
                        <!-- Data Table Container -->
                        <div
                                class="bg-surface-container-lowest rounded-[2rem] shadow-sm overflow-hidden border border-slate-100">
                                <table class="w-full text-left border-collapse">
                                        <thead>
                                                <tr class="bg-slate-50/50">
                                                        <th
                                                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                User Name</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                Email Address</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-center">
                                                                Contracts</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                Registration</th>
                                                        <th
                                                                class="px-6 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100">
                                                                Status</th>
                                                        <th
                                                                class="px-8 py-5 text-[11px] font-black text-slate-400 uppercase tracking-widest border-b border-slate-100 text-right">
                                                                Actions</th>
                                                </tr>
                                        </thead>
                                        @php
                                                $statusClasses = [
                                                        'Active' => 'bg-secondary-container text-on-secondary-container',
                                                        'Suspended' => 'bg-error-container text-on-error-container',
                                                        'Pending Verification' => 'bg-slate-100 text-slate-600',
                                                ];
                                        @endphp
                                        <tbody class="divide-y divide-slate-50">
                                                @forelse ($users as $user)
                                                        <tr class="hover:bg-slate-50/80 transition-colors group">
                                                                <td class="px-8 py-5">
                                                                        <div class="flex items-center gap-4">
                                                                                <img class="w-10 h-10 rounded-full bg-primary/10"
                                                                                        alt="{{ $user->name }} avatar"
                                                                                        src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=3B82F6&color=ffffff&size=128" />
                                                                                <div>
                                                                                        <div
                                                                                                class="text-sm font-bold text-slate-900">
                                                                                                {{ $user->name }}
                                                                                        </div>
                                                                                        <div
                                                                                                class="text-[10px] text-slate-400 font-medium">
                                                                                                ID:
                                                                                                #FP-{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}
                                                                                        </div>
                                                                                </div>
                                                                        </div>
                                                                </td>
                                                                <td class="px-6 py-5">
                                                                        <span
                                                                                class="text-sm text-slate-600 font-medium">{{ $user->email }}</span>
                                                                </td>
                                                                <td class="px-6 py-5 text-center">
                                                                        <span
                                                                                class="inline-flex items-center justify-center w-8 h-8 rounded-lg bg-slate-100 text-sm font-bold text-slate-700">{{ $user->contracts }}</span>
                                                                </td>
                                                                <td class="px-6 py-5">
                                                                        <div class="text-sm text-slate-600 font-medium">
                                                                                {{ $user->created_at ? $user->created_at->format('M d, Y') : 'Unknown' }}
                                                                        </div>
                                                                </td>
                                                                <td class="px-6 py-5">
                                                                        <span
                                                                                class="px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider {{ $statusClasses[$user->status] ?? 'bg-slate-100 text-slate-600' }}">{{ $user->status }}</span>
                                                                </td>
                                                                <td class="px-8 py-5 text-right">
                                                                        <div class="flex justify-end gap-2 transition-opacity">
                                                                                <a href="{{ route('admin.users.show', $user) }}"
                                                                                        class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all"
                                                                                        title="View Profile">
                                                                                        <span class="material-symbols-outlined text-[20px]"
                                                                                                data-icon="visibility">visibility</span>
                                                                                </a>
                                                                                <a href="{{ route('admin.users.edit', $user) }}"
                                                                                        class="p-2 text-slate-400 hover:text-primary hover:bg-primary/5 rounded-lg transition-all"
                                                                                        title="Edit">
                                                                                        <span class="material-symbols-outlined text-[20px]"
                                                                                                data-icon="edit">edit</span>
                                                                                </a>
                                                                                <form method="POST"
                                                                                        action="{{ route('admin.users.destroy', $user) }}"
                                                                                        class="inline"
                                                                                        onsubmit="return confirm('Delete this user?');">
                                                                                        @csrf
                                                                                        @method('DELETE')
                                                                                        <button type="submit"
                                                                                                class="p-2 text-slate-400 hover:text-error hover:bg-error/5 rounded-lg transition-all"
                                                                                                title="Delete">
                                                                                                <span class="material-symbols-outlined text-[20px]"
                                                                                                        data-icon="delete">delete</span>
                                                                                        </button>
                                                                                </form>
                                                                        </div>
                                                                </td>
                                                        </tr>
                                                @empty
                                                        <tr>
                                                                <td colspan="6" class="px-8 py-10 text-center text-slate-500">No
                                                                        users found. Run <code>php artisan db:seed</code> to
                                                                        generate sample users.</td>
                                                        </tr>
                                                @endforelse
                                        </tbody>
                                </table>
                                <!-- Pagination Footer -->
                                <div
                                        class="px-8 py-6 bg-slate-50/50 flex flex-col lg:flex-row justify-between items-center gap-4 border-t border-slate-100">
                                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Showing
                                                {{ $users->firstItem() ?: 0 }} - {{ $users->lastItem() ?: 0 }} of
                                                {{ $totalUsers }} Users
                                        </p>
                                        <div class="flex items-center gap-1 flex-wrap justify-center lg:justify-end">
                                                @if ($users->onFirstPage())
                                                        <span
                                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-300">
                                                                <span class="material-symbols-outlined">chevron_left</span>
                                                        </span>
                                                @else
                                                        <a href="{{ $users->previousPageUrl() }}"
                                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:bg-slate-100 transition-colors">
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
                                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors font-bold">1</a>
                                                        @if ($start > 2)
                                                                <span class="px-2 text-slate-400">...</span>
                                                        @endif
                                                @endif

                                                @for ($page = $start; $page <= $end; $page++)
                                                        @if ($page === $currentPage)
                                                                <span
                                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-primary text-white font-bold shadow-sm">{{ $page }}</span>
                                                        @else
                                                                <a href="{{ $users->url($page) }}"
                                                                        class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors font-bold">{{ $page }}</a>
                                                        @endif
                                                @endfor

                                                @if ($end < $lastPage)
                                                        @if ($end < $lastPage - 1)
                                                                <span class="px-2 text-slate-400">...</span>
                                                        @endif
                                                        <a href="{{ $users->url($lastPage) }}"
                                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-600 hover:bg-slate-100 transition-colors font-bold">{{ $lastPage }}</a>
                                                @endif

                                                @if ($users->hasMorePages())
                                                        <a href="{{ $users->nextPageUrl() }}"
                                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-500 hover:bg-slate-100 transition-colors">
                                                                <span class="material-symbols-outlined">chevron_right</span>
                                                        </a>
                                                @else
                                                        <span
                                                                class="w-10 h-10 flex items-center justify-center rounded-xl bg-white border border-slate-200 text-slate-300">
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