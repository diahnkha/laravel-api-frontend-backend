<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

</head>
<body>

    <center> <h1 style="margin-top: 200px"> Login Form </h1> </center>
    @if($errors->any())
        <h1 style="color: yellow; background:green; text-align:center;">
            {{ $errors->first() }}
        </h1>
    @endif
    <form action="" method="post">
        @csrf
        <div class="container">
            <label>Username : </label>
            <input type="text" placeholder="Enter email" name="email" >
            <label>Password : </label>
            <input type="password" placeholder="Enter Password" name="password" >
            <button type="submit">Login</button>
        </div>
    </form>



</body>
</html>
