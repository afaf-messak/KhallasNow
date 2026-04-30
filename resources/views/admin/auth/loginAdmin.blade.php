<!DOCTYPE html>
<html class="light" lang="fr">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>KhallasNow Admin - Connexion</title>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600&amp;family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <script>
                tailwind.config = {
                        darkMode: "class",
                        theme: {
                                extend: {
                                        colors: {
                                                primary: "#003d9b",
                                                "primary-container": "#0052cc",
                                                secondary: "#006b5f",
                                                background: "#f7f9fb",
                                                "surface-container-lowest": "#ffffff",
                                                "surface-container-high": "#e6e8ea",
                                                "surface-container-low": "#f2f4f6",
                                                outline: "#737685",
                                                "outline-variant": "#c3c6d6",
                                                "on-surface": "#191c1e",
                                                "on-surface-variant": "#434654",
                                                "on-primary": "#ffffff",
                                                "error-container": "#ffdad6",
                                                "on-error-container": "#93000a"
                                        },
                                        fontFamily: {
                                                headline: ["Manrope"],
                                                body: ["Inter"],
                                                label: ["Inter"]
                                        },
                                        borderRadius: { DEFAULT: "0.25rem", lg: "0.5rem", xl: "0.75rem", full: "9999px" },
                                },
                        },
                }
        </script>
        <style>
                body {
                        background-color: #f7f9fb;
                        font-family: 'Inter', sans-serif;
                }

                .brand-text,
                h1,
                h2,
                h3 {
                        font-family: 'Manrope', sans-serif;
                }

                .material-symbols-outlined {
                        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                }
        </style>
</head>

