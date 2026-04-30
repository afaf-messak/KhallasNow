<!DOCTYPE html>

<html class="light" lang="fr">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Bienvenue sur FatoraPay</title>
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
                                                "on-error-container": "#93000a",
                                                "surface-container-lowest": "#ffffff",
                                                "surface-dim": "#d8dadc",
                                                "on-secondary": "#ffffff",
                                                "error-container": "#ffdad6",
                                                "error": "#ba1a1a",
                                                "on-secondary-fixed": "#00201c",
                                                "primary-fixed": "#dae2ff",
                                                "surface-container-low": "#f2f4f6",
                                                "on-tertiary-fixed-variant": "#005312",
                                                "on-tertiary": "#ffffff",
                                                "inverse-primary": "#b2c5ff",
                                                "tertiary": "#004f11",
                                                "tertiary-fixed-dim": "#88d982",
                                                "on-tertiary-fixed": "#002204",
                                                "inverse-on-surface": "#eff1f3",
                                                "primary-container": "#0052cc",
                                                "on-background": "#191c1e",
                                                "secondary-fixed-dim": "#83d5c6",
                                                "on-primary-container": "#c4d2ff",
                                                "secondary-fixed": "#9ff2e2",
                                                "on-surface": "#191c1e",
                                                "surface-variant": "#e0e3e5",
                                                "surface-tint": "#0c56d0",
                                                "background": "#f7f9fb",
                                                "surface-container-high": "#e6e8ea",
                                                "surface-bright": "#f7f9fb",
                                                "secondary": "#006b5f",
                                                "surface-container-highest": "#e0e3e5",
                                                "surface-container": "#eceef0",
                                                "surface": "#f7f9fb",
                                                "outline-variant": "#c3c6d6",
                                                "on-secondary-fixed-variant": "#005047",
                                                "outline": "#737685",
                                                "on-primary": "#ffffff",
                                                "on-surface-variant": "#434654",
                                                "primary": "#003d9b",
                                                "on-primary-fixed": "#001848",
                                                "secondary-container": "#9cefdf",
                                                "tertiary-container": "#166921",
                                                "tertiary-fixed": "#a3f69c",
                                                "primary-fixed-dim": "#b2c5ff",
                                                "on-error": "#ffffff",
                                                "on-secondary-container": "#0b6f63",
                                                "on-primary-fixed-variant": "#0040a2",
                                                "inverse-surface": "#2d3133",
                                                "on-tertiary-container": "#94e68e"
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
                }

                .glass-effect {
                        backdrop-filter: blur(12px);
                        background: rgba(255, 255, 255, 0.7);
                }
        </style>
        <style>
                body {
                        min-height: max(884px, 100dvh);
                }
        </style>
</head>

