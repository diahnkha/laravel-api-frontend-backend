<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    // public $fillable = [
    //     'nama',
    //     'foto',
    //     'deskripsi',
    //     'harga',
    //     'stok'
    // ];

    protected $table='product';
}
