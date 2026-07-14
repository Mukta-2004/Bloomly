<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Arrangement - Bloomly</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h2> Edit Arrangement</h2>

    <form action="{{ route('arrangements.update', $arrangement) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Title</label>
            <input type="text" name="title" class="form-control" value="{{ $arrangement->title }}" required>
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control" rows="3" required>{{ $arrangement->description }}</textarea>
        </div>
        <div class="mb-3">
            <label>Occasion</label>
            <select name="occasion" class="form-control" required>
                <option value="wedding" {{ $arrangement->occasion == 'wedding' ? 'selected' : '' }}>Wedding</option>
                <option value="birthday" {{ $arrangement->occasion == 'birthday' ? 'selected' : '' }}>Birthday</option>
                <option value="anniversary" {{ $arrangement->occasion == 'anniversary' ? 'selected' : '' }}>Anniversary</option>
                <option value="other" {{ $arrangement->occasion == 'other' ? 'selected' : '' }}>Other</option>
            </select>
        </div>
        <div class="mb-3">
            <label>Price (৳)</label>
            <input type="number" name="price" class="form-control" step="0.01" value="{{ $arrangement->price }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('arrangements.index') }}" class="btn btn-secondary">Back</a>
    </form>
</div>
</body>
</html>