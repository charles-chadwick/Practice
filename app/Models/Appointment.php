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
        $start = Carbon::parse($this->attributes['start']);
        $end = Carbon::parse($this->attributes['start'])->addMinutes($this->attributes['duration']);
        return $start->format("m/d/Y h:i a").' to '.$end->format("h:i a");
    }


    public function doctor() : BelongsTo {
        return $this->belongsTo(User::class, "doctor_id");
    }

    public function patient() : BelongsTo {
        return $this->belongsTo(Patient::class);
    }
}
