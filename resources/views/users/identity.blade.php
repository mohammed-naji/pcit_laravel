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

        {{-- @if ($id)
            <div class="alert alert-success mt-4">
                <p><strong>Name:</strong> {{ $id->user->name }}</p>
                <p><strong>Email:</strong> {{ $id->user->email }}</p>
                <p><strong>ID Number:</strong> {{ $id->id_num }}</p>
                <p><strong>ID Release Date:</strong> {{ $id->release_date }}</p>
                <p><strong>ID Expire Date:</strong> {{ $id->expire_date }}</p>
            </div>
        @endif --}}

        <div class="alert alert-success d-none user_result mt-4">
            <p><strong>Name:</strong> <span class="user_name"></span></p>
            <p><strong>Email:</strong> <span class="user_email"></span></p>
            <p><strong>ID Number:</strong> <span class="user_id"></span></p>
            <p><strong>ID Release Date:</strong> <span class="user_release_date"></span></p>
            <p><strong>ID Expire Date:</strong> <span class="user_expire_date"></span></p>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/axios@1.19.0/dist/axios.min.js"></script>
    <script>
        let input = document.querySelector('#search-input')
        let result = document.querySelector('.result ul')

        let user_name = document.querySelector('.user_name');
        let user_email = document.querySelector('.user_email');
        let user_id = document.querySelector('.user_id');
        let user_release_date = document.querySelector('.user_release_date');
        let user_expire_date = document.querySelector('.user_expire_date');
        let user_result = document.querySelector('.user_result');


        document.querySelector('form').onsubmit = (e) => e.preventDefault();


        input.onkeyup = function(e) {


            if (input.value.length > 0) {
                if (e.keyCode == 13) {
                    axios.get('/identity-check/' + input.value)
                        .then((res) => {
                            if (res.data.length > 0) {
                                result.classList.add('d-none');
                                user_name.innerHTML = res.data[0].user.name;
                                user_email.innerHTML = res.data[0].user.email;
                                user_id.innerHTML = res.data[0].id_num;
                                user_release_date.innerHTML = res.data[0].release_date;
                                user_expire_date.innerHTML = res.data[0].expire_date;
                                user_result.classList.remove('d-none')
                            } else {
                                user_result.classList.add('d-none')
                            }
                        }).catch((err) => {

                        });
                } else {
                    axios.get('/identity-check/' + input.value)
                        .then((res) => {
                            result.innerHTML = '';
                            res.data.forEach(el => {
                                result.innerHTML += `<li class="list-group-item">${el.user.name}</li>`
                            });
                            result.classList.remove('d-none');

                        }).catch((err) => {

                        });
                }
            } else {
                result.classList.add('d-none');
            }


            // fetch('/identity-check/' + input.value)
            //     .then((res) => res.json())
            //     .then(res => {
            //         result.innerHTML = '';
            //         res.forEach(el => {
            //             result.innerHTML += `<li class="list-group-item">${el.user.name}</li>`
            //         });
            //         result.classList.remove('d-none');
            //     })
            //     .catch((err) => {

            //     });
        }

        input.onblur = function() {
            result.classList.add('d-none')
        }
    </script>
</body>

</html>
