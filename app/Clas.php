<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clas extends Model
{
    protected $table="classes";
    protected $primaryKey="id";
    protected $fillable = [
        'name', 'cteacher', 'dateV',
    ];
    protected $dates=[
        'created_at','updated_at', 'dateV',
    ];
}
