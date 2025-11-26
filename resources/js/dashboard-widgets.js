// Dashboard Widgets Logic

document.addEventListener('DOMContentLoaded', function () {
    // Kickoff Countdown
    const countdownElement = document.getElementById('kickoff-countdown');

    if (countdownElement) {
        const matchDate = countdownElement.getAttribute('data-match-date');
        const matchTime = countdownElement.getAttribute('data-match-time');

        // Combine date and time
        const targetDate = new Date(`${matchDate}T${matchTime}`);

        function updateCountdown() {
            const now = new Date();
            const difference = targetDate - now;

            if (difference > 0) {
                const days = Math.floor(difference / (1000 * 60 * 60 * 24));
                const hours = Math.floor((difference % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((difference % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((difference % (1000 * 60)) / 1000);

                document.getElementById('cd-days').innerText = String(days).padStart(2, '0');
                document.getElementById('cd-hours').innerText = String(hours).padStart(2, '0');
                document.getElementById('cd-minutes').innerText = String(minutes).padStart(2, '0');
                document.getElementById('cd-seconds').innerText = String(seconds).padStart(2, '0');
            } else {
                // Match started or passed
                document.getElementById('countdown-container').innerHTML = '<div class="text-2xl font-bold text-neon-green animate-pulse">MATCH DAY IS HERE!</div>';
            }
        }

        setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call
    }
});
