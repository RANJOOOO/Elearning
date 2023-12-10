<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class singletextarea extends Model
{
    use HasFactory;
    protected $fillable = ['Title', 'html_code','textAreaTitle','order','page_type',];

    public function multiplePagetextarea()
    {
        return $this->belongsTo(multiplepages::class, 'adminPage_id', 'id');
    }
}
