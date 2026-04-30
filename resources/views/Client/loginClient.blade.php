<!DOCTYPE html>
<html class="light" lang="fr">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>KhallasNow - Connexion Client</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
                rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <script>
                tailwind.config = {
                        darkMode: "class",
                        theme: {
                                extend: {
                                        colors: {
                                                primary: "#003d9b",
                                                "primary-container": "#0052cc",
                                                background: "#f7f9fb",
                                                "surface-container-lowest": "#ffffff",
                                                "surface-container-high": "#e6e8ea",
                                                "secondary-container": "#9cefdf",
                                                "on-secondary-container": "#0b6f63",
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
                        font-family: 'Inter', sans-serif;
                        background-color: #f7f9fb;
                }

                .font-manrope {
                        font-family: 'Manrope', sans-serif;
                }

                .material-symbols-outlined {
                        font-variation-settings: 'FILL' 0, 'wght' 400, 'GRAD' 0, 'opsz' 24;
                }
        </style>
</head>

<body class="flex min-h-screen flex-col items-center justify-center bg-background p-6 text-on-surface">
        <main class="w-full max-w-md space-y-10">
                <div class="flex flex-col items-center space-y-5 text-center">
                        <a href="{{ url('/') }}"
                                class="flex h-16 w-16 items-center justify-center rounded-2xl bg-primary text-white shadow-xl shadow-primary/20 transition-transform duration-300 hover:scale-105">
                                <span class="material-symbols-outlined text-4xl" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                        </a>
                        <div class="space-y-2">
                                <h1 class="font-manrope text-4xl font-extrabold tracking-tight text-primary">KhallasNow</h1>
                                <p class="font-medium tracking-wide text-on-surface-variant">Votre espace de factures</p>
                        </div>
                </div>

                <div class="rounded-[2rem] border border-transparent bg-surface-container-lowest p-8 shadow-sm transition-all duration-300 md:p-10">
                        <div class="mb-8">
                                <h2 class="font-manrope mb-2 text-2xl font-bold text-on-surface">Bienvenue</h2>
                                <p class="text-sm text-on-surface-variant">Connectez-vous pour gérer vos factures en toute sécurité.</p>
                        </div>

                        @if ($errors->any())
                                <div class="mb-6 rounded-xl border border-error-container bg-error-container/50 px-4 py-3 text-sm font-medium text-on-error-container">
                                        {{ $errors->first() }}
                                </div>
                        @endif

                        <form class="space-y-6" method="POST" action="{{ route('client.login.submit') }}">
                                @csrf
                                <div class="space-y-2">
                                        <label class="pl-1 text-xs font-bold uppercase tracking-widest text-on-surface-variant">Email</label>
                                        <div class="relative flex items-center">
                                                <span class="material-symbols-outlined absolute left-4 text-xl text-slate-400">mail</span>
                                                <input
                                                        class="w-full rounded-xl border-none bg-surface-container-high py-4 pl-12 pr-4 font-body text-on-surface outline-none transition-all placeholder:text-slate-400 focus:ring-2 focus:ring-primary/20"
                                                        name="email" value="{{ old('email') }}" placeholder="nom@exemple.com" type="email" required autocomplete="email" autofocus />
                                        </div>
                                </div>

                                <div class="space-y-2">
                                        <div class="flex items-center justify-between px-1">
                                                <label class="text-xs font-bold uppercase tracking-widest text-on-surface-variant">Mot de passe</label>
                                                <a class="text-xs font-semibold text-primary hover:underline" href="{{ url('/#contact') }}">Oublié ?</a>
                                        </div>
                                        <div class="relative flex items-center">
                                                <span class="material-symbols-outlined absolute left-4 text-xl text-slate-400">lock</span>
                                                <input
                                                        class="w-full rounded-xl border-none bg-surface-container-high py-4 pl-12 pr-12 font-body text-on-surface outline-none transition-all placeholder:text-slate-400 focus:ring-2 focus:ring-primary/20"
                                                        name="password" placeholder="••••••••" type="password" required autocomplete="current-password" />
                                                <span class="material-symbols-outlined absolute right-4 cursor-pointer text-xl text-slate-400 transition-colors hover:text-primary">visibility</span>
                                        </div>
                                </div>

                                <label class="flex items-center gap-3 text-sm font-medium text-on-surface-variant">
                                        <input class="rounded border-slate-300 text-primary focus:ring-primary/20" name="remember" type="checkbox" value="1" />
                                        Se souvenir de moi
                                </label>

                                <button
                                        class="font-manrope mt-4 w-full rounded-xl bg-gradient-to-r from-primary to-primary-container py-4 text-lg font-bold text-on-primary shadow-lg shadow-primary/10 transition-all duration-150 hover:shadow-primary/20 active:scale-[0.98]"
                                        type="submit">
                                        Se connecter
                                </button>
                        </form>

                        <div class="mt-10 flex flex-col items-center space-y-4 border-t border-slate-100 pt-8">
                                <p class="text-sm text-on-surface-variant">Nouveau sur KhallasNow ?</p>
                                <a href="{{ url('/#contact') }}"
                                        class="font-manrope w-full rounded-xl bg-secondary-container px-6 py-4 text-center font-bold text-on-secondary-container transition-all hover:bg-secondary-container/80 active:scale-[0.98]">
                                        Demander un compte
                                </a>
                        </div>
                </div>

                <div class="mt-8 grid grid-cols-2 gap-4 opacity-70 transition-all duration-500 hover:opacity-100">
                        <div class="flex flex-col items-center justify-center space-y-2 rounded-2xl bg-white p-4 text-center">
                                <span class="material-symbols-outlined text-2xl text-primary" style="font-variation-settings: 'FILL' 1;">verified_user</span>
                                <span class="text-[10px] font-bold uppercase tracking-tighter">Sécurisé par TLS 1.3</span>
                        </div>
                        <div class="flex flex-col items-center justify-center space-y-2 rounded-2xl bg-white p-4 text-center">
                                <span class="material-symbols-outlined text-2xl text-on-secondary-container">language</span>
                                <span class="text-[10px] font-bold uppercase tracking-tighter">Disponible 24/7</span>
                        </div>
                </div>
        </main>

        <div class="pointer-events-none fixed left-0 top-0 -z-10 h-full w-full overflow-hidden">
                <div class="absolute -left-[10%] -top-[10%] h-[40%] w-[40%] rounded-full bg-primary/5 blur-[120px]"></div>
                <div class="absolute -bottom-[10%] -right-[10%] h-[40%] w-[40%] rounded-full bg-emerald-500/5 blur-[120px]"></div>
        </div>
</body>

</html>
