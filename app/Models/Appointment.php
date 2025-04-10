<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model {

    protected $fillable = [
        "patient_id",
        "doctor_id",
        "status",
        "type",
        "start",
        "duration",
        "reason",
        "notes"
    ];


    public function getTimeRangeAttribute() : string {
        return Carbon::parse($this->attributes[ "start" ])
                     ->format('m/d/y h:m A')." to ".
               Carbon::parse($this->attributes[ "end" ])
                     ->format('m/d/y h:m A');
    }


    public function doctor() : BelongsTo {
        return $this->belongsTo(User::class, "doctor_id");
    }

    public function patient() : BelongsTo {
        return $this->belongsTo(Patient::class);
    }
}
