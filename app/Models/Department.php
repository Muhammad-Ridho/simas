<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model {
    use HasFactory;

    protected $table = 'departments';
    protected $fillable = ["name", "keterangan"];

}
