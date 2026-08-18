<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Simple Contact Us</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <main>
        <section class="py-20 text-center bg-slate-800 text-white">
            <h1 class="text-4xl font-semibold">Contact Us</h1>
            <p class="mt-4 text-2xl font-thin">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quo, culpa.</p>
        </section>

        <section class="max-w-4xl mx-auto my-10">
            <form action="{{ route('contact') }}" method="POST">
                <x-input name="name" placeholder="Enter your Name" />
                <x-input name="email" type="email" placeholder="Enter your Email Address" />
                <x-input name="subject" placeholder="Enter your Subject" />
                <x-textarea name="message" placeholder="Enter your Message" />
                <button
                    class="bg-sky-600 text-white rounded-lg px-6 py-2 cursor-pointer duration-200 hover:bg-sky-700">Send</button>
            </form>
        </section>
    </main>

</body>

</html>
