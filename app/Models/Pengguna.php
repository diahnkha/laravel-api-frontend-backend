<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class Pengguna extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    protected $table = "pengguna";

    protected static function boot()
    {
        parent::boot();//setiap ada event di modelnya akan dijalankan

        static::creating(function(Pengguna $pengguna){ //waktu ngecreate bakal dijalanin, sebelum masuk db bakal dijalanin
            $pengguna->password = Hash::make($pengguna->password);
        });

        static::updating(function(Pengguna $pengguna){
            if($pengguna->isDirty(["password"])){ //passwordnya udh dirubah belum? passwordnya udh update belum di db. kalau ada perubahan di pass bakal di hash lagi, dibuat lagi
                $pengguna->password = Hash::make($pengguna->password);
            }
        });
    }

}
