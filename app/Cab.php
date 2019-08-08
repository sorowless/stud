<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cab extends Model
{
    protected $table="cabs";
    protected $primaryKey="id";
    protected $fillable = [
        'floor', 'number',
    ];
    protected $dates=[
        'created_at','updated_at',
    ];
}
