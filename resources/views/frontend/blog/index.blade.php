<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Title</title>
</head>
<body>

    <a href="{{ route('blog.add') }}">Tambah blog</a>
    <table border="1">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Foto</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Deskripsi</th>
                <th>Rata-Rata</th>
                <th>Operation</th>
            </tr>
        </thead>
        <tbody id="daftar-blog">

        </tbody>
    </table>

    @yield('content')

    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

    <script type="text/javascript">
        $.ajax({
            url: "http://127.0.0.1:8000/api/blog/list",
            type: "GET",
            dataType: "json",
            success: response => {
                let listblog = response.data
                console.log(listblog)
                let htmlString = ""
                for(let blog of listblog) {
                    htmlString += `
                        <tr>
                            <td>${blog.judul}</td>
                            <td> <img style="width:300; height:150px;" src="http://localhost:8000/storage/${blog.foto}" alt=""></td>
                            <td>${blog.penulis}</td>
                            <td>${blog.kategori}</td>
                            <td>${blog.deskripsi}</td>
                            <td>${blog.rata_rata}</td>
                            <td>
                                <a href="http://localhost:8000/detail/${blog.id}" target="_blank">
                                    <button> Details</button>
                                </a>
                                <button onClick={deleteblog(${blog.id})}>
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    `
                }
                $('#daftar-blog').append($.parseHTML(htmlString))
            }
        })

        function deleteblog(id){
            $.ajax({
                url: `http://127.0.0.1:8000/api/blog/${id}/delete`,
                type: "POST",
                dataType: "json",
                success: _ => {
                    console.log("SUCCESS");
                    window.location.href = "";
                },
                error: err => {
                    console.log(err);
                }
            })
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.6.2.min.js"></script>

</body>
</html>
