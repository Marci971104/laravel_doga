<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use App\Http\Controller\PerfumeController;

class Perfume extends Model
{
    public $timestamp = false;
    use HasFactory;

    protected $fillable = [

        "name",
        "type",
        "price"
    ];
}
