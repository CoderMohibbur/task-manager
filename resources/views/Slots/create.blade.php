<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Create Booking</h1>

                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <!-- User Info -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Name:</label>
                        <input type="text" name="user_name" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Phone:</label>
                        <input type="text" name="phone_number" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">District:</label>
                        <input type="text" name="district" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700">Company Name:</label>
                        <input type="text" name="thana" class="w-full border rounded px-3 py-2">
                    </div>

                    <!-- Slot Selection -->
                    <div class="mb-4">
                        <label class="block text-gray-700">Available Slots:</label>
                        <select name="slot_id" class="w-full border rounded px-3 py-2">
                            @foreach($availableSlots as $slot)
                                <option value="{{ $slot->id }}">{{ $slot->slot_time }} - {{ $slot->slot_type }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Book Now</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
