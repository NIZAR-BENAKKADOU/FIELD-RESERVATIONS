<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                
                <!-- Terrain Details -->
                <div class="lg:col-span-2 space-y-8">
                    <!-- Hero Image & Info -->
                    <div class="solid-card rounded-2xl overflow-hidden">
                        <div class="h-64 md:h-96 relative">
                            @if($terrain->image && $terrain->image != 'image_terrain/no-image.jpg')
                                <img src="{{ asset('storage/' . $terrain->image) }}" alt="{{ $terrain->nom }}" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full bg-gray-800 flex items-center justify-center">
                                    <i class="bi bi-image text-6xl text-gray-700"></i>
                                </div>
                            @endif
                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-transparent to-transparent"></div>
                            <div class="absolute bottom-0 left-0 p-8">
                                <h1 class="text-4xl font-bold text-white mb-2">{{ $terrain->nom }}</h1>
                                <p class="text-gray-300 flex items-center gap-2">
                                    <i class="bi bi-geo-alt-fill text-indigo-500"></i> {{ $terrain->adresse }}
                                </p>
                            </div>
                        </div>
                        
                        <div class="p-8">
                            <div class="flex flex-wrap gap-4 mb-6">
                                <div class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-gray-300">
                                    <i class="bi bi-cash text-green-400 mr-2"></i> {{ $terrain->prix }} DH/Hr
                                </div>
                                <div class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-gray-300">
                                    <i class="bi bi-clock text-blue-400 mr-2"></i> {{ $terrain->heure_debut }} - {{ $terrain->heure_fin }}
                                </div>
                                <div class="px-4 py-2 rounded-lg bg-gray-800 border border-gray-700 text-gray-300">
                                    <i class="bi bi-star-fill text-yellow-400 mr-2"></i> {{ $terrain->note }}/5
                                </div>
                            </div>

                            <div class="flex justify-end">
                                <a href="{{ route('reservations.create', $terrain->id) }}" class="px-8 py-3 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold text-lg transition-all transform hover:scale-105 shadow-lg shadow-indigo-500/30">
                                    Book This Field
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Reviews Section -->
                    <div class="solid-card p-8 rounded-2xl">
                        <h3 class="text-2xl font-bold text-white mb-6">Reviews & Opinions</h3>
                        
                        <!-- Review Form -->
                        <form action="{{ route('terrains.comments.store', $terrain->id) }}" method="POST" class="mb-10 bg-gray-800/50 p-6 rounded-xl border border-gray-700">
                            @csrf
                            <div class="mb-4">
                                <label class="block text-gray-400 text-sm font-bold mb-2">Your Rating</label>
                                <div class="flex gap-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <label class="cursor-pointer">
                                            <input type="radio" name="rating" value="{{ $i }}" class="hidden peer" required>
                                            <i class="bi bi-star-fill text-2xl text-gray-600 peer-checked:text-yellow-400 hover:text-yellow-400 transition-colors"></i>
                                        </label>
                                    @endfor
                                </div>
                            </div>
                            <div class="mb-4">
                                <label class="block text-gray-400 text-sm font-bold mb-2">Your Opinion</label>
                                <textarea name="content" rows="3" class="w-full bg-gray-900 border border-gray-600 rounded-lg p-3 text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent" placeholder="Tell us about your experience..." required></textarea>
                            </div>
                            <button type="submit" class="px-6 py-2 bg-gray-700 hover:bg-gray-600 text-white rounded-lg font-medium transition-colors">
                                Post Review
                            </button>
                        </form>

                        <!-- Comments List -->
                        <div class="space-y-6">
                            @foreach($terrain->commentaires()->latest()->get() as $comment)
                                <div class="border-b border-gray-700 pb-6 last:border-0">
                                    <div class="flex justify-between items-start mb-2">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-indigo-500/20 flex items-center justify-center text-indigo-400 font-bold">
                                                {{ substr($comment->user->nom, 0, 1) }}
                                            </div>
                                            <div>
                                                <h4 class="text-white font-bold">{{ $comment->user->nom }}</h4>
                                                <div class="flex text-yellow-400 text-xs">
                                                    @for($i = 0; $i < $comment->rating; $i++) <i class="bi bi-star-fill"></i> @endfor
                                                    @for($i = $comment->rating; $i < 5; $i++) <i class="bi bi-star text-gray-600"></i> @endfor
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-gray-500 text-xs">{{ $comment->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-gray-300 pl-13">{{ $comment->content }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Sidebar (Availability / Map placeholder) -->
                <div class="space-y-6">
                    <div class="solid-card p-6 rounded-2xl">
                        <h3 class="text-xl font-bold text-white mb-4">Location</h3>
                        <div class="aspect-square bg-gray-800 rounded-xl flex items-center justify-center">
                            <p class="text-gray-500"><i class="bi bi-map text-4xl"></i><br>Map View</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
