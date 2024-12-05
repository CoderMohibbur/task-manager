<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Booking') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Create Booking</h1>

                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <label for="user_name" class="block text-gray-700">Name:</label>
                        <input type="text" name="user_name" id="user_name" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700">Phone:</label>
                        <input type="text" name="phone_number" id="phone_number" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="district" class="block text-gray-700">District:</label>
                        <input type="text" name="district" id="district" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="thana" class="block text-gray-700">Compnay Name:</label>
                        <input type="text" name="thana" id="thana" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="slot_time" class="block text-gray-700">Slot Time:</label>
                        <input type="datetime-local" name="slot_time" id="slot_time" class="w-full border border-gray-300 rounded px-3 py-2" required>
                    </div>
                    <div class="mb-4">
                        <label for="slot_type" class="block text-gray-700">Slot Type:</label>
                        <select name="slot_type" id="slot_type" class="w-full border border-gray-300 rounded px-3 py-2">
                            <option value="Medium">Medium</option>
                            <option value="High">High</option>
                            <option value="Emergency">Emergency</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Submit</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
