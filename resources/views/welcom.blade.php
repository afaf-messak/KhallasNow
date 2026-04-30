<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>KhallasNow - Gestion de factures</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;600;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
                rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <script>
                tailwind.config = {
                        theme: {
                                extend: {
                                        colors: {
                                                primary: '#004aad',
                                                ink: '#172033',
                                                muted: '#667085',
                                                soft: '#f5f8fc',
                                                mint: '#0f9f8f'
                                        },
                                        fontFamily: {
                                                body: ['Inter', 'sans-serif'],
                                                headline: ['Manrope', 'sans-serif']
                                        },
                                        boxShadow: {
                                                soft: '0 18px 50px rgba(15, 38, 71, 0.10)'
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
                h3,
                .font-headline {
                        font-family: 'Manrope', sans-serif;
                }

                .material-symbols-outlined {
                        font-variation-settings: 'FILL' 0, 'wght' 500, 'GRAD' 0, 'opsz' 24;
                        vertical-align: middle;
                }
        </style>
</head>

<body class="min-h-screen overflow-x-hidden bg-soft text-ink">
        <header class="sticky top-0 z-50 border-b border-slate-200/70 bg-white/90 backdrop-blur">
                <nav class="mx-auto flex max-w-6xl items-center justify-between px-5 py-4">
                        <a href="{{ url('/') }}" class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-primary text-white shadow-lg shadow-primary/25">
                                        <span class="material-symbols-outlined" style="font-variation-settings: 'FILL' 1;">account_balance_wallet</span>
                                </span>
                                <span class="font-headline text-xl font-extrabold tracking-tight text-primary">KhallasNow</span>
                        </a>

                        <div class="hidden items-center gap-7 text-sm font-semibold text-slate-700 md:flex">
                                <a href="#accueil" class="hover:text-primary">Accueil</a>
                                <a href="#fonctionnalites" class="hover:text-primary">Fonctionnalites</a>
                                <a href="#tarifs" class="hover:text-primary">Tarifs</a>
                                <a href="#contact" class="hover:text-primary">Contact</a>
                                <a href="{{ route('client.login') }}"
                                        class="rounded-lg bg-primary px-5 py-2.5 font-bold text-white shadow-lg shadow-primary/20 transition hover:bg-blue-700">
                                        Connexion
                                </a>
                        </div>

                        <button id="menuBtn" class="rounded-lg border border-slate-200 bg-white p-2 text-slate-700 md:hidden" aria-label="Menu">
                                <span class="material-symbols-outlined">menu</span>
                        </button>
                </nav>
                <div id="mobileMenu" class="hidden border-t border-slate-200 bg-white px-5 py-4 md:hidden">
                        <div class="mx-auto flex max-w-6xl flex-col gap-3 text-sm font-semibold text-slate-700">
                                <a href="#accueil">Accueil</a>
                                <a href="#fonctionnalites">Fonctionnalites</a>
                                <a href="#tarifs">Tarifs</a>
                                <a href="#contact">Contact</a>
                                <a href="{{ route('client.login') }}" class="w-max rounded-lg bg-primary px-5 py-2.5 font-bold text-white">Connexion</a>
                        </div>
                </div>
        </header>

        <main id="accueil">
                <section class="relative mx-auto grid max-w-6xl items-center gap-12 px-5 py-16 md:grid-cols-[1.05fr_0.95fr] md:py-24">
                        <div class="relative z-10">
                                <p class="mb-5 inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-4 py-2 text-xs font-bold uppercase tracking-wider text-primary shadow-sm">
                                        <span class="h-2 w-2 rounded-full bg-mint"></span>
                                        Portail financier simple et securise
                                </p>
                                <h1 class="font-headline text-4xl font-extrabold leading-tight tracking-tight text-ink md:text-6xl">
                                        Gérez vos factures en toute sérénité.
                                </h1>
                                <p class="mt-5 max-w-xl text-lg font-medium leading-8 text-muted">
                                        Centralisez vos factures, suivez les paiements et gardez une vision claire sur votre activité depuis un seul espace.
                                </p>
                                <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                                        <a href="{{ route('client.login') }}"
                                                class="inline-flex items-center justify-center gap-2 rounded-xl bg-primary px-6 py-3 text-sm font-bold text-white shadow-lg shadow-primary/25 transition hover:bg-blue-700">
                                                Commencer
                                                <span class="material-symbols-outlined text-lg">arrow_forward</span>
                                        </a>
                                        <a href="#fonctionnalites"
                                                class="inline-flex items-center justify-center gap-2 rounded-xl border border-slate-200 bg-white px-6 py-3 text-sm font-bold text-slate-700 transition hover:border-primary hover:text-primary">
                                                Voir les services
                                        </a>
                                </div>
                        </div>

                        <div class="relative">
                                <div class="absolute -right-8 -top-10 h-44 w-44 rounded-full bg-blue-100"></div>
                                <div class="absolute -bottom-8 -left-8 h-36 w-36 rounded-full bg-emerald-100"></div>
                                <div class="relative overflow-hidden rounded-[2rem] border border-white bg-white p-6 shadow-soft">
                                        <div class="mb-6 flex items-center justify-between">
                                                <div>
                                                        <p class="text-xs font-bold uppercase tracking-widest text-slate-400">Apercu mensuel</p>
                                                        <h2 class="mt-1 text-2xl font-extrabold text-ink">Aperçu financier</h2>
                                                </div>
                                                <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-bold text-mint">Live</span>
                                        </div>
                                        <div class="grid grid-cols-2 gap-3">
                                                <div class="rounded-2xl bg-slate-50 p-4">
                                                        <span class="material-symbols-outlined text-primary">receipt_long</span>
                                                        <p class="mt-5 text-2xl font-extrabold">128</p>
                                                        <p class="text-xs font-semibold text-muted">Factures</p>
                                                </div>
                                                <div class="rounded-2xl bg-primary p-4 text-white">
                                                        <span class="material-symbols-outlined">payments</span>
                                                        <p class="mt-5 text-2xl font-extrabold">92%</p>
                                                        <p class="text-xs font-semibold text-blue-100">Payees</p>
                                                </div>
                                                <div class="col-span-2 rounded-2xl bg-slate-50 p-4">
                                                        <div class="mb-3 flex items-center justify-between text-xs font-bold text-muted">
                                                                <span>Flux des paiements</span>
                                                                <span>+18%</span>
                                                        </div>
                                                        <div class="flex h-20 items-end gap-2">
                                                                <span class="flex-1 rounded-t-lg bg-blue-200" style="height: 45%"></span>
                                                                <span class="flex-1 rounded-t-lg bg-blue-300" style="height: 62%"></span>
                                                                <span class="flex-1 rounded-t-lg bg-primary" style="height: 85%"></span>
                                                                <span class="flex-1 rounded-t-lg bg-emerald-300" style="height: 58%"></span>
                                                                <span class="flex-1 rounded-t-lg bg-primary" style="height: 72%"></span>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </section>

                <section id="fonctionnalites" class="border-y border-slate-200 bg-white">
                        <div class="mx-auto max-w-6xl px-5 py-16">
                                <div class="max-w-2xl">
                                        <h2 class="text-3xl font-extrabold tracking-tight">Fonctionnalités essentielles</h2>
                                        <p class="mt-3 font-medium leading-7 text-muted">Tout ce qu'il faut pour suivre vos factures sans complexité.</p>
                                </div>
                                <div class="mt-10 grid gap-5 md:grid-cols-3">
                                        <div class="rounded-2xl border border-slate-100 bg-soft p-6">
                                                <span class="material-symbols-outlined text-primary">verified_user</span>
                                                <h3 class="mt-5 font-extrabold">Acces securise</h3>
                                                <p class="mt-2 text-sm leading-6 text-muted">Un acces protege pour consulter vos informations et vos factures.</p>
                                        </div>
                                        <div class="rounded-2xl border border-slate-100 bg-soft p-6">
                                                <span class="material-symbols-outlined text-primary">monitoring</span>
                                                <h3 class="mt-5 font-extrabold">Suivi clair</h3>
                                                <p class="mt-2 text-sm leading-6 text-muted">Visualisez les paiements, statuts et historiques en quelques clics.</p>
                                        </div>
                                        <div class="rounded-2xl border border-slate-100 bg-soft p-6">
                                                <span class="material-symbols-outlined text-primary">download</span>
                                                <h3 class="mt-5 font-extrabold">Documents disponibles</h3>
                                                <p class="mt-2 text-sm leading-6 text-muted">Retrouvez facilement vos recus, factures et historiques de paiement.</p>
                                        </div>
                                </div>
                        </div>
                </section>

                <section id="tarifs" class="mx-auto max-w-6xl px-5 py-16">
                        <div class="rounded-[2rem] bg-primary p-8 text-white shadow-soft md:p-10">
                                <div class="flex flex-col gap-6 md:flex-row md:items-center md:justify-between">
                                        <div>
                                                <p class="text-sm font-bold uppercase tracking-widest text-blue-100">Tarifs</p>
                                                <h2 class="mt-2 text-3xl font-extrabold">Une solution flexible pour votre activité</h2>
                                                <p class="mt-3 max-w-2xl leading-7 text-blue-100">Commencez avec les outils essentiels, puis adaptez votre usage selon le volume de factures et d'utilisateurs.</p>
                                        </div>
                                        <a href="#contact" class="inline-flex w-max items-center justify-center rounded-xl bg-white px-6 py-3 text-sm font-bold text-primary">
                                                Demander une offre
                                        </a>
                                </div>
                        </div>
                </section>

                <section id="contact" class="mx-auto max-w-6xl px-5 pb-16">
                        <div class="grid gap-6 rounded-[2rem] border border-slate-200 bg-white p-8 shadow-sm md:grid-cols-[0.8fr_1.2fr]">
                                <div>
                                        <h2 class="text-3xl font-extrabold">Contact</h2>
                                        <p class="mt-3 leading-7 text-muted">Besoin d'aide pour configurer votre espace KhallasNow ? Notre equipe vous accompagne.</p>
                                </div>
                                <div class="grid gap-3 sm:grid-cols-2">
                                        <div class="rounded-2xl bg-soft p-5">
                                                <span class="material-symbols-outlined text-primary">mail</span>
                                                <p class="mt-3 text-sm font-bold">support@khallasnow.test</p>
                                        </div>
                                        <div class="rounded-2xl bg-soft p-5">
                                                <span class="material-symbols-outlined text-primary">schedule</span>
                                                <p class="mt-3 text-sm font-bold">Support disponible 24/7</p>
                                        </div>
                                </div>
                        </div>
                </section>
        </main>

        <footer class="border-t border-slate-200 bg-white px-5 py-8">
                <div class="mx-auto flex max-w-6xl flex-col gap-3 text-sm font-medium text-muted sm:flex-row sm:items-center sm:justify-between">
                        <p>© 2026 KhallasNow. Tous droits réservés.</p>
                        <p>Factures, paiements et suivi financier.</p>
                </div>
        </footer>

        <script>
                const btn = document.getElementById('menuBtn');
                const menu = document.getElementById('mobileMenu');
                btn?.addEventListener('click', () => menu?.classList.toggle('hidden'));
        </script>
</body>

</html>
