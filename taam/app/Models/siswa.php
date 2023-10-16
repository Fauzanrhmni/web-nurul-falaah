<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // Model Siswa
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

}