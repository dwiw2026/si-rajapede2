<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoTutorial extends Model
{
    protected $fillable = ['judul', 'keterangan', 'link_youtube'];
}
