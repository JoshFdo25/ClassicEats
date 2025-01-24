<x-app-layout>
    <div class="sm:px-10 px-4 sm:py-8 py-5">
        <div class="max-w-5xl mx-auto p-6 bg-white dark:bg-stone-800 rounded-lg shadow-md">
            <h1 class="text-3xl font-bold mb-6 text-center dark:text-white">Checkout</h1>
            <p class="text-lg font-medium mb-4">Total: Rs. {{ number_format($totalAmount, 2) }}</p>

            <form id="payment-form">
                <div id="card-element" class="my-4"></div>
                <div id="card-errors" role="alert" class="text-red-500"></div>
                <button type="submit" id="submit-button" class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-md">
                    Pay Rs. {{ number_format($totalAmount, 2) }}
                </button>
            </form>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe("{{ config('services.stripe.key') }}");
        const elements = stripe.elements();
        const card = elements.create('card');
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
                // Redirect or show success message
                window.location.href = "{{ route('products.index') }}";
            }
        });
    </script>
</x-app-layout>
