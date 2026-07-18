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

        <label>Occasion</label>
        <input type="text" name="occasion" value="{{ old('occasion', $arrangement->occasion) }}">
         @error('occasion')
          <div class="error">{{ $message }}</div>
         @enderror

        <label>Color Theme</label>
        <input type="text" name="color_theme" value="{{ old('color_theme', $arrangement->color_theme) }}">
        @error('color_theme')
         <div class="error">{{ $message }}</div>
        @enderror

       <label>Flowers</label>
       <input type="text" name="flowers" value="{{ old('flowers', $arrangement->flowers) }}">
       @error('flowers')
         <div class="error">{{ $message }}</div>
       @enderror

       <label>Event Date</label>
       <input type="date" name="event_date" value="{{ old('event_date', $arrangement->event_date) }}">
       @error('event_date')
        <div class="error">{{ $message }}</div>
       @enderror

       <label>Event Time</label>
       <input type="time" name="event_time" value="{{ old('event_time', $arrangement->event_time) }}">
       @error('event_time')
        <div class="error">{{ $message }}</div>
       @enderror

    <button type="submit" class="btn-save">Save Changes</button>
</form>

        
    </div>

</body>

</html>