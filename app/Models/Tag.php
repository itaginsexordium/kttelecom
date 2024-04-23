<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'model',
        'model_id'
    ];


    public function taggable()
    {
        return $this->morphTo('taggable', 'model', 'model_id');
    }
}
