<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model {

    protected $fillable = [
        "patient_id",
        "doctor_id",
        "status",
        "type",
        "start_time",
        "end_time",
        "reason",
        "notes"
    ];

    public function doctor() : BelongsTo {
        return $this->belongsTo(User::class, "doctor_id");
    }

    public function patient() : BelongsTo {
        return $this->belongsTo(Patient::class);
    }
}
