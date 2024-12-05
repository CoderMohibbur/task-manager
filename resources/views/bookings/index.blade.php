<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bookings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Bookings</h1>
                <a href="{{ route('bookings.create') }}" class="btn btn-primary mb-4">Create Booking</a>

                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Name</th>
                            <th class="border border-gray-300 px-4 py-2">Phone</th>
                            <th class="border border-gray-300 px-4 py-2">District</th>
                            <th class="border border-gray-300 px-4 py-2">Compnay Name</th>
                            <th class="border border-gray-300 px-4 py-2">Slot Time</th>
                            <th class="border border-gray-300 px-4 py-2">Slot Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bookings as $booking)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->user_name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->phone_number }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->district }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->thana }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->slot_time }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $booking->slot_type }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
