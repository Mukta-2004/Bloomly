<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Arrangement extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'occasion', 'price', 'image_path'];
}