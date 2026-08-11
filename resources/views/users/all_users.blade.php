<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Users</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <h1>All Users</h1>
        {{-- @dump(count($users)) --}}
        <table class="table table-hover table-bordered">
            <thead>
                <tr class="table-dark">
                    <th>#</th>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) > 0)
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user[0] }}</td>
                            <td>{{ $user[1] }}</td>
                            <td>{{ $user[3] }}</td>
                            <td>{{ $user[2] }}</td>
                            <td></td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class="text-center">No Users Found!!</td>
                    </tr>
                @endif

            </tbody>
        </table>
    </div>

</body>

</html>
