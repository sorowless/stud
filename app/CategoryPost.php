<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    protected $table= "postCategory";
    protected $primaryKey= "id";

    protected $fillable=[
        'post_id',
        'category_id',
    ];

}
