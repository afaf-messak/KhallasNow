<!DOCTYPE html>
<html lang="en">

<head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Edit User - FatoraPay Admin</title>
        <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap"
                rel="stylesheet" />
        <style>
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

<body class="bg-background text-on-background min-h-screen p-8">
        <div class="max-w-4xl mx-auto bg-white rounded-3xl shadow-lg border border-slate-200 overflow-hidden">
                <div class="px-8 py-6 border-b border-slate-100 bg-surface-container-lowest">
                        <div class="flex items-center justify-between gap-4">
                                <div>
                                        <h1 class="text-2xl font-bold text-slate-900">Edit User</h1>
                                        <p class="text-sm text-slate-500">Update the profile for {{ $user->name }}</p>
                                </div>
                                <a href="{{ route('admin.users.index') }}"
                                        class="inline-flex items-center gap-2 bg-primary text-white px-4 py-2 rounded-full font-semibold hover:bg-blue-700 transition">
                                        <span class="material-symbols-outlined">arrow_back</span>
                                        Back to users
                                </a>
                        </div>
                </div>
                <div class="px-8 py-8">
                        <form method="POST" action="{{ route('admin.users.update', $user) }}" class="space-y-6">
                                @csrf
                                @method('PUT')
                                <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Name</label>
                                        <input name="name" value="{{ old('name', $user->name) }}"
                                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm" />
<<<<<<< HEAD
                                        @error('name') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
=======
                                        @error('name')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                        @enderror
>>>>>>> afaf
                                </div>
                                <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Email</label>
                                        <input name="email" type="email" value="{{ old('email', $user->email) }}"
                                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm" />
<<<<<<< HEAD
                                        @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
=======
                                        @error('email')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
>>>>>>> afaf
                                        @enderror
                                </div>
                                <div>
                                        <label class="block text-sm font-semibold text-slate-700 mb-2">Status</label>
                                        <select name="status"
                                                class="w-full rounded-2xl border border-slate-200 bg-slate-50 px-4 py-3 text-sm">
<<<<<<< HEAD
                                                @foreach($statuses as $status)
                                                        <option value="{{ $status }}" {{ old('status', $user->status) === $status ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                        </select>
                                        @error('status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
=======
                                                @foreach ($statuses as $status)
                                                        <option value="{{ $status }}" {{ old('status', $user->status) === $status ? 'selected' : '' }}>{{ $status }}</option>
                                                @endforeach
                                        </select>
                                        @error('status')
                                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
>>>>>>> afaf
                                        @enderror
                                </div>
                                <div class="flex flex-wrap gap-3">
                                        <button type="submit"
                                                class="bg-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-blue-700 transition">Save
                                                changes</button>
                                        <a href="{{ route('admin.users.index') }}"
                                                class="inline-flex items-center gap-2 border border-slate-200 px-6 py-3 rounded-xl text-slate-700 hover:bg-slate-50 transition">Cancel</a>
                                </div>
                        </form>
                </div>
        </div>
</body>

</html>