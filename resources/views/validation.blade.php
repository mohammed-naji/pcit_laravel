<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form Validation</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body>

    <div class="max-w-5xl mx-auto my-10">
        <h1 class="font-semibold text-xl mb-6">Form Validation</h1>
        {{-- @dump($errors) --}}
        {{-- @dump($errors->any()) --}}
        {{-- @dump($errors->all()) --}}
        {{-- @if ($errors->any())
            <div class="bg-red-100 my-6 text-red-700 p-6 rounded">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif --}}

        {{-- {{ isset($_POST['email']) ? $_POST['email'] : '' }} --}}

        <form action="{{ route('validation') }}" method="POST">
            <x-input name="email" label="Email Address" placeholder="Enter your email address" type="email" />
            <x-input name="password" label="Password" placeholder="Enter your password" type="password" />
            <x-input name="age" label="Your Age" placeholder="Enter your age" type="number" />
            <x-textarea name="bio" label="Your Bio" placeholder="Enter your bio"></x-textarea>
            <button
                class="bg-amber-500 cursor-pointer duration-300 hover:bg-amber-600 text-white px-4 py-2 rounded">Login</button>
        </form>
    </div>

</body>

</html>
