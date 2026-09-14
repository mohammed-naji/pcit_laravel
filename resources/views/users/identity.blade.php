<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Check User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .search-wrapper {
            position: relative;
        }

        .search-wrapper .result {
            position: absolute;
            z-index: 55;
            width: 100%
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <h1>Search Using ID Number</h1>
        <form action="{{ route('identity') }}" method="GET">
            <div class="search-wrapper">
                <input type="text" name="id_num" placeholder="Ex. 20124578" id="search-input"
                    class="form-control form-control-lg">
                <div class="result">
                    <ul class="list-group d-none">

                    </ul>
                </div>
            </div>
        </form>

        @if ($id)
            <div class="alert alert-success mt-4">
                <p><strong>Name:</strong> {{ $id->user->name }}</p>
                <p><strong>Email:</strong> {{ $id->user->email }}</p>
                <p><strong>ID Number:</strong> {{ $id->id_num }}</p>
                <p><strong>ID Release Date:</strong> {{ $id->release_date }}</p>
                <p><strong>ID Expire Date:</strong> {{ $id->expire_date }}</p>
            </div>
        @endif
    </div>




    <script>
        let input = document.querySelector('#search-input')
        input.onkeyup = function() {
            fetch('/identity-check/' + input.value)
                .then((res) => res.json())
                .then(res => {
                    res.forEach(el => {
                        console.log(el.user.name);

                    });
                })
                .catch((err) => {

                });
        }
    </script>
</body>

</html>
