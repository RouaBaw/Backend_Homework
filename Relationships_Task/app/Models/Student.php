<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name'];

    public function medicalFile(){
        return $this->hasOne(MedicalFile::class);
    }
}
