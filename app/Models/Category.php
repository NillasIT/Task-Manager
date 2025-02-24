<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';	
    
    public function tasks() {
        return $this->hasMany(Task::class);
    }
    
}
