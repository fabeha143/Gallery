<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class photo extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['image','category_id'];
    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
