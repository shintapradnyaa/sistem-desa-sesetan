<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pernikahan extends Model
{
    use HasFactory;
    protected $table = 'pernikahan';
    protected $guarded = [];


    public $updated_at = false;
    public $timestamps = false;
}
