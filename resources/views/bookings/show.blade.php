<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Booking Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Booking Details</h1>

                <div class="mb-4">
                    <strong>Name:</strong> {{ $booking->user_name }}
                </div>
                <div class="mb-4">
                    <strong>Phone:</strong> {{ $booking->phone_number }}
                </div>
                <div class="mb-4">
                    <strong>District:</strong> {{ $booking->district }}
                </div>
                <div class="mb-4">
                    <strong>Company Name:</strong> {{ $booking->thana }}
                </div>
                <div class="mb-4">
                    <strong>Slot Time:</strong> {{ $booking->slot_time }}
                </div>
                <div class="mb-4">
                    <strong>Slot Type:</strong> {{ $booking->slot_type }}
                </div>

                <!-- অন্যান্য তথ্য বা এডিট বাটন যদি প্রয়োজন হয় -->
                <a href="{{ route('bookings.edit', $booking->id) }}" class="text-blue-500">Edit Booking</a>
            </div>
        </div>
    </div>
</x-app-layout>
