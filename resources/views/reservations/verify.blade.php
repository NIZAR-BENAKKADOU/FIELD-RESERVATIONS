<x-app-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-900">
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-gray-800 border border-gray-700 shadow-xl overflow-hidden sm:rounded-2xl">
            <div class="text-center mb-6">
                <h2 class="text-2xl font-bold text-white">Verify Reservation</h2>
                <p class="text-gray-400 text-sm">We sent a verification code to your phone.</p>
                <p class="text-indigo-400 text-xs mt-1">Code: {{ session('mock_code') }} (Mocked for Demo)</p>
            </div>

            <form method="POST" action="{{ route('reservations.confirm', $reservation->id) }}">
                @csrf

                <div>
                    <label for="verification_code" class="block text-sm font-medium text-gray-300 mb-1">Verification Code</label>
                    <input id="verification_code" class="w-full bg-gray-900/50 border border-gray-600 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent transition-all placeholder-gray-500 text-center tracking-widest text-xl" type="text" name="verification_code" required autofocus placeholder="0000" maxlength="4" />
                    <x-input-error :messages="$errors->get('verification_code')" class="mt-2" />
                </div>

                <div class="mt-6">
                    <button class="w-full bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 px-4 rounded-lg transition-all transform hover:scale-[1.02] shadow-lg shadow-indigo-500/30">
                        {{ __('Confirm Reservation') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
