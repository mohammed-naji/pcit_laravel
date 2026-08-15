<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

</head>

<body>

    <div class="max-w-5xl mx-auto my-10">
        <h1 class="text-2xl font-semibold">Register New Student</h1>
        <form action="{{ route('students.register') }}" method="POST">
            {{-- <x-input name="name" label="Name" placeholder="Enter The name" /> --}}
            <x-input name="email" label="Email" type="email" />
            <x-input name="phone" label="Phone" />
            <x-input name="collage" label="Collage" />
            <x-input name="gba" label="GBA" type="number" />

            <button class="bg-sky-800 text-white px-4 py-2 rounded hover:bg-sky-700 cursor-pointer">Register</button>
        </form>
    </div>



</body>

</html>
