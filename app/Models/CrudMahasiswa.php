<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrudMahasiswa extends Model
{
    use HasFactory;
    protected $table = "crud_mahasiswa";
    protected $guarded = [];
}
