<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class foto extends Model
{
    use HasFactory;
    // Nama kolom primary key
    protected $primaryKey = 'FotoID';

    protected $fillable = [
        'judul',
        'deskripsi',
        'AlbumID',
        'file',
        // Tambahkan field lain yang diperlukan
    ];

    // Model Foto.php
public function album()
{
    return $this->belongsTo(album::class, 'AlbumID');
}


}
