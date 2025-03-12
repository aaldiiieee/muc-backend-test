<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    
    protected $fillable = ['employees_id', 'task_name', 'due_date'];
    
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employees_id');
    }
}