<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-64 md:h-[50vh] lg:h-screen rounded-bl-xl rounded-br-xl overflow-hidden"
         style="background-image: url('{{ asset('./storage/home_images/banner.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-55 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="text-lg sm:text-2xl md:text-4xl font-bold mb-2 font-playwrite-cu">
                    Welcome to Classic Eats
                </h1>
            </div>
        </div>
    </div>

    <!-- Introduction Section -->
    <div class="p-4 sm:p-6 md:p-10">
        <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-md p-5 lg:px-20 lg:py-10">
            <p class="text-black dark:text-white text-center text-sm sm:text-base md:text-lg lg:text-xl leading-relaxed">
                "Experience Culinary Excellence in Every Bite. At Classic Eats, we blend innovation and tradition to bring you 
                a diverse menu that delights the senses. Indulge in our expertly crafted dishes in a warm and inviting atmosphere, 
                perfect for any occasion. Discover the art of flavor with us today!"
            </p>
        </div>
    </div>

    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-4 p-4 sm:p-6 md:p-10">
        @foreach (['Appetizers', 'Soups', 'Main Courses', 'Desserts', 'Beverages'] as $category)
            <a href="#" class="relative bg-white shadow-lg rounded-2xl overflow-hidden transform hover:scale-105 transition duration-300 w-full h-36 sm:h-48 md:h-56 lg:h-64">
                <img src="{{ asset('assets/image/logo_2.png') }}" alt="{{ $category }}" class="w-full h-full object-cover">
                <div class="absolute inset-0 bg-black bg-opacity-55 flex items-center justify-center">
                    <h1 class="text-white text-xs sm:text-sm md:text-lg font-bold">{{ $category }}</h1>
                </div>
            </a>
        @endforeach
    </div>

    <div class="px-10 sm:px-14 md:px-20 py-10">
        <div class="flex flex-col lg:flex-row items-center bg-white dark:bg-stone-800 rounded-2xl shadow-md overflow-hidden">
            <img class="rounded-2xl w-full h-56 lg:w-1/2 lg:h-auto object-cover" src="{{ asset('./storage/home_images/restaurant.jpg') }}" alt="Restaurant">
            <div class="p-5 lg:p-10 text-black dark:text-white">
                <h1 id="aboutus" class="text-lg sm:text-xl md:text-2xl lg:text-3xl font-bold mb-4">About Us</h1>
                <p class="text-sm sm:text-base md:text-lg leading-relaxed">
                    Welcome to Classic Eats, where we offer a unique dining experience. Our mission is to provide delicious, 
                    high-quality food in a warm and welcoming environment. Whether you're here for a casual meal or a special occasion, 
                    we strive to make every visit memorable. Our menu features a diverse selection of dishes made with the freshest ingredients, 
                    and our friendly staff is dedicated to providing excellent service.<br><br> 
                    We take pride in being a part of the community and are committed to sustainability and responsible sourcing. 
                    Join us and experience the passion and care that go into every dish we serve.
                </p>
            </div>
        </div>
    </div>
</x-app-layout>
