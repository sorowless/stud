<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table= "comments";
    protected $primaryKey= "id";

    protected $fillable=[
        'post_id',
        'user_id',
        'status',
        'comment',
    ];

    protected $dates=[
        'created_at', 'updated_at',
    ];
}
