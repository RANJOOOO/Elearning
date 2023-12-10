<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class singletextfield extends Model
{
    use HasFactory;
    protected $fillable = ['Title', 'html_code','textFieldTitle','order','page_type',];
    public function multiplePage()
    {
        return $this->belongsTo(multiplepages::class, 'adminPage_id', 'id');
    }

}
