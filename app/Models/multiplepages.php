<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multiplepages extends Model
{
    use HasFactory;
    protected $fillable = ['adminLesson_id', 'title', 'page_type', 'order'];
    public function lesson()
    {
        return $this->belongsTo(multiplelessons::class, 'adminLesson_id');
    }
    public function plainHtmlPage()
    {
        return $this->hasMany(plainhtml::class);
    }
    public function singletextfield()
    {
        return $this->hasMany(singletextfield::class, 'adminPage_id', 'id');
    }
    public function singletextarea()
    {
        return $this->hasMany(singletextarea::class, 'adminPage_id', 'id');
    }
    public function quizwithchoices()
    {
        return $this->hasMany(quizwithchoices::class, 'adminPage_id', 'id');
    }
    public function quizwithmultiplechoices()
    {
        return $this->hasMany(quizmultiplechoices::class, 'adminPage_id', 'id');
    }
}
