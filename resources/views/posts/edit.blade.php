<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Post</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous"> --}}
</head>

<body>

    <main class="mx-auto mt-10 max-w-6xl px-6">
        <div class="mb-6 flex items-center justify-between gap-4">
            <div>
                <p class="text-sm font-medium uppercase tracking-wide text-sky-600">Blog management</p>
                <h1 class="mt-1 text-3xl font-bold text-slate-900">Edit Post: <span
                        class="text-sky-600">{{ $post->title }}</span></h1>
            </div>

            <a href="{{ route('posts.index') }}"
                class="rounded-lg bg-sky-600 px-4 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2 all-btn">
                All posts
            </a>
        </div>

        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @method('put')

            <x-input name="title" label="Title" value="{{ $post->title }}" />
            <x-input name="image" label="Image" type="file" value="{{ $post->image }}" />
            <x-textarea name="content" label="Content" value="{{ $post->content }}" />
            <button
                class="rounded-lg bg-sky-600 px-10 py-2 text-sm font-semibold text-white shadow-sm transition hover:bg-sky-700 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">Update</button>
        </form>


        <script>
            // let isUpdated = false;
            // document.querySelectorAll('input, textarea, select').forEach(el => {
            //     el.onchange = function() {
            //         isUpdated = true
            //     }
            // });

            // let all_btn = document.querySelector('.all-btn');
            // all_btn.onclick = function(e) {
            //     if (isUpdated) {
            //         e.preventDefault();
            //         if (confirm('هل تريد حفظ التعديلات')) {
            //             document.querySelector('form').submit();
            //         } else {
            //             window.location.href = all_btn.href
            //         }
            //     }
            // }

            let isUpdated = false;

            const form = document.querySelector('form');
            const allBtn = document.querySelector('.all-btn');

            // Detect changes
            form.querySelectorAll('input, textarea, select').forEach((el) => {
                el.addEventListener('change', () => {
                    isUpdated = true;
                });
            });

            // Handle your "All" button
            allBtn?.addEventListener('click', (e) => {
                if (!isUpdated) return;

                e.preventDefault();

                if (confirm('هل تريد حفظ التعديلات؟')) {
                    isUpdated = false;
                    form.submit();
                } else {
                    isUpdated = false;
                    window.location.href = allBtn.href;
                }
            });

            // Add a history entry
            history.pushState({
                formPage: true
            }, '', window.location.href);

            // Handle browser Back/Forward
            window.addEventListener('popstate', () => {
                if (!isUpdated) {
                    return;
                }

                const leave = confirm('لديك تعديلات لم يتم حفظها. هل تريد مغادرة الصفحة؟');

                if (leave) {
                    isUpdated = false;
                    history.back();
                } else {
                    // Stay on the current page
                    history.pushState({
                            formPage: true
                        },
                        '',
                        window.location.href
                    );
                }
            });

            // Handle refresh / close tab / external navigation
            window.addEventListener('beforeunload', (e) => {
                if (!isUpdated) return;

                e.preventDefault();
                e.returnValue = '';
            });
        </script>

    </main>


</body>

</html>
