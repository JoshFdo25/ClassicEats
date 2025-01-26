<x-guest-layout>
    <div class="sm:px-10 px-4 sm:py-8 py-5">
        <div class="max-w-8xl mx-auto p-6 bg-white dark:bg-stone-800 rounded-lg shadow-md text-center">
            <h1 class="text-3xl font-bold mb-6 text-center dark:text-white">Payment Successful</h1>
            <p class="text-lg font-medium mb-4 dark:text-white">Thank you for your purchase!</p>
            <p class="dark:text-white">Your payment has been processed successfully.</p>

            <p id="redirect-message" class="mt-4 text-gray-600 dark:text-gray-300">
                Click "Continue Shopping" to continue, 
                or the page will automatically redirect to the products page in <span id="countdown">5</span> seconds.
            </p>

            <a href="{{ route('products.index') }}" class="mt-6 inline-block px-6 py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-500">
                Continue Shopping
            </a>
        </div>
    </div>

    <script>
        let countdown = 10; // Initial countdown time in seconds
        const countdownElement = document.getElementById('countdown');

        const interval = setInterval(() => {
            countdown--;
            countdownElement.textContent = countdown; // Update the countdown text

            if (countdown <= 0) {
                clearInterval(interval); // Stop the countdown
                window.location.href = "{{ route('products.index') }}"; // Redirect to products page
            }
        }, 1000); // Update every second
    </script>
</x-guest-layout>
