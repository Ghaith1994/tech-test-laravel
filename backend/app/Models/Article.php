<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @package App
 */
class Article extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];
}
