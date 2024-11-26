<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'priority',
        'status',
        'project_id',
        'check_in_time', // Added check_in_time
        'check_out_time', // Added check_out_time
    ];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    // Optionally, a method to calculate time spent on the task
    public function getTimeSpentAttribute()
    {
        if ($this->check_in_time && $this->check_out_time) {
            return $this->check_out_time->diffInMinutes($this->check_in_time) . ' minutes';
        }
        return 'N/A';
    }



}
