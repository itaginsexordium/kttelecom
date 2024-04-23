<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Task extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

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

    public function parent()
    {
        return $this->belongsTo(Task::class, 'parent_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    public function tag()
    {
        return $this->morphOne(Tag::class, 'taggable', 'model', 'model_id');
    }
}
