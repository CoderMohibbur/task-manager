<?php
// namespace App\Http\Controllers;

// use App\Models\Booking;
// use Illuminate\Http\Request;
// use Carbon\Carbon;
// use Spatie\GoogleCalendar\Event;

// class BookingController extends Controller
// {
//     public function index()
//     {
//         $bookings = Booking::all();
//         return view('bookings.index', compact('bookings'));
//     }

//     public function create()
//     {
//         return view('bookings.create');
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'user_name' => 'required|string|max:255',
//             'phone_number' => 'required|string|max:15',
//             'district' => 'required|string',
//             'thana' => 'required|string',
//             'slot_time' => 'required|date',
//             'slot_type' => 'required|in:Medium,High,Emergency',
//         ]);

//         // Save booking in database
//         $booking = Booking::create($request->all());

//         // Add to Google Calendar
//         $event = new Event();
//         $event->name = "Booking by {$booking->user_name}";
//         $event->startDateTime = Carbon::parse($booking->slot_time);
//         $event->endDateTime = Carbon::parse($booking->slot_time)->addHour();
//         $event->description = "Phone: {$booking->phone_number}, District: {$booking->district}, Thana: {$booking->thana}";
//         $googleEvent = $event->save();

//         $booking->google_event_id = $googleEvent->id;
//         $booking->save();

//         return redirect()->route('bookings.index')->with('success', 'Booking created successfully.');
//     }
// }


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

use Spatie\GoogleCalendar\Event;

class BookingController extends Controller
{
    public function availableSlots()
    {
        $events = Event::get();
        $bookedSlots = [];
        foreach ($events as $event) {
            $bookedSlots[] = [
                'start' => $event->startDateTime->format('Y-m-d H:i:s'),
                'end' => $event->endDateTime->format('Y-m-d H:i:s'),
                'title' => $event->name,
            ];
        }

        // Debugging to check if data is passed
        dd($bookedSlots);

        return view('bookings.available-slots', compact('bookedSlots'));
    }



    public function createBooking(Request $request)
    {
        $event = Event::create([
            'name' => $request->title,
            'startDateTime' => $request->start_time,
            'endDateTime' => $request->end_time,
        ]);

        return redirect()->route('bookings.available-slots')->with('success', 'Booking created successfully!');
    }
    public function show($id)
{
    // এখানে আপনি বুকিং আইডি অনুসারে বুকিং তথ্য নিয়ে আসবেন
    $booking = Booking::findOrFail($id);

    // বুকিংয়ের বিস্তারিত পেজ দেখাতে ভিউে পাঠান
    return view('bookings.show', compact('booking'));
}

public function index()
{
    // সমস্ত বুকিং তথ্য সংগ্রহ করুন
    $bookings = Booking::all();

    // বুকিং তালিকা ভিউতে পাঠান
    return view('bookings.index', compact('bookings'));
}
public function create()
{
    return view('bookings.create');
}
public function store(Request $request)
{
    // ইনপুট ভ্যালিডেশন
    $validated = $request->validate([
        'user_name' => 'required|string|max:255',
        'phone_number' => 'required|string|max:15',
        'district' => 'required|string|max:255',
        'thana' => 'required|string|max:255',
        'slot_time' => 'required|date',
        'slot_type' => 'required|string|in:Medium,High,Emergency',
    ]);

    // বুকিং তৈরি
    $booking = new Booking();
    $booking->user_name = $validated['user_name'];
    $booking->phone_number = $validated['phone_number'];
    $booking->district = $validated['district'];
    $booking->thana = $validated['thana'];
    $booking->slot_time = $validated['slot_time'];
    $booking->slot_type = $validated['slot_type'];
    $booking->save();

    // বুকিং সফল হলে রিডাইরেক্ট
    return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
}

}

