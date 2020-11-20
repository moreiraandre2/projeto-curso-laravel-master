<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldWork extends Model
{
    public function students() {
        return $this->belongsToMany(Student::class)
                    ->withPivot('created_at');
    }
}
