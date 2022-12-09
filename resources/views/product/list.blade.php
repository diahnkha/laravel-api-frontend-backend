<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="{{ asset('bukanslicing/styles.css')}}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list</title>
</head>
<body>

    <div class="btn-wrap">
        <a href="{{ route('product.store') }}"> <button class="btn-add">Tambah product</button> </a>
    </div>



    <div class="wrap">
    @foreach ($products as $product)
            <div class="font-blue card">
                    <br>
                    <label class="font-red">NAMA</label>
                    <h1>{{ $product->nama }}</h1>
                    <br>
                    <img src="{{ Storage::url($product->foto) }}" style="object-fit:cover; width:250px; height:250px;">
                    <br><br>
                    <label class="font-red">Deskripsi</label>
                    <h3 class="card-desc">{{ substr($product->deskripsi, 0, 150) }}</h3>
                    <br>
                    <label class="font-red">Harga</label>
                    <h2 class="font-slate">{{ $product->harga }}</h2>
                    <br>
                    <label class="font-red">Stok</label>
                    <h4 class="font-black">{{ $product->stok }}</h4>
                    <br>
                    <div class="btn">
                        <a href="{{ route('product.detail',['id'=>$product->id]) }}">
                            <button class="btn-add">Detail</button>
                        </a>

                        <a href="{{ route('product.destroy',['id'=>$product->id]) }}">
                            <button class="btn-add">Hapus</button>
                        </a>
                    </div>

            </div>
    @endforeach
    </div>


</body>
</html>
