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
        <h1 class="text-2xl font-semibold">Edit User: {{ $id }}</h1>
        <form action="{{ route('edit_user', $id) }}" method="POST">
            <button class="bg-cyan-600 p-1">Edit</button>
        </form>
    </div>

</body>

</html>
