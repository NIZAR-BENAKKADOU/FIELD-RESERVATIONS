<x-app-layout>
    <!-- 3D Background Container -->
    <div id="bg-3d" class="fixed inset-0 z-0 pointer-events-none bg-gradient-to-br from-midnight to-midnight-light"></div>

    <div class="relative z-10 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            
            <!-- Welcome Section -->
            <div class="mb-8 flex flex-col md:flex-row justify-between items-end gap-6">
                <div>
                    <h2 class="text-3xl font-bold text-white mb-2">
                        Welcome back, <span class="text-neon-green">{{ Auth::user()->nom }}</span>
                    </h2>
                    <p class="text-gray-400">Here's what's happening on the field today.</p>
                </div>

                <!-- Weather Widget -->
                <div class="glass-dark px-6 py-3 rounded-xl flex items-center gap-4 border border-white/5">
                    <div class="text-right">
                        <p class="text-white font-bold text-lg">22°C</p>
                        <p class="text-neon-green text-xs font-medium uppercase tracking-wide">Perfect for Football</p>
                    </div>
                    <i class="bi bi-cloud-sun-fill text-3xl text-yellow-400"></i>
                </div>
            </div>

            <!-- Kickoff Countdown (If reservation exists) -->
            @if(isset($nextReservation) && $nextReservation)
            <div class="mb-12 relative overflow-hidden rounded-3xl glass-dark border border-neon-green/30 p-8">
                <div class="absolute top-0 right-0 -mt-10 -mr-10 w-64 h-64 bg-neon-green/10 rounded-full blur-3xl pointer-events-none"></div>
                
                <div class="relative z-10 flex flex-col md:flex-row items-center justify-between gap-8">
                    <div class="text-center md:text-left">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-neon-green/10 border border-neon-green/30 text-neon-green text-xs font-bold uppercase tracking-wider mb-3">
                            <span class="w-2 h-2 rounded-full bg-neon-green animate-pulse"></span> Next Match
                        </div>
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-2">
                            {{ $nextReservation->terrain->name }}
                        </h3>
                        <p class="text-gray-400 flex items-center gap-2 justify-center md:justify-start">
                            <i class="bi bi-calendar-event"></i> {{ \Carbon\Carbon::parse($nextReservation->date_de_reservation)->format('l, F jS') }}
                        </p>
                    </div>

                    <div id="kickoff-countdown" class="flex gap-4 md:gap-8" 
                         data-match-date="{{ $nextReservation->date_de_reservation }}" 
                         data-match-time="{{ $nextReservation->terrain->heure_debut }}">
                        
                        <div id="countdown-container" class="flex gap-4 md:gap-8">
                            <div class="text-center">
                                <div class="bg-midnight-light w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center border border-gray-700 shadow-lg mb-2">
                                    <span id="cd-days" class="text-2xl md:text-3xl font-bold text-white font-mono">00</span>
                                </div>
                                <span class="text-xs text-gray-500 uppercase tracking-wider">Days</span>
                            </div>
                            <div class="text-center">
                                <div class="bg-midnight-light w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center border border-gray-700 shadow-lg mb-2">
                                    <span id="cd-hours" class="text-2xl md:text-3xl font-bold text-white font-mono">00</span>
                                </div>
                                <span class="text-xs text-gray-500 uppercase tracking-wider">Hours</span>
                            </div>
                            <div class="text-center">
                                <div class="bg-midnight-light w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center border border-gray-700 shadow-lg mb-2">
                                    <span id="cd-minutes" class="text-2xl md:text-3xl font-bold text-white font-mono">00</span>
                                </div>
                                <span class="text-xs text-gray-500 uppercase tracking-wider">Mins</span>
                            </div>
                            <div class="text-center">
                                <div class="bg-midnight-light w-16 h-16 md:w-20 md:h-20 rounded-2xl flex items-center justify-center border border-gray-700 shadow-lg mb-2 relative overflow-hidden">
                                    <div class="absolute inset-0 bg-neon-green/10 animate-pulse"></div>
                                    <span id="cd-seconds" class="text-2xl md:text-3xl font-bold text-neon-green font-mono relative z-10">00</span>
                                </div>
                                <span class="text-xs text-neon-green uppercase tracking-wider font-bold">Secs</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif

            <!-- Stats Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
                <!-- Total Members -->
                <div class="glass-dark p-6 rounded-2xl flex items-center justify-between group hover:border-neon-green transition-colors duration-300">
                    <div>
                        <p class="text-gray-400 text-sm font-medium uppercase tracking-wider mb-1">Community</p>
                        <h3 class="text-3xl font-bold text-white">{{ $totalUsers }} <span class="text-sm text-gray-500 font-normal">Members</span></h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-midnight-light border border-gray-700 flex items-center justify-center text-neon-green group-hover:bg-neon-green group-hover:text-white transition-colors">
                        <i class="bi bi-people-fill text-xl"></i>
                    </div>
                </div>

                <!-- Online Now -->
                <div class="glass-dark p-6 rounded-2xl flex items-center justify-between group hover:border-neon-green transition-colors duration-300">
                    <div>
                        <p class="text-gray-400 text-sm font-medium uppercase tracking-wider mb-1">Online Now</p>
                        <h3 class="text-3xl font-bold text-white">{{ $onlineUsers }} <span class="text-sm text-gray-500 font-normal">Active</span></h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-midnight-light border border-gray-700 flex items-center justify-center text-neon-green group-hover:bg-neon-green group-hover:text-white transition-colors">
                        <i class="bi bi-circle-fill text-xl animate-pulse"></i>
                    </div>
                </div>

                <!-- My Reservations -->
                <div class="glass-dark p-6 rounded-2xl flex items-center justify-between group hover:border-neon-green transition-colors duration-300">
                    <div>
                        <p class="text-gray-400 text-sm font-medium uppercase tracking-wider mb-1">My Matches</p>
                        <h3 class="text-3xl font-bold text-white">{{ $myReservationsCount }} <span class="text-sm text-gray-500 font-normal">Played</span></h3>
                    </div>
                    <div class="w-12 h-12 rounded-full bg-midnight-light border border-gray-700 flex items-center justify-center text-neon-green group-hover:bg-neon-green group-hover:text-white transition-colors">
                        <i class="bi bi-trophy-fill text-xl"></i>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Available Fields -->
                <div class="lg:col-span-2 space-y-6">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <i class="bi bi-geo-alt text-neon-green"></i> Available Fields
                    </h3>
                    
                    @foreach($terrains as $terrain)
                    <div class="glass-dark p-6 rounded-2xl group hover:border-neon-green transition-colors duration-300">
                        <div class="flex flex-col md:flex-row gap-6">
                            <!-- Field Image (Placeholder/Icon) -->
                            <div class="w-full md:w-48 h-32 rounded-xl bg-midnight flex items-center justify-center overflow-hidden relative border border-gray-700 group-hover:border-neon-green/50 transition-colors">
                                <i class="bi bi-dribbble text-4xl text-gray-600 group-hover:text-neon-green transition-colors"></i>
                            </div>

                            <!-- Field Info -->
                            <div class="flex-1">
                                <div class="flex justify-between items-start mb-2">
                                    <h4 class="text-xl font-bold text-white group-hover:text-neon-green transition-colors">{{ $terrain->name }}</h4>
                                    <span class="px-3 py-1 rounded-full bg-emerald-900/30 text-neon-green text-xs font-bold border border-emerald-500/30">Available</span>
                                </div>
                                <p class="text-gray-400 text-sm mb-4"><i class="bi bi-geo-alt-fill mr-1 text-gray-500"></i> {{ $terrain->adresse }}</p>
                                
                                <div class="flex items-center justify-between mt-4">
                                    <div class="flex items-center gap-4 text-sm text-gray-400">
                                        <span><i class="bi bi-clock mr-1 text-neon-green"></i> {{ $terrain->heure_debut }} - {{ $terrain->heure_fin }}</span>
                                        <span><i class="bi bi-cash mr-1 text-neon-green"></i> {{ $terrain->prix }} DH/Hr</span>
                                    </div>
                                    <a href="{{ route('reservations.create', $terrain->id) }}" class="px-6 py-2 bg-neon-green hover:bg-emerald-600 text-white rounded-lg font-medium transition-all transform hover:scale-105 shadow-lg shadow-emerald-500/20">
                                        Book Now
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Recent Activity / History -->
                <div class="lg:col-span-1">
                    <h3 class="text-xl font-bold text-white mb-4 flex items-center gap-2">
                        <i class="bi bi-clock-history text-neon-green"></i> Recent Activity
                    </h3>
                    
                    <div class="glass-dark p-6 rounded-2xl min-h-[400px]">
                        @if($reservations->count() > 0)
                            <div class="space-y-6">
                                @foreach($reservations as $reservation)
                                        <p class="text-white font-medium text-sm">Reserved <span class="text-neon-green">{{ $reservation->terrain->name }}</span></p>
                                        <p class="text-gray-500 text-xs mt-1">{{ $reservation->created_at->diffForHumans() }}</p>
                                        <div class="mt-2 inline-block px-2 py-1 rounded bg-midnight border border-gray-700 text-xs text-gray-300">
                                            {{ $reservation->date_de_reservation }}
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        @else
                            <div class="h-full flex flex-col items-center justify-center text-center py-12">
                                <div class="w-16 h-16 rounded-full bg-midnight border border-gray-700 flex items-center justify-center mb-4">
                                    <i class="bi bi-calendar-x text-2xl text-gray-500"></i>
                                </div>
                                <p class="text-gray-400 font-medium">No reservations yet</p>
                                <p class="text-gray-500 text-sm mt-2">Book your first match today!</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    @vite(['resources/js/dashboard-3d.js', 'resources/js/dashboard-widgets.js'])
</x-app-layout>
