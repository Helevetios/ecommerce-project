<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
</head>
<body>
    <form action="{{ route('register') }}" method="post">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name">
        
        <input type="email" name="email">
        <input type="password" name="password">
        <input type="password" name="password_confirmation">
        <input type="text" name="phone">
        <input type="text" name="address">
        <button>Submit</button>
    </form>
</body>
</html>