<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'apartment_id', 'guest_id', 'code', 'status', 'quantity', 'unit_value', 'total_value', 'check_in_date', 'check_out_date'];
}
