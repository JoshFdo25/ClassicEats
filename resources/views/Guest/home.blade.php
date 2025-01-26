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

    <!-- Horizontally Scrollable Categories -->
    <div class="relative px-4 sm:px-6 md:px-10 py-6">
        <h2 class="text-center text-lg sm:text-xl md:text-2xl font-bold text-black dark:text-white mb-4">Categories</h2>
        <div class="relative max-w-5xl justify-center mx-auto overflow-hidden">
            <!-- Fading effect on the left -->
            <div class="absolute inset-y-0 left-0 w-12 bg-gradient-to-r from-white dark:from-stone-900 to-transparent z-10 pointer-events-none"></div>

            <!-- Scrollable container -->
            <div id="scrolling-container" class="flex gap-4 justify-center overflow-hidden whitespace-nowrap px-4 py-2">
                @foreach ($categories as $category)
                    <div class="relative flex-shrink-0 w-48 bg-white dark:bg-stone-800 shadow-lg rounded-xl p-4 hover:shadow-xl transition transform hover:scale-105">
                        <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name }}"
                        class="w-full h-32 object-cover rounded-lg">
                        <h3 class="text-sm sm:text-base md:text-lg font-bold text-black dark:text-white mt-2 text-center">
                            {{ $category->name }}
                        </h3>
                    </div>
                @endforeach
            </div>
            <div class="absolute inset-y-0 right-0 w-12 bg-gradient-to-l from-white dark:from-stone-900 to-transparent z-10 pointer-events-none"></div>
        </div>
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
    <script>
        const container = document.getElementById('scrolling-container');
        const scrollSpeed = 1;

        function loopScroll() {
            container.scrollLeft += scrollSpeed;
            if (container.scrollLeft >= container.scrollWidth - container.clientWidth) {
                container.scrollLeft = 0;
            }
        }

        // Clone elements for seamless scrolling
        const cloneContent = () => {
            const items = Array.from(container.children);
            items.forEach(item => {
                const clone = item.cloneNode(true);
                container.appendChild(clone);
            });
        };

        // Start scrolling
        cloneContent();
        setInterval(loopScroll, 20);
    </script>
</x-app-layout>
