<?php

namespace App\Http\Controllers;

use App\Models\Slot;
use App\Models\Booking;
use Illuminate\Http\Request;

class SlotController extends Controller
{
    public function availableSlots()
    {
        $slots = Slot::where('is_booked', false)->get();
        return view('slots.available', compact('slots'));
    }

    public function index()
    {
        // Fetch all bookings with their related slot
        $bookings = Booking::with('slot')->get();

        return view('bookings.index', compact('bookings'));
    }
}
