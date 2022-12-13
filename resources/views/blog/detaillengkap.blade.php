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
    @foreach ($blogs as $blog)
        <div id="blog-big">
            <div class="card-blog">
                <div>
                    <div class="image">
                        <img src="{{ Storage::url($blog->foto) }}" alt="">
                    </div>
                </div>
                <div>
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
                    <h2>{{ $blog->judul }}</h2>
                    <h3>{{ $blog->deskripsi }}</h3>

                    <div class="bottom-list">
                        <h3>{{ $blog->rata_rata }} menit</h3>
                        <div class="avg-list">
                        <h3> <a href="{{ route('blog.listdetail',['id'=>$blog->id])}}">Read Full/Detail</a> </h3>
                        <h3>-></h3>
                    </div>
                    </div>




            </div>






            </div>

        </div>
        @endforeach

    </div>



</body>
</html>
