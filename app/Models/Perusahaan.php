<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Perusahaan extends Model
{
    //
    use HasFactory;
    protected $fillable = ['nama', 'alamat', 'telepon', 'email'];

    public function lowongans()
    {
        return $this->hasMany(Lowongan::class);
    }
}
