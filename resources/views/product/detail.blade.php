<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail product</title>

</head>
<body>
    <center> <h1> Detail Form </h1> </center>
    <br>
    <a href="{{ route('logout') }}"><button class="btn-add">Logout</button>
    <a href="{{ route('product.list') }}"><button class="btn-add">Kembali</button></a>
    <br><br>
    <form method="post" enctype="multipart/form-data" action="{{ route('product.update', $product->id) }}">
        @method("put")
        @csrf
        <label for="nama">Nama :</label>
        <input type="text" name="nama" id="nama" value="{{ $product->nama }}"><br>

        <label>Foto :</label><br>
        <img class="center-photo" src="{{ Storage::url($product->foto) }}" ><br>
        <div style="width: 500px; text-align:center; margin: 0 auto;">
            <input type="file" name="gambar" accept="image/*" ><br>
        </div>
        <label for="deskripsi">Deskripsi :</label><br>
        <input type="text" name="deskripsi" id="deskripsi" value="{{ $product->deskripsi }}"><br>

        <label for="harga">Harga :</label>
        <input type="number" name="harga" id="harga" value="{{ $product->harga }}"><br>

        <label for="stok">Stok :</label>
        <input type="number" name="stok" id="stok" value="{{ $product->stok }}"><br>

        <button class="btn-add" type="Submit" @class(["btn", "btn-primary"])>Update</button>

    </form>

</body>
</html>
