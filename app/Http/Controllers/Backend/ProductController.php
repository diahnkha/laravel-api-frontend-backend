<?php

namespace App\Http\Controllers\Backend;
use Illuminate\Support\Facades\Storage;
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
        //store -> folder
        //file gambar -> nama inputan dipostman
        //payload di foto, nama attribut di tabel
         $payload = $request->all();
         $payload['foto'] = $request->file("foto")->store("gambar", "public");
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

    //  function update(Request $request, $id){
    //     // $product = product::query()
    //     //     ->where("id", $id)
    //     //     ->first();
    //     // $product->fill($request->all()); //ngisi apa yang udh diubah sama product karena gatau apa yang diubah product, entah idnya aja entah email aja
    //     // $product->save();

    //     // $payload->update($request->all());
    //     $product = Product::find($id);
    //     $product->update($request->all());

    //     // $product = product::where("id",$id)->update($payload);
    //     return response()->json([
    //         "status" => true,
    //         "message" => "",
    //         "data" => $product
    //     ]);
    //  }

    public function update(Request $request, $id)
    {
        $payload = $request->except(['foto']);
        $product = Product::find($id);
        if (isset($request->foto)) {
            Storage::disk('public')->delete($product->foto);
            $payload["foto"] = $request->foto->store('gambar', 'public');
        }

        $product->update($payload);
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
