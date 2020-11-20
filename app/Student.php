<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function fieldworks() {
        return $this->belongsToMany(FieldWork::class)
                    ->withPivot('created_at');
    }

    public function disciplines() {
        return $this->belongsToMany(disciplines::class)
                    ->withPivot('created_at');
    }
}
