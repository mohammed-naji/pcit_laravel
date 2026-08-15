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
        <h1 class="text-2xl font-semibold">Student Registered Successfully</h1>
        <div class="bg-lime-100 p-6 rounded mt-6">
            <p><strong class="font-semibold">Name: </strong> {{ $name }}</p>
            <p><strong class="font-semibold">Email: </strong> {{ $email }}</p>
            <p><strong class="font-semibold">Phone: </strong> {{ $phone }}</p>
            <p><strong class="font-semibold">Collage: </strong> {{ $collage }}</p>
            <p><strong class="font-semibold">GBA: </strong> {{ $gba }}</p>
        </div>
    </div>



</body>

</html>
