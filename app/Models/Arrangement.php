<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Arrangement extends Model
{
    protected $fillable = [
        'title', 'description', 'occasion', 'color_theme',
        'flowers', 'event_date', 'event_time', 'price', 'image_path', 'status',
    ];
}