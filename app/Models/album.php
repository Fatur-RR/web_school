<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class album extends Model
{
    use HasFactory;

    protected $table = 'albums'; // Nama tabel
    protected $fillable = [
        'KategoriID',
        'Nama',
        'Deskripsi',
    ];

    protected $primaryKey = 'AlbumID'; // Sesuaikan dengan nama kolom primary key

    public function fotos()
    {
        return $this->hasMany(Foto::class, 'AlbumID');
    }

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'KategoriID', 'KategoriID');
    }


public function coverImage()
{
    return $this->hasOne(Foto::class, 'AlbumID')->latest();
}

}
