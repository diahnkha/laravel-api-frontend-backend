<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <title>Home</title>
</head>
<body>
    <div class="menu">
        <div class="btn-wrap">
            <a href="{{ route('logout') }}"> <button class="btn-add">Logout</button> </a>
        </div>
        <h1> <a href="{{ route('product.list') }}">Product</a></h1>
        <h1> <a href="{{ route('blog.detaillengkap') }}">Blog</a></h1>
    </div>
</body>
</html>
