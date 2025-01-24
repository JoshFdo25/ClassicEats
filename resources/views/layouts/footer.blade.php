<footer class="w-full bottom-0 py-4 mt-auto bg-gradient-to-r from-[#002387] to-[#001147]">
    <div class="container grid gap-8 px-4 mx-auto sm:px-6 lg:px-8 md:grid-cols-2 lg:grid-cols-4">
        <!-- About Section -->
        <div class="space-y-5">
            <div>
                <img src="{{ asset('/public/assets/image/logo.png') }}" alt="Sierra Fashion Logo" class="h-[50px] w-[80px]">
            </div>
            <p class="text-sm text-gray-400">
                Sierra Fashion is an e-commerce platform that sells a wide variety of clothing essentials. It is a one-stop destination for all your clothing needs.
            </p>
            <div class="flex mt-4 space-x-2">
                <img src="{{ asset('assets/image/visacard.png') }}" alt="Visa Card" class="h-6">
            </div>
        </div>

        <!-- Shopping -->
        <div>
            <h3 class="mb-4 text-lg text-white">SHOPPING</h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Men Store</a></li>
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Women Store</a></li>
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Kids Store</a></li>
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Accessories</a></li>
            </ul>
        </div>

        <!-- Customer Services -->
        <div>
            <h3 class="mb-4 text-lg text-white">CUSTOMER SERVICES</h3>
            <ul class="space-y-2">
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Contact Us</a></li>
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Payment Methods</a></li>
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Delivery</a></li>
                <li><a href="#" class="text-sm text-gray-400 hover:text-white">Return & Exchange</a></li>
            </ul>
        </div>

        <!-- Newsletter -->
        <div>
            <h3 class="mb-4 text-lg text-white">NEWSLETTER</h3>
            <p class="mb-4 text-sm text-gray-400">Be the first to know about new arrivals, look books, sales & promos!</p>
            <form action="#" method="POST" class="flex flex-col space-y-2 sm:flex-row sm:space-y-0 sm:space-x-2">
                <input type="email" name="email" placeholder="Your Email" class="flex-1 px-4 py-2 text-sm text-white bg-transparent border rounded-md focus:outline-none">
                <button type="submit" class="px-4 py-2 bg-gray-700 rounded-md hover:bg-gray-600">
                    <i class="fa-regular fa-envelope fa-lg" style="color: #ffffff;"></i>
                </button>
            </form>
            <div class="flex mt-4 space-x-4">
                <a href="#">
                    <img src="{{ asset('assets/image/media1.png') }}" alt="Instagram" class="h-6">
                </a>
                <a href="#">
                    <img src="{{ asset('assets/image/media2.png') }}" alt="Facebook" class="h-6">
                </a>
                <a href="#">
                    <img src="{{ asset('assets/image/media3.png') }}" alt="Twitter" class="h-6">
                </a>
                <a href="#">
                    <img src="{{ asset('assets/image/media4.png') }}" alt="LinkedIn" class="h-6">
                </a>
                <a href="#">
                    <img src="{{ asset('assets/image/media5.png') }}" alt="YouTube" class="h-6">
                </a>
            </div>
        </div>
    </div>
    
    <script src="{{ asset('assets/js/canvas.js') }}"></script>
    <script src="{{ asset('assets/js/Product.js') }}"></script>

    
    

    <!-- AOS Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    </script>
</footer>