<body
        class="bg-background font-body text-on-surface min-h-screen flex flex-col items-center justify-center p-6 md:p-12 selection:bg-primary-container selection:text-white">
        <!-- Navbar -->
        <header class="fixed top-0 w-full z-50">
                <nav class="glass-effect bg-white/60 backdrop-blur-sm border-b border-surface-container-lowest/30">
                        <div class="max-w-5xl mx-auto px-6 py-4 flex items-center justify-between">
                                <div class="flex items-center space-x-3 pointer-events-auto">
                                        <div
                                                class="w-10 h-10 bg-primary flex items-center justify-center rounded-xl shadow-md">
                                                <span
                                                        class="material-symbols-outlined text-white text-2xl">account_balance_wallet</span>
                                        </div>
                                        <a href="#" class="font-headline text-xl text-primary font-black">KhallasNow</a>
                                </div>
                                <div class="hidden md:flex items-center space-x-6">
                                        <a href="#" class="text-on-surface hover:text-primary font-medium">Accueil</a>
                                        <a href="#"
                                                class="text-on-surface hover:text-primary font-medium">Fonctionnalités</a>
                                        <a href="#" class="text-on-surface hover:text-primary font-medium">Tarifs</a>
                                        <a href="#" class="text-on-surface hover:text-primary font-medium">Contact</a>
                                        <a href="#"
                                                class="ml-4 px-4 py-2 bg-primary text-white rounded-lg font-bold">Connexion</a>
                                </div>
                                <button id="nav-toggle" aria-label="Open menu"
                                        class="md:hidden p-2 rounded-md bg-surface-container pointer-events-auto">
                                        <span class="material-symbols-outlined">menu</span>
                                </button>
                        </div>
                        <div id="mobile-menu" class="md:hidden hidden border-t border-surface-container-lowest/20">
                                <div class="px-6 py-4 flex flex-col space-y-2">
                                        <a href="#" class="py-2 text-on-surface font-medium">Accueil</a>
                                        <a href="#" class="py-2 text-on-surface font-medium">Fonctionnalités</a>
                                        <a href="#" class="py-2 text-on-surface font-medium">Tarifs</a>
                                        <a href="#" class="py-2 text-on-surface font-medium">Contact</a>
                                        <a href="#"
                                                class="py-2 px-4 bg-primary text-white rounded-lg font-bold w-max">Connexion</a>
                                </div>
                        </div>
                </nav>
        </header>
        <main class="w-full max-w-5xl mt-20">
                <!-- Hero Section -->
                <div class="text-center mb-16 max-w-2xl mx-auto">
                        <h2
                                class="font-headline text-4xl md:text-5xl font-extrabold text-on-background mb-4 leading-tight">
                                Gérez vos factures en toute sérénité.
                        </h2>
                        <p class="text-on-surface-variant text-lg md:text-xl font-medium opacity-80">
                                Bienvenue sur votre portail financier. Veuillez sélectionner votre profil pour
                                commencer.
                        </p>
                </div>
                <!-- Asymmetric Role Selection Grid -->
                <div class="grid md:grid-cols-2 gap-8 items-stretch">
                        <!-- User Space Card -->
                        <button
                                class="group relative flex flex-col items-start p-8 md:p-12 bg-surface-container-lowest rounded-[2.5rem] text-left transition-all duration-300 hover:scale-[1.02] hover:bg-white active:scale-95 overflow-hidden">
                                <div
                                        class="absolute top-0 right-0 w-48 h-48 bg-primary-container/10 rounded-bl-full -mr-12 -mt-12 transition-transform group-hover:scale-110">
                                </div>
                                <div
                                        class="relative z-10 w-16 h-16 rounded-2xl bg-primary-container flex items-center justify-center mb-10 shadow-inner">
                                        <span class="material-symbols-outlined text-on-primary-container text-4xl"
                                                data-icon="person">person</span>
                                </div>
                                <div class="relative z-10">
                                        <h3 class="font-headline text-3xl font-bold text-on-background mb-3">Espace
                                                Utilisateur</h3>
                                        <p class="text-on-surface-variant font-medium leading-relaxed mb-8 max-w-xs">
                                                Consultez vos factures, effectuez des paiements et gérez votre
                                                historique personnel.
                                        </p>
                                        <div class="flex items-center space-x-2 text-primary font-bold">
                                                <span>Se connecter</span>
                                                <span class="material-symbols-outlined transition-transform group-hover:translate-x-2"
                                                        data-icon="arrow_forward">arrow_forward</span>
                                        </div>
                                </div>
                        </button>
                        @auth
                                @if (auth()->user()->is_admin)
                                        <!-- Admin Space Card -->
                                        <button
                                                class="group relative flex flex-col items-start p-8 md:p-12 bg-surface-container rounded-[2.5rem] text-left transition-all duration-300 hover:scale-[1.02] hover:bg-surface-container-high active:scale-95 overflow-hidden border border-transparent hover:border-outline-variant/30">
                                                <div
                                                        class="absolute bottom-0 right-0 w-64 h-64 bg-secondary-container/20 rounded-tl-full -mr-20 -mb-20 transition-transform group-hover:scale-110">
                                                </div>
                                                <div
                                                        class="relative z-10 w-16 h-16 rounded-2xl bg-on-background flex items-center justify-center mb-10 shadow-lg">
                                                        <span class="material-symbols-outlined text-surface-container-lowest text-4xl"
                                                                data-icon="admin_panel_settings">admin_panel_settings</span>
                                                </div>
                                                <div class="relative z-10">
                                                        <h3 class="font-headline text-3xl font-bold text-on-background mb-3">Espace
                                                                Administrateur</h3>
                                                        <p class="text-on-surface-variant font-medium leading-relaxed mb-8 max-w-xs">
                                                                Accédez au tableau de bord, gérez les utilisateurs et supervisez l'audit
                                                                des factures.
                                                        </p>
                                                        <div class="flex items-center space-x-2 text-on-background font-bold">
                                                                <span>Gestion système</span>
                                                                <span class="material-symbols-outlined transition-transform group-hover:translate-x-2"
                                                                        data-icon="chevron_right">chevron_right</span>
                                                        </div>
                                                </div>
                                        </button>
                                @endif
                        @endauth
                </div>
                <!-- Secondary Information / Trust Bar -->
                <div class="mt-20 flex flex-wrap justify-center gap-x-12 gap-y-8 opacity-60">
                        <div class="flex items-center space-x-2">
                                <span class="material-symbols-outlined text-sm"
                                        data-icon="verified_user">verified_user</span>
                                <span class="text-xs font-bold tracking-widest uppercase">Sécurisé par TLS 1.3</span>
                        </div>
                        <div class="flex items-center space-x-2">
                                <span class="material-symbols-outlined text-sm" data-icon="update">update</span>
                                <span class="text-xs font-bold tracking-widest uppercase">Mise à jour temps réel</span>
                        </div>
                        <div class="flex items-center space-x-2">
                                <span class="material-symbols-outlined text-sm"
                                        data-icon="support_agent">support_agent</span>
                                <span class="text-xs font-bold tracking-widest uppercase">Support 24/7 disponible</span>
                        </div>
                </div>
        </main>
        <!-- Decorative Elements -->
        <div class="fixed top-1/4 -left-32 w-96 h-96 bg-primary/5 rounded-full blur-[100px] pointer-events-none"></div>
        <div class="fixed bottom-1/4 -right-32 w-96 h-96 bg-secondary/5 rounded-full blur-[100px] pointer-events-none">
        </div>
        <!-- Footer -->
        <footer class="mt-auto py-8 text-on-surface-variant/50 text-xs font-medium">
                © 2024 FatoraPay Financial Services. Tous droits réservés.
        </footer>

        <script>
                        (function () {
                                const btn = document.getElementById('nav-toggle');
                                const menu = document.getElementById('mobile-menu');
                                if (!btn || !menu) return;
                                btn.addEventListener('click', function () {
                                        menu.classList.toggle('hidden');
                                });
                        })();
        </script>
</body>

</html>