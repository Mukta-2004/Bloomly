<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Booking - Bloomly Admin</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff9f9;
            color: #333;
            padding: 2rem;
        }

        .form-card {
            max-width: 500px;
            margin: 0 auto;
            background: #fff;
            border: 2px solid #f0e0e4;
            border-radius: 16px;
            padding: 2rem;
        }

        h1 {
            font-family: Georgia, serif;
            font-size: 22px;
            margin-bottom: 1.5rem;
            text-align: center;
        }

        label {
            display: block;
            font-size: 13px;
            color: #666;
            margin-bottom: 4px;
            margin-top: 14px;
        }

        input,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #f0e0e4;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 80px;
        }

        .btn-save {
            margin-top: 1.5rem;
            width: 100%;
            background: #e8748a;
            color: #fff;
            border: none;
            padding: 12px;
            border-radius: 20px;
            font-size: 14px;
            cursor: pointer;
        }

        .error {
            color: #c0392b;
            font-size: 12px;
            margin-top: 2px;
        }

        a.back {
            display: inline-block;
            margin-bottom: 1rem;
            color: #888;
            text-decoration: none;
            font-size: 13px;
        }
    </style>
</head>

<body>

    <a href="{{ route('admin.dashboard') }}" class="back">← Back to Dashboard</a>

    <div class="form-card">
        <h1>Edit Booking</h1>

        <form method="POST" action="{{ route('admin.bookings.update', $arrangement) }}">
            @csrf
            @method('PUT')

            <label>Title</label>
            <input type="text" name="title" value="{{ old('title', $arrangement->title) }}">
            @error('title')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Occasion</label>
            <input type="text" name="occasion" value="{{ old('occasion', $arrangement->occasion) }}">
            @error('occasion')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Price</label>
            <input type="number" step="0.01" name="price" value="{{ old('price', $arrangement->price) }}">
            @error('price')
                <div class="error">{{ $message }}</div>
            @enderror

            <label>Description</label>
            <textarea name="description">{{ old('description', $arrangement->description) }}</textarea>
            @error('description')
                <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit" class="btn-save">Save Changes</button>
        </form>
    </div>

</body>

</html>