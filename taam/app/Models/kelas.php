<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class kelas extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'id'); // Sesuaikan dengan nama kolom kunci luar jika berbeda
    }

    public function siswa()
    {
        return $this->belongsTo(siswa::class, 'kelas_id'); 
    }
}
