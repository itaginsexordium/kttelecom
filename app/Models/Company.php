<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;

class Company extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = [
        'company_lists_id',
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'apartments',
        'pass_data',
    ];

    protected $casts = [
        'pass_data' => 'array',
    ];

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }


    public function tag()
    {
        return $this->morphOne(Tag::class, 'taggable', 'model', 'model_id');
    }


    public function list()
    {
        return $this->belongsTo(CompanyList::class, 'company_lists_id');
    }


    public function getFullNameAttribute()
    {
        return $this->first_name . " " . $this->last_name;
    }

    public function getNameAttribute()
    {
        return  "(клиент) " . $this->full_name;
    }

    public function getFullAdressAttribute($value)
    {
        return $this->address .  " #" . $this->apartments;
    }
}
