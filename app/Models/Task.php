<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\TaskState;



class Task extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'order',
        'priority',
        'deadline',
        'task_state_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'task_assigned_user');
    }

    public function taskState()
    {
        return $this->belongsTo('App\Models\TaskState');
    }
}
