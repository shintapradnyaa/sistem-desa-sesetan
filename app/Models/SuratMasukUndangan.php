<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasukUndangan extends Model
{
    use HasFactory;
    protected $table = 'surat_masuk_undangan';
    protected $guarded = [];


    public $updated_at = false;
    public $created_at = false;
    public $timestamps = false;
}
