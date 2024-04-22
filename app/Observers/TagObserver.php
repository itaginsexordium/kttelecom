<?php

namespace App\Observers;

use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;

class TagObserver
{
    public function updated(Model $model)
    {
        Tag::updateOrCreate(
            ['model' => get_class($model), 'model_id' => $model->id],
            ['name' => $model->name]
        );
    }

    public function created(Model $model)
    {
        $model->tag->updateOrCreate(
            ['model' => get_class($model), 'model_id' => $model->id],
            ['name' => $model->name]
        );
    }

    public function deleted(Model $model)
    {
    }
}
