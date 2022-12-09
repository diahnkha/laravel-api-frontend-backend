@extends("product/store")

@section("foto-content")

<html>
<body>
    <form
        method="POST"
        enctype="multipart/form-data"
        action="{{ route('upload') }}">
    @csrf

    <input type="file" name="gambar" accept="image/*">
    <input type="submit" value="Upload">

    </form>
</body>
</html>

@endsection
