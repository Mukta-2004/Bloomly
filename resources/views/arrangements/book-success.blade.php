<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Booking Received - Bloomly</title>

    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #fff9f9;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
        }

        .box {
            max-width: 420px;
        }

        h1 {
            font-family: Georgia, serif;
            color: #e8748a;
            font-size: 28px;
            margin-bottom: 1rem;
        }

        p {
            color: #666;
            font-size: 15px;
            margin-bottom: 1.5rem;
        }

        a {
            background: #e8748a;
            color: #fff;
            padding: 12px 28px;
            border-radius: 24px;
            text-decoration: none;
            font-size: 14px;
        }
    </style>
</head>

<body>

    <div class="box">
        <h1>🌸 Booking Received!</h1>

        <p>
            Thank you for choosing Bloomly. We'll reach out shortly to confirm the details.
        </p>

        <a href="{{ route('home') }}">Back to Home</a>
    </div>

</body>

</html>