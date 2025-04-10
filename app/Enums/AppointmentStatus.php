<?php

namespace App\Enums;

enum AppointmentStatus: string {
    case Confirmed   = "Confirmed";
    case Cancelled   = "Cancelled";
    case Pending     = "Pending";
    case Rescheduled = "Rescheduled";
    case Completed   = "Completed";
}
