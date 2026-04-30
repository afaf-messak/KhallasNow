<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="utf-8" />
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <title>Espace Client - KhallasNow</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@500;700;800&amp;family=Inter:wght@400;500;600;700&amp;display=swap"
                rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap"
                rel="stylesheet" />
        <style>
                body {
                        font-family: 'Inter', sans-serif;
                }

                h1,
                h2 {
                        font-family: 'Manrope', sans-serif;
                }
        </style>
</head>

<body class="min-h-screen bg-[#f7f9fb] text-slate-900">
        <header class="border-b border-slate-200 bg-white">
                <div class="mx-auto flex max-w-6xl items-center justify-between px-5 py-4">
                        <a href="{{ url('/') }}" class="flex items-center gap-3">
                                <span class="flex h-10 w-10 items-center justify-center rounded-xl bg-[#003d9b] text-white">
                                        <span class="material-symbols-outlined">account_balance_wallet</span>
                                </span>
                                <span class="text-xl font-extrabold text-[#003d9b]">KhallasNow</span>
                        </a>
                        <form method="POST" action="{{ route('client.logout') }}">
                                @csrf
                                <button class="rounded-xl bg-slate-100 px-4 py-2 text-sm font-bold text-slate-700 hover:bg-slate-200" type="submit">
                                        Déconnexion
                                </button>
                        </form>
                </div>
        </header>

        <main class="mx-auto max-w-6xl px-5 py-12">
                <div class="rounded-[2rem] bg-white p-8 shadow-sm">
                        <p class="text-sm font-bold uppercase tracking-widest text-slate-400">Espace Client</p>
                        <h1 class="mt-2 text-3xl font-extrabold">Bienvenue {{ auth()->user()->name }}</h1>
                        <p class="mt-3 max-w-2xl text-slate-600">
                                Votre espace client est prêt. Les factures, paiements et historiques pourront être affichés ici.
                        </p>
                </div>
        </main>
</body>

</html>
