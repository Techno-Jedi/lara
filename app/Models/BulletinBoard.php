<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulletinBoard extends Model
{
    use HasFactory;
        protected $table = "bulletin_boards";
        protected $fillable =[
        "title",
        "description",
        "price",
        "salesman",
        "image"
        ];
}
