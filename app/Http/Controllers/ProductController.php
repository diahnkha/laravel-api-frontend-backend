<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    function index() {
        $products = product::query()
            // ->limit(5)
            ->offset(0) //index, ambil dari index ke berapa
            ->get();
        return view("product.list", ["products" => $products]);
    } //menampilkan seluruh data

    function detail($id) {
        $product = product::query()
            ->where("id", $id)
            ->first();
        return view("product.detail", ["product" => $product]);
    } //menampilkan sebuah data

    function store() {
        return view("product.store");
    } //tampilan menambah data

    function create(Request $request) {
        $payload = [
            "nama" => $request->input("nama"),
            "foto" => $request->file("foto")->store("gambar", "public"),
            "deskripsi" => $request->input("deskripsi"),
            "harga" => $request->input("harga"),
            "stok" => $request->input("stok")
        ];

        // if ($request->method() == "GET") return view('upload');

        // $file = $request->file("gambar");
        // $filename = $file->hashName();
        // $file->move("gambar", $filename);
        // $path = $request->getHost() . "/gambar/" . $filename;

        product::query()->create($payload);
        return redirect()->back();//kehalaman sebelumnya

    } //menambah data

    function update(Request $request, $id) {
        // $product = product::query()
        //     ->where("id", $id)
        //     ->first();
        // $product->fill($request->all()); //ngisi apa yang udh diubah sama product karena gatau apa yang diubah product, entah idnya aja entah email aja
        // $product->save();
        $data['nama'] = $request->input("nama");
        $data['deskripsi'] = $request->input("deskripsi");
        $data['harga'] = $request->input("harga");
        $data['stok'] = $request->input("stok");

        if ($request->hasFile("foto")){
            $data['foto']= $request->file("foto")->store("gambar", "public");
        }

        product::where("id",$id)->update($data);
        return redirect()->back();//kehalaman sebelumnya
    } //mengupdate data




    function destroy($id) {
        $product = product::query()
            ->where("id", $id)
            ->delete();
        return redirect()->back();//kehalaman sebelumnya
    } //menghapus data

}
