<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zoom extends Model
{
    protected $table = 'zoom_url';
    use HasFactory;

    protected $fillable = [
        'path',
        'vedio_name',
        'uploaded_by',
        'status',
    ];
}
