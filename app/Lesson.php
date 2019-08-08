<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $table="lessons";
    protected $primaryKey="id";
    protected $fillable = [
        'number', 'start_time',
    ];
    protected $dates=[
        'created_at','updated_at',
    ];
}
