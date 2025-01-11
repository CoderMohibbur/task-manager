<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Available Slots') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold mb-4">Available Slots</h1>

                <table class="table-auto w-full border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border border-gray-300 px-4 py-2">Start Time</th>
                            <th class="border border-gray-300 px-4 py-2">End Time</th>
                            <th class="border border-gray-300 px-4 py-2">Title</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($bookedSlots as $slot)
                            <tr>
                                <td class="border border-gray-300 px-4 py-2">{{ $slot['start'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $slot['end'] }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $slot['title'] }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="3" class="border border-gray-300 px-4 py-2 text-center">No slots available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
