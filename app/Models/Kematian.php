<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kematian extends Model
{
    use HasFactory;
    protected $table = 'kematian';
    protected $guarded = [];


    public $updated_at = false;
}
