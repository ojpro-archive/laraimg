<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'category',
        'description',
        'thumbnail',
        'author_id',
    ];


    public function author(){
        return $this->hasOne(User::class);
    }
}
