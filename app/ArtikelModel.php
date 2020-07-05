<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtikelModel extends Model
{
    public $table = "article";
    protected $fillable = [
        'createby_id', 'judul', 'thumb', 'isi', 'slug', 'tag',
    ];
}
