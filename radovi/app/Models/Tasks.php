<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    public function signedStudents() {
        return $this->belongsToMany(User::class, 'user_tasks', 'student_id', 'task_id');
    }
}
