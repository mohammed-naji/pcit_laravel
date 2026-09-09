<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create New Post</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> --}}
</head>

<body>

    <main class="mx-auto mt-10 max-w-6xl px-6">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium uppercase tracking-wide text-sky-600">Blog management</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-900">Add new Post</h1>
            </div>

            <a href="{{ route('posts.index') }}"
                class="rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                All posts
            </a>
        </div>

        <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
            <x-input name="title" label="Title" />
            <x-input name="image" label="Image" type="file" />
            <x-textarea name="content" label="Content" />
            <button
                class="rounded-lg bg-sky-600 px-10 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Post</button>
        </form>


    </main>


</body>

</html>
