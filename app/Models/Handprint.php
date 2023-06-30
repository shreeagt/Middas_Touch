<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Handprint extends Model
{
    use HasFactory;
    protected $table='handprint';
    protected $primarykey='id';
}
