<?php

namespace App\Http\Controllers\Backend;


use App\Models\Pengguna;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggunaController extends Controller
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
         $pengguna = Pengguna::query()->get();
         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $pengguna
         ]);
     }

     function show($id)
     {
         $pengguna = Pengguna::query()->where("id", $id)->first();

         if ($pengguna == null) {
             return response()->json([
                 "status" => false,
                 "message" => "Pengguna tidak ditemukan",
                 "data" => null
             ]);
         }

         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $pengguna
         ]);
     }

     function store(Request $request)
     {
         $payload = $request->all();
         if (!isset($payload["nama"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada nama",
                 "data" => null
             ]);
         }
         if (!isset($payload["email"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada email",
                 "data" => null
             ]);
         }
         if (!isset($payload["password"])) {
             return response()->json([
                 "status" => false,
                 "message" => "wajib ada password",
                 "data" => null
             ]);
         }

         $pengguna = Pengguna::query()->create($payload);
         return response()->json([
             "status" => true,
             "message" => "",
             "data" => $pengguna->makeHidden([
                "id",
                "password",
                "created_at",
                "updated_at"
             ])
         ]);
     }

     function update(Request $request, $id){
        // $pengguna = Pengguna::query()
        //     ->where("id", $id)
        //     ->first();
        // $pengguna->fill($request->all()); //ngisi apa yang udh diubah sama pengguna karena gatau apa yang diubah pengguna, entah idnya aja entah email aja
        // $pengguna->save();

        // $payload->update($request->all());
        $pengguna=Pengguna::find($id);
        $pengguna->update($request->all());

        // $pengguna = Pengguna::where("id",$id)->update($payload);
        return response()->json([
            "status" => true,
            "message" => "",
            "data" => $pengguna
        ]);
     }

     function destroy($id){

        $pengguna = Pengguna::query()->where("id", $id)->first();

        if ($pengguna == null) {
            return response()->json([
                "status" => false,
                "message" => "Pengguna tidak ditemukan",
                "data" => null
            ]);
        }

        $pengguna=Pengguna::destroy($id);

        return response()->json([
            "status" => true,
            "message" => "berhasil dihapus"
        ]);
     }

}
