<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lessons extends Model
{
    use HasFactory;

    public function Task(): HasMany
    {
        return $this->belongsToMany('\App\Models\Task', 'task_id');
    }
}
