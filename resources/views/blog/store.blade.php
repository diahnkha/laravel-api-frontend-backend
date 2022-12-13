<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah blog</title>

</head>
<body>

    <a href="{{ route('blog.detaillengkap') }}"><button class="btn-add">Kembali</button></a>
    <form
        method="POST"
        enctype="multipart/form-data"
        action="{{ route('blog.create') }}"">
        @csrf
        <label for="judul">Judul :</label>
        <input type="text" name="judul" id="judul"><br>

        <label>Foto :</label>
        <input type="file" name="gambar" accept="image/*"><br>

        <label for="penulis">Penulis :</label>
        <input type="text" name="penulis" id="penulis"><br>

        <label for="kategori">Kategori :</label><br><br>
        <select name="kategori" id="kategori" style="width: 300px; height:50px; font-size:20px;">
            <option value="1">Tech</option>
            <option value="2">Healt</option>
            <option value="3">Entertainment</option>
            <option value="4">Sport</option>
            <option value="5">Food</option>
            <option value="6">Culture</option>
        </select>
        <br><br>

        <label for="deskripsi">Deskripsi : (300 char maks appear)</label>
        <input type="deskripsi" name="deskripsi" id="deskripsi"><br>

        <label for="penulis">Rata-rata (menit) :</label>
        <input type="text" name="rata_rata" id="rata_rata"><br>

        <button type="Submit" class="btn-add" value="store" @class(["btn", "btn-primary"])>Tambah Post</button>

    </form>



</body>
</html>
