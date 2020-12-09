<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class TaskState extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'order'
    ];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }
}
