<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    function index() {
        $blogs = blog::query()
            // ->limit(5)
            ->offset(0) //index, ambil dari index ke berapa
            ->get();
        return view("blog.detaillengkap", ["blogs" => $blogs]);
    } //menampilkan seluruh data

    function detail($id) {
        $blog = blog::query()
            ->where("id", $id)
            ->first();
        return view("blog.detail", ["blog" => $blog]);
    } //menampilkan sebuah data'

    function listdetail($id) {
        $blog = blog::query()
            ->where("id", $id)
            ->first();
        return view("blog.listdetail", ["blog" => $blog]);
    } //menampilkan sebuah data

    function detaillengkap() {
        $blogs = blog::query()
            // ->limit(5)
            ->offset(0) //index, ambil dari index ke berapa
            ->get();
        return view("blog.detaillengkap", ["blogs" => $blogs]);
    } //menampilkan seluruh data

    function store() {
        return view("blog.store");
    } //tampilan menambah data

    function create(Request $request) {
        $payload = [
            "judul" => $request->input("judul"),
            "foto" => $request->file("gambar")->store("gambar", "public"),
            "penulis" => $request->input("penulis"),
            "kategori" => $request->input("kategori"),
            "deskripsi" => $request->input("deskripsi"),
            "rata_rata" => $request->input("rata_rata")
        ];

        // if ($request->method() == "GET") return view('upload');

        // $file = $request->file("gambar");
        // $filename = $file->hashName();
        // $file->move("gambar", $filename);
        // $path = $request->getHost() . "/gambar/" . $filename;

        blog::query()->create($payload);
        return redirect()->back();//kehalaman sebelumnya

    } //menambah data

    function update(Request $request, $id) {
        // $blog = blog::query()
        //     ->where("id", $id)
        //     ->first();
        // $blog->fill($request->all()); //ngisi apa yang udh diubah sama blog karena gatau apa yang diubah blog, entah idnya aja entah email aja
        // $blog->save();
        $data['judul'] = $request->input("judul");
        $data['penulis'] = $request->input("penulis");
        $data['kategori'] = $request->input("kategori");
        $data['deskripsi'] = $request->input("deskripsi");
        $data['rata_rata'] = $request->input("rata_rata");

        if ($request->hasFile("gambar")){
            $data['foto']= $request->file("gambar")->store("gambar", "public");
        }

        blog::where("id",$id)->update($data);
        return redirect()->back();//kehalaman sebelumnya
    } //mengupdate data




    function destroy($id) {
        $blog = blog::query()
            ->where("id", $id)
            ->delete();
        return redirect()->back();//kehalaman sebelumnya
    } //menghapus data
}
