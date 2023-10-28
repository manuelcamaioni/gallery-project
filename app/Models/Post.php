<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable =[
        'image', 'user_id', 'visible'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function reports(){
        return $this->belongsToMany(Report::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
