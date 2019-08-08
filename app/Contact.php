<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table="backcalls";
    protected $primaryKey="id";
    protected $fillable = [
        'title', 'info', 'emailphone',
    ];
    protected $dates=[
        'created_at','updated_at',
    ];
}
