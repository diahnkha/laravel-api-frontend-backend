<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail</title>
</head>
<body>
        <label for="judul">Judul</label>
        <input type="text" id="judul"><br>

        <label for="foto">Foto</label>
        <input type="file" id="foto" accept="image/*" ><br>

        <label for="penulis">Penulis</label>
        <input type="text" id="penulis"><br>

        <label for="kategori">Kategori</label>
        <input type="text" id="kategori"><br>

        <label for="deskripsi">Deskripsi</label>
        <input type="text" id="deskripsi"><br>

        <label for="rata_rata">Rata-Rata</label>
        <input type="text" id="rata_rata"><br>

        <button onClick="update()" id="submit">Update</button>

        <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

        <script>
            $.ajax({
                url: "http://127.0.0.1:8000/api/blog/{{$id}}/show",
                method: "GET",
                dataType: "json",
                success: response => {
                    let blog = response.data
                    console.log(blog);
                    let judul = $("#judul").val(blog.judul)
                    let foto = $("#foto")[0].files[0]
                    let penulis = $("#penulis").val(blog.penulis)
                    let kategori = $("#kategori").val(blog.kategori)
                    let deskripsi = $("#deskripsi").val(blog.deskripsi)
                    let rata_rata = $("#rata_rata").val(blog.rata_rata)


                }
            })

            function update(){
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
                    fd.append("penulis", penulis)
                    fd.append("kategori", kategori)
                    fd.append("deskripsi", deskripsi)
                    fd.append("rata_rata", rata_rata)

                    if (foto!=null) fd.append("foto", foto)


                    $.ajax({
                        url: "http://127.0.0.1:8000/api/blog/{{$id}}/update",
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
