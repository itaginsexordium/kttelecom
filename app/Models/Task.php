<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id',
        'task_list_id',
        'from',
        'to',
    ];

    public function list()
    {
        return $this->belongsTo(TaskList::class, 'task_list_id');
    }

    public function links()
    {
        return $this->morphMany(Links::class, 'linkable');
    }
}
