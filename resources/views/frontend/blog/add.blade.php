<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add blog</title>
</head>
<body>

        <label for="judul">Judul</label>
        <input type="text" id="judul"><br>

        <label for="foto">Foto</label>
        <input type="file" id="foto" accept="image/*" ><br>

        <label for="penulis">penulis</label>
        <input type="text" id="penulis"><br>

        <label for="kategori">kategori</label>
        <input type="text" id="kategori"><br>

        <label for="deskripsi">deskripsi</label>
        <input type="text" id="deskripsi"><br>

        <label for="rata_rata">rata_rata</label>
        <input type="text" id="rata_rata"><br>

        <button onClick="add()" id="submit">Add</button>

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>
    <script>
        function add(){
            // e.preventDefault()
            let judul = $("#judul").val()
            let foto = $("#foto")[0].files[0]
            let penulis = $("#penulis").val()
            let kategori = $("#kategori").val()
            let deskripsi = $("#deskripsi").val()
            let rata_rata = $("#rata_rata").val()

            if (judul === "") return alert("judul tidak boleh kosong")
            if (foto === "") return alert("foto tidak boleh kosong")
            if (penulis === "") return alert("penulis tidak boleh kosong")
            if (kategori === "") return alert("kategori tidak boleh kosong")
            if (deskripsi === "") return alert("deskripsi tidak boleh kosong")
            if (rata_rata === "") return alert("rata_rata tidak boleh kosong")

            let fd = new FormData();
            fd.append("judul", judul)
            fd.append("foto", foto)
            fd.append("penulis", penulis)
            fd.append("kategori", kategori)
            fd.append("deskripsi", deskripsi)
            fd.append("rata_rata", rata_rata)

            $.ajax({
                url: "http://127.0.0.1:8000/api/blog/store",
                method: "POST",
                data: fd,
                processData: false,
                contentType: false,
                success: _ =>
                    window.location.href = "http://127.0.0.1:8000"
            })

        }
    </script>
</body>
</html>
