<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table= "posts";
    protected $primaryKey= "id";

    protected $fillable=[
        'title',
        'short_text',
        'full_text',
        'author',
    ];

    protected $dates=[
        'created_at', 'updated_at',
    ];

    /**Relations*/
    public function categories(){
        return $this->belongsToMany(Category::class, 'postCategory', 'post_id', 'category_id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
