<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_name',
        'phone_number',
        'district',
        'thana',
        'company_name',
        'slot_time',
        'slot_type',
        'google_event_id',
    ];
}
