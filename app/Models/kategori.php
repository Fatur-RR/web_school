<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategoris';
    protected $primaryKey = 'KategoriID';

    protected $fillable = [
        'NamaKategori',
        'Keterangan'
    ];

    // Relasi ke model Agenda
    public function agendas()
    {
        return $this->hasMany(Agenda::class, 'KategoriID', 'KategoriID');
    }

    // Relasi ke model Informasi
    public function informasis()
    {
        return $this->hasMany(Informasi::class, 'KategoriID', 'KategoriID');
    }

    // Relasi ke model Album
    public function albums()
    {
        return $this->hasMany(Album::class, 'KategoriID', 'KategoriID');
    }
}
