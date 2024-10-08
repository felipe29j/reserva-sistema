<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['hotel_id', 'name', 'email', 'phone', 'cell', 'document_type', 'document_number', 'address'];
}
