<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DoctorBooking extends Model
{
    protected $fillable = [
        'doctor_id', 'patient_id', 'consultFor', 'medicalHistory', 'date', 'slot', 'time'
    ];

    public function doctor()
    {
        return $this->belongsTo('App\User','doctor_id');
    }


    public function patient()
    {
        return $this->belongsTo('App\User','patient_id');
    }

}
