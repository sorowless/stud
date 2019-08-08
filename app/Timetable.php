<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Timetable extends Model
{
    protected $table= "timetables";
    protected $primaryKey= "id";

    protected $fillable=[
        'lesson_date',
        'cab',
        'teach',
        'clas',
        'subj',
        'lesn',
    ];

    protected $dates=[
        'lesson_date', 'created_at', 'updated_at',
    ];

    /**Relations*/
    public function cab(){
        return $this->hasMany(Cab::class, 'cab', 'id');
    }
    public function teach(){
        return $this->hasMany(User::class, 'teach', 'id');
    }
    public function clas(){
        return $this->hasMany(Clas::class, 'clas', 'id');
    }
    public function subj(){
        return $this->hasMany(Subject::class, 'subj', 'id');
    }
    public function lesn(){
        return $this->hasMany(Lesson::class, 'lesn', 'id');
    }
    public function comments(){
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
