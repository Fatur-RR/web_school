<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agenda extends Model
{
    use HasFactory;
    protected $table = 'agendas'; // Sesuaikan dengan nama tabel

    protected $fillable = ['KategoriID', 'judul', 'isi', 'status', 'user_id']; // Kolom yang bisa diisi

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'KategoriID'); // Relasi dengan tabel 'kategoris'
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Relasi dengan tabel 'users'
    }

}
