<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Product</title>

</head>
<body>
    <center> <h1> Tambah Product Form </h1> </center>
    <div class="container">
        <a href="{{ route('logout') }}"><button class="btn-add">Logout</button>
        <a href="{{ route('product.list') }}"><button class="btn-add">Kembali</button></a>
        <form
            method="POST"
            enctype="multipart/form-data"
            action="{{ route('product.create') }}"">
            @csrf
            <label for="nama">Nama :</label>
            <input type="text" name="nama" id="nama"><br>

            <label>Foto :</label>
            <div style="width: 500px; text-align:center; margin: 0 auto;">
                <input type="file" name="gambar" accept="image/*" ><br>
            </div>

            <label for="deskripsi">Deskripsi : (150 char maks appear)</label>
            <input type="text" name="deskripsi" id="deskripsi"><br>

            <label for="harga">Harga :</label>
            <input type="number" name="harga" id="harga"><br>

            <label for="stok">Stok :</label>
            <input type="number" name="stok" id="stok"><br>

            <button type="Submit" class="btn-add" value="store" @class(["btn", "btn-primary"])>Tambah</button>

        </form>
    </div>


</body>
</html>
