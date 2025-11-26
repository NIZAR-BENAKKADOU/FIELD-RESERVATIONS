<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="solid-card rounded-2xl overflow-hidden shadow-xl">
                
                <!-- Header -->
                <div class="bg-gray-800/50 p-6 border-b border-gray-700">
                    <h2 class="text-2xl font-bold text-white flex items-center gap-3">
                        <i class="bi bi-calendar-plus text-indigo-500"></i>
                        Book Reservation
                    </h2>
                    <p class="text-gray-400 text-sm mt-1">Secure your spot on the field.</p>
                </div>

                <div class="p-8">
                    <form method="POST" action="{{ route('reservations.store') }}" class="space-y-6">
                        @csrf
                        <input type="hidden" name="users_id" value="{{ auth()->id() }}">
                        <input type="hidden" name="terrain_id" value="{{ $terrain->id }}">

                        <!-- User & Terrain Info (Read-only) -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Player Name</label>
                                <div class="w-full bg-gray-900/50 border border-gray-700 rounded-lg px-4 py-3 text-gray-300">
                                    {{ $currentUser->nom }}
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-400 mb-2">Field</label>
                                <div class="w-full bg-gray-900/50 border border-gray-700 rounded-lg px-4 py-3 text-gray-300">
                                    {{ $terrain->nom }}
                                </div>
                            </div>
                        </div>

                        <!-- Date -->
                        <div>
                            <label for="date_de_reservation" class="block text-sm font-medium text-gray-300 mb-2">Date</label>
                            <input type="date" id="date_de_reservation" name="date_de_reservation" 
                                class="w-full bg-gray-900 border border-gray-600 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all"
                                required min="{{ date('Y-m-d') }}">
                            <x-input-error :messages="$errors->get('date_de_reservation')" class="mt-2" />
                        </div>

                        <!-- Time Selection -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="heure_debut" class="block text-sm font-medium text-gray-300 mb-2">Start Time</label>
                                <select id="heure_debut" name="heure_debut" 
                                    class="w-full bg-gray-900 border border-gray-600 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                                    @for ($hour = 8; $hour <= 23; $hour++)
                                        <option value="{{ sprintf('%02d', $hour) }}:00">{{ sprintf('%02d', $hour) }}:00</option>
                                    @endfor
                                </select>
                                <x-input-error :messages="$errors->get('heure_debut')" class="mt-2" />
                            </div>

                            <div>
                                <label for="heure_fin" class="block text-sm font-medium text-gray-300 mb-2">End Time</label>
                                <select id="heure_fin" name="heure_fin" 
                                    class="w-full bg-gray-900 border border-gray-600 rounded-lg px-4 py-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all">
                                    <option value="">Select Start Time First</option>
                                </select>
                                <x-input-error :messages="$errors->get('heure_fin')" class="mt-2" />
                            </div>
                        </div>

                        <!-- Price -->
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Price per Hour</label>
                            <div class="w-full bg-gray-900/50 border border-gray-700 rounded-lg px-4 py-3 text-green-400 font-bold flex items-center gap-2">
                                <i class="bi bi-cash"></i> {{ $terrain->prix }} DH
                            </div>
                            <input type="hidden" name="montant" value="{{ $terrain->prix }}">
                        </div>

                        <!-- Actions -->
                        <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-700 mt-6">
                            <a href="{{ route('dashboard') }}" class="px-6 py-2 text-gray-400 hover:text-white transition-colors">Cancel</a>
                            <button type="submit" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold transition-all transform hover:scale-105 shadow-lg shadow-indigo-500/30">
                                Confirm Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const startSelect = document.getElementById('heure_debut');
            const endSelect = document.getElementById('heure_fin');

            function updateEndTime() {
                const startTime = startSelect.value;
                endSelect.innerHTML = '';
                
                if (startTime) {
                    const startHour = parseInt(startTime.split(':')[0]);
                    
                    if (startHour < 24) {
                        for (let hour = startHour + 1; hour <= 24; hour++) {
                            const timeString = (hour === 24 ? '00' : hour.toString().padStart(2, '0')) + ':00';
                            const option = document.createElement('option');
                            option.value = timeString;
                            option.text = timeString;
                            endSelect.add(option);
                        }
                        // Default to 1 hour duration
                        if (endSelect.options.length > 0) {
                            endSelect.selectedIndex = 0;
                        }
                    }
                }
            }

            startSelect.addEventListener('change', updateEndTime);
            
            // Initialize
            updateEndTime();
        });
    </script>
</x-app-layout>