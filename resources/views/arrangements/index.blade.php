<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Arrangements - Bloomly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <h2> Flower Arrangements</h2>
    <a href="{{ route('arrangements.create') }}" class="btn btn-primary mb-3">Add New Arrangement</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Occasion</th>
                <th>Price</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($arrangements as $arrangement)
            <tr>
                <td>{{ $arrangement->id }}</td>
                <td>{{ $arrangement->title }}</td>
                <td>{{ $arrangement->occasion }}</td>
                <td>৳{{ $arrangement->price }}</td>
                <td>
                    <a href="{{ route('arrangements.edit', $arrangement) }}" class="btn btn-warning btn-sm">Edit</a>
                </td>
                <td>
                    <form action="{{ route('arrangements.destroy', $arrangement) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>