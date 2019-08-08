<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    protected $table="subjects";
    protected $primaryKey="id";
    protected $fillable = [
        'name', 'description',
    ];
    protected $dates=[
        'created_at','updated_at',
    ];
}
