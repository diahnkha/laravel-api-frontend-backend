<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    public $guarded = ["id"];
    // public $fillable = [
    //     'judul',
    //     'foto',
    //     'penulis',
    //     'kategori',
    //     'deskripsi'
    //     'rata_rata'
    // ];

    protected $table='blog';
}
