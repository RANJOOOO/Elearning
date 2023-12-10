<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class multiplelessons extends Model
{
    use HasFactory;
    protected $fillable = ['adminUnit_id' ,'lessonName', 'lessonTitle', 'description', 'order'];

    public function manyunit()
    {
        return $this->belongsTo(multipleunits::class, 'adminUnit_id', 'id');
    }
    public function pages()
    {
        return $this->hasMany(multiplepages::class, 'adminLesson_id');
    }
}
