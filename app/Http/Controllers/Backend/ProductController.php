<?php

namespace App\Http\Controllers\Backend;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
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
         $product = Product::query()->get();
         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $product
         ]);
     }

     function show($id)
     {
         $product = Product::query()->where("id", $id)->first();

         if ($product == null) {
             return response()->json([
                 "status" => false,
                 "message" => "product tidak ditemukan",
                 "data" => null
             ]);
         }

         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $product
         ]);
     }

     function store(Request $request)
     {
         $payload = $request->all();
         $payload['foto'] = $request->file("gambar")->store("gambar", "public");
         if (!isset($payload["nama"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada nama",
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
         if (!isset($payload["deskripsi"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada deskripsi",
                 "data" => null
             ]);
         }

         if (!isset($payload["harga"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada harga",
                "data" => null
            ]);
        }
        if (!isset($payload["stok"])) {
            return response()->json([
                "status" => false,
                "message" => "wajib ada stok",
                "data" => null
            ]);
        }

         $product = Product::query()->create($payload);
         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $product->makeHidden([

                "created_at",
                "updated_at"
             ])
         ]);
     }

     function update(Request $request, $id){
        // $product = product::query()
        //     ->where("id", $id)
        //     ->first();
        // $product->fill($request->all()); //ngisi apa yang udh diubah sama product karena gatau apa yang diubah product, entah idnya aja entah email aja
        // $product->save();

        // $payload->update($request->all());
        $product = Product::find($id);
        $product->update($request->all());

        // $product = product::where("id",$id)->update($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $product
        ]);
     }

     function destroy($id){

        $product = Product::query()->where("id", $id)->first();

        if ($product == null) {
            return response()->json([
                "status" => false,
                "message" => "product tidak ditemukan",
                "data" => null
            ]);
        }

        $product = Product::destroy($id);

        return response()->json([
            "status" => true,
            "message" => "berhasil dihapus"
        ]);
     }
}
