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
                    <th>Email</th>
                    <th>ID Number</th>
                    <th>ID Release Date</th>
                    <th>ID Expire Date</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->identity->id_num }}</td>
                        <td>{{ $user->identity->release_date }}</td>
                        <td>{{ $user->identity->expire_date ?? 'ddd' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">No Users Found!!</td>
                    </tr>
                @endforelse

            </tbody>
        </table>
    </div>

</body>

</html>
