<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail blog</title>

</head>
<body>

    <a href="{{ route('blog.detaillengkap') }}"><button class="btn-add">Kembali</button></a>
    <form method="post" enctype="multipart/form-data" action="{{ route('blog.update', $blog->id) }}">
        @method("put")
        @csrf
        <label for="judul">Judul :</label>
        <input type="text" name="judul" id="judul" value="{{ $blog->judul }}"><br>

        <label>Foto :</label><br>
        <img src="{{ Storage::url($blog->foto) }}" style="width:250px; height:250px;"><br>
        <input type="file" name="gambar" accept="image/*" ><br>

        <label for="penulis">Penulis :</label>
        <input type="text" name="penulis" id="penulis" value="{{ $blog->penulis }}"><br>

        <label for="kategori">Kategori :</label><br><br>
        <select name="kategori" id="kategori" style="width: 500px; height:50px; font-size:20px;">
            <option value="1" {{ $blog->kategori == 1 ? "selected" : ""}}>Tech</option>
            <option value="2" {{ $blog->kategori == 2 ? "selected" : ""}}>Healt</option>
            <option value="3" {{ $blog->kategori == 3 ? "selected" : ""}}>Entertainment</option>
            <option value="4" {{ $blog->kategori == 4 ? "selected" : ""}}>Sport</option>
            <option value="5" {{ $blog->kategori == 5 ? "selected" : ""}}>Food</option>
            <option value="6" {{ $blog->kategori == 6 ? "selected" : ""}}>Culture</option>
        </select>
        <br><br>

        <label for="deskripsi">Deskripsi :</label>
        <input type="deskripsi" name="deskripsi" id="deskripsi" value="{{ $blog->deskripsi }}"><br>

        <label for="rata_rata">Rata-rata Lama Membaca (menit) :</label>
        <input type="text" name="rata_rata" id="rata_rata" value="{{ $blog->rata_rata }}"><br>

        <button class="btn-add" type="Submit" @class(["btn", "btn-primary"])>Update</button>

    </form>

</body>
</html>
