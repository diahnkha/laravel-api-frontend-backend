<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <title>List Blog</title>
</head>
<body>
    <div class="btn-wrap">
        <a href="{{ route('blog.store') }}"> <button class="btn-add">Tambah blog</button> </a>
    </div>

    <div class="wrap">

        <div id="blog-small">
        <div class="card-blog">
            <h2>{{ $blog->judul }}</h2>
            <div class="image">
                <img src="{{ Storage::url($blog->foto) }}" alt="">
            </div>
            <div class="detail-list">
                <h3>
                    @switch($blog->kategori)
                        @case(1) TECH @break
                        @case(2) HEALT @break
                        @case(3) ENTERTAINMENT @break
                        @case(4) SPORT @break
                        @case(5) FOOD @break
                        @case(6) CULTURE @break
                        @default UMUM
                    @endswitch
                </h3>
                <h4>.</h4>
                <h4>{{ $blog->created_at }}</h4>
                <h4>.</h4>
                <h3>{{ $blog->penulis }}</h3>
            </div>

            <h3>{{ substr($blog->deskripsi, 0, 300) }}</h3>
            <h3>{{ $blog->rata_rata }} menit</h3>

        </div>
        <a href="{{ route('blog.detail',['id'=>$blog->id]) }}">
            <button class="btn-add">Detail</button>
        </a>
        <a href="{{ route('blog.destroy',['id'=>$blog->id]) }}">
            <button class="btn-add">Hapus</button>
        </a>

        </div>

    </div>



</body>
</html>
