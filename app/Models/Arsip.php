<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arsip extends Model
{
    use HasFactory;

    protected $table = 'arsip';
    protected $fillable = [
        'kategori_id',
        'no_surat',
        'judul',
        'file'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
}
