@session("message")
<div id="alert" class="bg-lime-500 text-white p-4 rounded mt-4 shadow transition-opacity opacity-100"
>
    {{ $value }}
</div>
<script>
    // Wait for 10 seconds (10,000 milliseconds)
    setTimeout(() => {
        const alertDiv = document.getElementById('alert');
        if (alertDiv) {
            // Add the Tailwind `opacity-0` class to fade it out
            alertDiv.classList.add('opacity-0', 'transition-opacity', 'duration-1000');

            // Completely hide it from the layout after it fades (optional)
            setTimeout(() => alertDiv.remove(), 1000); // Wait 1 additional second for fade-out to finish
        }
    }, 10000);
</script>

@endsession