<body class="flex min-h-screen flex-col bg-background text-on-surface">
        <main class="relative flex flex-grow flex-col items-center justify-center overflow-hidden p-6 md:flex-row md:p-12">
                <div class="absolute right-[-10%] top-[-10%] h-[500px] w-[500px] rounded-full bg-primary/5 blur-3xl"></div>
                <div class="absolute bottom-[-5%] left-[-5%] h-[400px] w-[400px] rounded-full bg-secondary/5 blur-3xl"></div>

                <div class="z-10 grid w-full max-w-6xl grid-cols-1 items-center gap-8 md:grid-cols-12">
                        <div class="flex flex-col space-y-8 pr-0 md:col-span-7 md:pr-12 lg:col-span-8">
                                <div class="space-y-4">
                                        <div class="flex items-center space-x-2 text-primary">
                                                <span class="material-symbols-outlined text-3xl">admin_panel_settings</span>
                                                <span class="brand-text text-2xl font-black tracking-tight">KhallasNow</span>
                                        </div>
                                        <h1 class="text-4xl font-extrabold leading-tight tracking-tight text-primary md:text-6xl">
                                                Console de Gestion<br />Administrateur
                                        </h1>
                                        <p class="max-w-lg text-lg leading-relaxed text-on-surface-variant">
                                                Accédez à l'interface de contrôle centralisée pour gérer les utilisateurs, les factures et les paiements.
                                        </p>
                                </div>

                                <div class="flex flex-col gap-4 sm:flex-row">
                                        <div class="flex flex-1 items-start space-x-4 rounded-xl bg-surface-container-low p-6">
                                                <div class="rounded-lg bg-emerald-500/10 p-3">
                                                        <span class="material-symbols-outlined text-secondary">verified_user</span>
                                                </div>
                                                <div>
                                                        <h3 class="font-bold text-on-surface">Accès sécurisé</h3>
                                                        <p class="text-sm text-on-surface-variant">Connexion protégée et session administrateur dédiée.</p>
                                                </div>
                                        </div>
                                        <div class="flex flex-1 items-start space-x-4 rounded-xl bg-surface-container-low p-6">
                                                <div class="rounded-lg bg-primary/10 p-3">
                                                        <span class="material-symbols-outlined text-primary">terminal</span>
                                                </div>
                                                <div>
                                                        <h3 class="font-bold text-on-surface">Gestion complète</h3>
                                                        <p class="text-sm text-on-surface-variant">Suivi des utilisateurs, paiements, factures et exports.</p>
                                                </div>
                                        </div>
                                </div>
                        </div>

                        <div class="md:col-span-5 lg:col-span-4">
                                <div class="rounded-[2rem] border border-outline-variant/20 bg-surface-container-lowest p-8 shadow-[0_32px_64px_-16px_rgba(0,61,155,0.08)] md:p-10">
                                        <div class="mb-8">
                                                <h2 class="text-2xl font-bold text-on-surface">Connexion</h2>
                                                <p class="mt-1 text-xs uppercase tracking-widest text-outline">Identifiants de session</p>
                                        </div>

                                        @if ($errors->any())
                                                <div class="mb-6 rounded-xl border border-error-container bg-error-container/50 px-4 py-3 text-sm font-medium text-on-error-container">
                                                        {{ $errors->first() }}
                                                </div>
                                        @endif

                                        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                                                @csrf
                                                <div class="space-y-2">
                                                        <label class="ml-1 text-sm font-semibold text-on-surface-variant" for="email">Email administrateur</label>
                                                        <div class="group relative">
                                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                                                        <span class="material-symbols-outlined text-outline transition-colors group-focus-within:text-primary">mail</span>
                                                                </div>
                                                                <input
                                                                        class="block w-full rounded-xl border-none bg-surface-container-high py-4 pl-12 pr-4 transition-all placeholder:text-outline/60 focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/20"
                                                                        id="email" name="email" value="{{ old('email') }}" placeholder="admin@example.com" type="email" required autocomplete="email" autofocus />
                                                        </div>
                                                </div>

                                                <div class="space-y-2">
                                                        <div class="flex items-center justify-between px-1">
                                                                <label class="text-sm font-semibold text-on-surface-variant" for="password">Mot de passe</label>
                                                                <a class="text-xs font-semibold text-primary hover:underline" href="#">Oublié ?</a>
                                                        </div>
                                                        <div class="group relative">
                                                                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-4">
                                                                        <span class="material-symbols-outlined text-outline transition-colors group-focus-within:text-primary">lock</span>
                                                                </div>
                                                                <input
                                                                        class="block w-full rounded-xl border-none bg-surface-container-high py-4 pl-12 pr-12 transition-all placeholder:text-outline/60 focus:bg-surface-container-lowest focus:ring-2 focus:ring-primary/20"
                                                                        id="password" name="password" placeholder="••••••••••••" type="password" required autocomplete="current-password" />
                                                                <span class="material-symbols-outlined absolute inset-y-0 right-0 flex items-center pr-4 text-outline">visibility</span>
                                                        </div>
                                                </div>

                                                <label class="flex items-center gap-3 text-sm font-medium text-on-surface-variant">
                                                        <input class="rounded border-slate-300 text-primary focus:ring-primary/20" name="remember" type="checkbox" value="1" />
                                                        Se souvenir de moi
                                                </label>

                                                <div class="pt-4">
                                                        <button
                                                                class="flex w-full items-center justify-center space-x-3 rounded-xl bg-gradient-to-r from-primary to-primary-container px-6 py-4 font-bold text-on-primary shadow-lg shadow-primary/20 transition-all hover:opacity-90 active:scale-[0.98]"
                                                                type="submit">
                                                                <span>Se connecter à la console</span>
                                                                <span class="material-symbols-outlined text-xl">login</span>
                                                        </button>
                                                </div>
                                        </form>

                                        <div class="mt-8 flex items-center justify-center space-x-2 border-t border-outline-variant/20 pt-8">
                                                <span class="material-symbols-outlined text-sm text-secondary">shield</span>
                                                <p class="text-[10px] uppercase tracking-widest text-outline">Session sécurisée SSL/TLS</p>
                                        </div>
                                </div>
                        </div>
                </div>
        </main>

        <footer class="flex flex-col items-center justify-between space-y-4 p-8 text-xs text-on-surface-variant/60 md:flex-row md:space-y-0">
                <p>© 2026 KhallasNow.</p>
                <div class="flex items-center space-x-2">
                        <div class="h-2 w-2 rounded-full bg-secondary"></div>
                        <p>Tous les systèmes sont opérationnels</p>
                </div>
        </footer>
</body>

</html>
