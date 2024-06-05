<!DOCTYPE html>
<html>

<head>
    <title>Edit User</title>
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

    .error {
        background-color: #f8d7da;
        color: #721c24;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #f5c6cb;
        border-radius: 4px;
    }

    form {
        max-width: 600px;
        margin: 0 auto;
        background: #fff;
        padding: 20px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    div {
        margin-bottom: 15px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="email"],
    input[type="phone"],
    input[type="address"],
    input[type="lastname"] {
        width: calc(100% - 22px);
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    button {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
        display: inline-block;
    }

    button:hover {
        background-color: #45a049;
    }
    </style>
</head>

<body>
    <h1>Edit User</h1>

    @if ($errors->any())
    <div class="error">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('users.update', $users->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="firstname">First Name:</label>
            <input type="text" id="firstname" name="firstname" value="{{ old('firstname', $users->firstname) }}">
        </div>
        <div>
            <label for="lastname">Last Name:</label>
            <input type="lastname" id="lastname" name="lastname" value="{{ old('lastname', $users->lastname) }}">
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="{{ old('email', $users->email) }}">
        </div>
        <div>
            <label for="phone">Phone:</label>
            <input type="phone" id="phone" name="phone" value="{{ old('phone', $users->phone) }}">
        </div>
        <div>
            <label for="address">Address:</label>
            <input type="address" id="address" name="address" value="{{ old('address', $users->address) }}">
        </div>

        <div>
            <button type="submit">Update</button>
        </div>
    </form>
</body>

</html>