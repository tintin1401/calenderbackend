<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'image',
        'date',
        'hour',
        'labels_id',
        'categories_id',
        'courses_id',
        'status_activities_id',
    ];

    public function labels()
    {
        return $this->belongsTo(Label::class, 'labels_id');
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'categories_id');
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, 'courses_id');
    }
}
