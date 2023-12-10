<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plainhtml extends Model
{
    use HasFactory;
    protected $fillable = [
        'adminPage_id',
        'Title',
        'html_code',
        'order',
        'page_type',
         // Add this line
        // Add other fields as needed
    ];
    public function manypages()
    {
        return $this->belongsTo(multiplepages::class, 'adminPage_id');

    }
}
