<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Bloomly</title>

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

        h1 {
            font-family: Georgia, serif;
            color: #333;
            margin-bottom: 1.5rem;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        th,
        td {
            padding: 12px 16px;
            text-align: left;
            font-size: 14px;
            border-bottom: 1px solid #f0e0e4;
        }

        th {
            background: #fff0f3;
            color: #e8748a;
            text-transform: uppercase;
            font-size: 11px;
            letter-spacing: 1px;
        }

        .status {
            padding: 4px 10px;
            border-radius: 10px;
            font-size: 12px;
            font-weight: 600;
        }

        .status.pending {
            background: #fff3cd;
            color: #856404;
        }

        .status.approved {
            background: #f0fff4;
            color: #6aab6a;
        }

        .status.cancelled {
            background: #fde2e2;
            color: #c0392b;
        }

        .actions form {
            display: inline;
        }

        .btn {
            border: none;
            padding: 6px 12px;
            border-radius: 14px;
            font-size: 12px;
            cursor: pointer;
            margin-right: 4px;
            color: #fff;
        }

        .btn-approve {
            background: #6aab6a;
        }

        .btn-cancel {
            background: #c0392b;
        }

        .btn-edit {
            background: #e8748a;
            text-decoration: none;
            display: inline-block;
        }

        .btn-delete {
            background: #888;
        }

        .alert {
            background: #f0fff4;
            color: #3d7d3d;
            padding: 10px 16px;
            border-radius: 8px;
            margin-bottom: 1rem;
            font-size: 14px;
        }

        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }

        .logout-form button {
            background: #e8748a;
            color: #fff;
            border: none;
            padding: 8px 18px;
            border-radius: 20px;
            font-size: 13px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <div class="top-bar">
        <h1>Bookings Dashboard 🌸</h1>

        <form class="logout-form" method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </div>

    @if(session('success'))
        <div class="alert">{{ session('success') }}</div>
    @endif

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Occasion</th>
                <th>Price</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @forelse($bookings as $booking)
                <tr>
                    <td>{{ $booking->title }}</td>
                    <td>{{ $booking->occasion }}</td>
                    <td>${{ number_format($booking->price, 2) }}</td>

                    <td>
                        <span class="status {{ $booking->status }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </td>

                    <td class="actions">
                        <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-approve">Approve</button>
                        </form>

                        <form action="{{ route('admin.bookings.cancel', $booking) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-cancel">Cancel</button>
                        </form>

                        <a href="{{ route('admin.bookings.edit', $booking) }}" class="btn btn-edit">Edit</a>

                        <form action="{{ route('admin.bookings.destroy', $booking) }}"
                              method="POST"
                              onsubmit="return confirm('Delete this booking permanently?');">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;color:#999;padding:2rem;">
                        No bookings yet.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>

</html>