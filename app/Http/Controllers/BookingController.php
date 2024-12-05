<?php
namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::all();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:15',
            'district' => 'required|string',
            'thana' => 'required|string',
            'slot_time' => 'required|date',
            'slot_type' => 'required|in:Medium,High,Emergency',
        ]);

        // Save booking in database
        $booking = Booking::create($request->all());

        // Add to Google Calendar
        $event = new Event();
        $event->name = "Booking by {$booking->user_name}";
        $event->startDateTime = Carbon::parse($booking->slot_time);
        $event->endDateTime = Carbon::parse($booking->slot_time)->addHour();
        $event->description = "Phone: {$booking->phone_number}, District: {$booking->district}, Thana: {$booking->thana}";
        $googleEvent = $event->save();

        $booking->google_event_id = $googleEvent->id;
        $booking->save();

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
    }
}
