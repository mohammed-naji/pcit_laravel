<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us With File</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        .btn {
            @apply bg-sky-600 text-white px-6 py-2 rounded duration-200 hover:bg-sky-500 cursor-pointer;
        }
    </style>
</head>

<body>

    <main>
        <section class="py-20 text-center bg-slate-800 text-white">
            <h1 class="text-4xl font-semibold">Contact Us With File</h1>
            <p class="mt-4 text-2xl font-thin">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo, culpa.</p>
        </section>
        {{-- name, email, subject, file, message --}}
        <section class="max-w-4xl mx-auto my-10">
            <form action="{{ route('contact2') }}" method="POST" enctype="multipart/form-data">
                <div class="grid grid-cols-2 gap-x-6">
                    <x-input name="name" label="Name" />
                    <x-input name="email" type="email" label="Email" />
                    <x-input name="subject" label="Subject" />
                    <x-input type="file" name="file" label="File" />
                </div>
                <x-textarea name="message" label="Message"></x-textarea>
                <button class="btn">Send</button>
            </form>
        </section>
    </main>

</body>

</html>
