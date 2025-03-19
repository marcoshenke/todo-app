<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['title', 'description', 'task_date', 'user_id', 'completed'];

    protected $casts = [
        'task_date' => 'date',
    ];
}
