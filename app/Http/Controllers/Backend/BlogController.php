<?php

namespace App\Http\Controllers\Backend;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
            /**
     * CRUD
     * - list => index
     * - detail => show
     * - edit => update
     * - create => store
     * - delete => destroy
     */

     function index()
     {
         $blog = Blog::query()->get();
         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $blog
         ]);
     }

     function show($id)
     {
         $blog = Blog::query()->where("id", $id)->first();

         if ($blog == null) {
             return response()->json([
                 "status" => false,
                 "message" => "blog tidak ditemukan",
                 "data" => null
             ]);
         }

         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $blog
         ]);
     }

     function store(Request $request)
     {
         $payload = $request->all();
         $payload['foto'] = $request->file("gambar")->store("gambar", "public");
         if (!isset($payload["judul"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada judul",
                 "data" => null
             ]);
         }
         if (!isset($payload["foto"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada foto",
                 "data" => null
             ]);
         }
         if (!isset($payload["penulis"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada penulis",
                 "data" => null
             ]);
         }

         if (!isset($payload["kategori"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada kategori",
                "data" => null
            ]);
        }
        if (!isset($payload["deskripsi"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada deskripsi",
                "data" => null
            ]);
        }

        if (!isset($payload["rata_rata"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada rata_rata",
                "data" => null
            ]);
        }

         $blog = Blog::query()->create($payload);
         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $blog->makeHidden([

                "created_at",
                "updated_at"
             ])
         ]);
     }

     function update(Request $request, $id){
        // $blog = blog::query()
        //     ->where("id", $id)
        //     ->first();
        // $blog->fill($request->all()); //ngisi apa yang udh diubah sama blog karena gatau apa yang diubah blog, entah idnya aja entah email aja
        // $blog->save();

        // $payload->update($request->all());
        $blog = Blog::find($id);
        $blog->update($request->all());

        // $blog = blog::where("id",$id)->update($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $blog
        ]);
     }

     function destroy($id){

        $blog = Blog::query()->where("id", $id)->first();

        if ($blog == null) {
            return response()->json([
                "status" => false,
                "message" => "blog tidak ditemukan",
                "data" => null
            ]);
        }

        $blog = Blog::destroy($id);

        return response()->json([
            "status" => true,
            "message" => "berhasil dihapus"
        ]);
     }
}
