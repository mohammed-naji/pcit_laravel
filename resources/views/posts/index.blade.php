<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Posts</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <main class="mx-auto mt-10 max-w-6xl px-6">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium uppercase tracking-wide text-sky-600">Blog management</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-900">All Posts</h1>
            </div>

            <a href="{{ route('posts.create') }}"
                class="rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                Add post
            </a>
        </div>

        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                ID</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Title</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Image</th>
                            <th scope="col"
                                class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wide text-slate-500">
                                Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-200 bg-white">
                        @forelse ($posts as $post)
                            <tr class="transition hover:bg-slate-50">
                                <td class="whitespace-nowrap px-6 py-4 text-sm font-medium text-slate-700">
                                    {{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-sm font-semibold text-slate-900">{{ $post->title }}</td>
                                <td class="px-6 py-4">
                                    <img src="{{ asset($post->image) }}" alt="{{ $post->title }}"
                                        class="h-14 w-20 rounded-md object-cover ring-1 ring-slate-200">
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="flex justify-end gap-2">
                                        <a href="{{ route('posts.show', $post) }}"
                                            class="rounded-md border border-slate-300 px-3 py-1.5 text-sm font-medium text-slate-700 transition hover:bg-slate-100">
                                            View
                                        </a>
                                        <a href="{{ route('posts.edit', $post) }}"
                                            class="rounded-md bg-amber-500 px-3 py-1.5 text-sm font-medium text-white transition hover:bg-amber-600">
                                            Edit
                                        </a>
                                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="rounded-md bg-red-600 px-3 py-1.5 text-sm font-medium text-white transition hover:bg-red-700">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-12 text-center text-sm text-slate-500">No posts found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>


</body>

</html>
