<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Upload File</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        .btn {
            @apply bg-sky-600 text-white px-6 py-2 rounded duration-200 hover:bg-sky-500 cursor-pointer;
        }
    </style>
    <style>
        /* .image-wrapper input {
            display: none;
        }

        .image-wrapper label {
            padding: 40px;
            text-align: center;
            border: 1px dashed #000;
            display: block;
            cursor: pointer;
        } */
    </style>
</head>

<body>

    <div class="max-w-5xl mx-auto my-10">
        <h1 class="font-bold text-2xl">Uploaded successfully</h1>

        <p>Name: {{ $name }}</p>
        <img width="300" src="{{ asset($path) }}" alt="">
    </div>

</body>

</html>
