<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>Admin Dashboard</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
</head>

<body class="bg-background text-on-background min-h-screen">
        @include('admin._sidebar')
        <main class="ml-64 p-8">
                <h1 class="text-3xl font-bold">Dashboard</h1>
                <p class="mt-4 text-slate-600">Welcome to the admin dashboard. Use the sidebar to navigate between
                        sections.</p>
        </main>
</body>

</html>