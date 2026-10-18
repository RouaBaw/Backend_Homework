<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicalFile extends Model
{

    protected  $fillable = ['blood_type','emergency_phone_number'];
    public function student(){
        return $this->belondsTo(Student::class);
    }
}
