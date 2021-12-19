<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kategori;

class News extends Model
{
    protected $fillable = ['judul','isi'];

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

}
