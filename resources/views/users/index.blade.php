<!DOCTYPE html>
<html>

<head>
    <title>User List</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f9;
        margin: 0;
        padding: 20px;
    }

    h1 {
        text-align: center;
        color: #333;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #4CAF50;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    a {
        color: #4CAF50;
        text-decoration: none;
        margin-right: 10px;
    }

    a:hover {
        text-decoration: underline;
    }

    button {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
    }

    button:hover {
        background-color: #d32f2f;
    }

    .success {
        background-color: #dff0d8;
        color: #3c763d;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #d6e9c6;
        border-radius: 4px;
        text-align: center;
    }
    </style>
</head>

<body>
    <h1>User List</h1>
    @if (session('success'))
    <div class="success">{{ session('success') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->firstname }}</td>
                <td>{{ $user->lastname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td>{{ $user->address }}</td>
                <td>
                    <a href="{{ route('users.edit', $user->id) }}">Edit</a>
                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this user?');"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>