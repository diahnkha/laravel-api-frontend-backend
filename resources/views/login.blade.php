<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <!-- ngecek ada error apa ga -->
    @if($errors->any())
        <h1 style="color: red; background:green;">
            {{ $errors->first() }}
        </h1>
    @endif
    <form action="" method="post">
        @csrf
        <label for="email">Email : </label>
        <input type="email" placeholder="email" id="email" name="email">

        <label for="password">Password : </label>
        <input type="password" placeholder="password" id="password" name="password">

        <button type="submit">Login</button>
    </form>
</body>
</html>
