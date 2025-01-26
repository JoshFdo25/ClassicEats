<x-app-layout>
    <div class="sm:px-6 px-3 sm:py-6 py-4 bg-gray-100 dark:bg-stone-900">
        <div class="max-w-lg mx-auto p-6 bg-gradient-to-r from-blue-50 to-white dark:from-stone-800 dark:to-stone-700 rounded-lg shadow-lg">
            <!-- Header Section -->
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-3 text-gray-800 dark:text-white">Secure Checkout</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400">Complete your payment to enjoy your purchase!</p>
            </div>

            <!-- Total Amount Section -->
            <div class="border border-gray-300 dark:border-gray-600 rounded-md p-3 mt-4 mb-6 bg-white dark:bg-stone-800 shadow-sm">
                <div class="flex justify-between items-center">
                    <span class="text-base font-medium text-gray-700 dark:text-gray-300">Total:</span>
                    <span class="text-xl font-bold text-blue-600 dark:text-blue-400">Rs. {{ number_format($totalAmount, 2) }}</span>
                </div>
            </div>

            <!-- Payment Form -->
            <form id="payment-form" class="space-y-6">
                <!-- Card Details -->
                <div>
                    <label for="card-element" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Card Details
                    </label>
                    <div id="card-element" class="p-2 border border-gray-300 rounded-md dark:text-white shadow-sm dark:border-gray-600 bg-gray-50 dark:bg-gray-700"></div>
                    <div id="card-errors" role="alert" class="mt-1 text-xs text-red-500"></div>
                </div>

                <!-- Payment Button -->
                <button type="submit" id="submit-button"
                    class="w-full py-2 bg-gradient-to-r from-blue-600 to-blue-500 text-white font-medium text-sm rounded-md shadow-md hover:from-blue-500 hover:to-blue-400 focus:ring-2 focus:ring-blue-300 dark:focus:ring-blue-500">
                    Pay Rs. {{ number_format($totalAmount, 2) }}
                </button>
            </form>

            <!-- Assurance and Security Section -->
            <div class="mt-8 text-center">
                <p class="text-xs text-gray-500 dark:text-gray-400">Your payment is 100% secure. We use industry-standard encryption to protect your details.</p>
                <div class="flex justify-center gap-3 mt-3">
                    <img src="https://img.icons8.com/color/36/000000/visa.png" alt="Visa" class="h-6">
                    <img src="https://img.icons8.com/color/36/000000/mastercard-logo.png" alt="MasterCard" class="h-6">
                    <img src="https://img.icons8.com/color/36/000000/amex.png" alt="American Express" class="h-6">
                    <img src="https://img.icons8.com/color/36/000000/discover.png" alt="Discover" class="h-6">
                </div>
            </div>
        </div>
    </div>

    <!-- Stripe Script -->
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();

        const style = {
            base: {
                fontSize: '14px',
                color: '#424770',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                '::placeholder': {
                    color: '#aab7c4',
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a',
            },
        };

        const card = elements.create('card', { style });
        card.mount('#card-element');

        const form = document.getElementById('payment-form');
        form.addEventListener('submit', async (e) => {
            e.preventDefault();

            const { paymentIntent, error } = await stripe.confirmCardPayment(
                "{{ $clientSecret }}", {
                    payment_method: {
                        card: card,
                        billing_details: {
                            name: "{{ auth()->user()->name }}",
                            email: "{{ auth()->user()->email }}",
                        },
                    },
                }
            );

            if (error) {
                document.getElementById('card-errors').textContent = error.message;
            } else {
                window.location.href = "{{ route('checkout.success') }}";
            }
        });
    </script>
</x-app-layout>
