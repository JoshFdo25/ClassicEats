<x-app-layout>
    <!-- Hero Section -->
    <div class="relative bg-cover bg-center h-64 sm:h-72 md:h-[50vh] lg:h-[60vh] rounded-bl-xl rounded-br-xl overflow-hidden"
         style="background-image: url('{{ asset('./storage/home_images/contact-banner-image.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-55 flex items-center justify-center">
            <div class="text-center text-white px-4">
                <h1 class="text-base sm:text-2xl md:text-4xl font-bold mb-2 font-playwrite-cu">
                    Get in Touch with Us
                </h1>
                <p class="text-xs sm:text-sm md:text-lg">
                    "We’re here to make your Classic Eats experience even better!"
                </p>
            </div>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="p-4 sm:p-6 md:p-10">
        <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-md p-5 lg:px-20 lg:py-10">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Contact Details -->
                <div class="flex flex-col gap-6">
                    <div class="flex items-center gap-4">
                        <div class="bg-blue-950 rounded-xl p-3 text-white flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base sm:text-lg font-bold text-black dark:text-white">
                                Email Us
                            </h2>
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                                Our friendly team is here to help.
                            </p>
                            <a href="mailto:foodandbeverages@classiceats.com" class="text-blue-600 hover:underline text-sm">
                                foodandbeverages@classiceats.com
                            </a>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="bg-blue-950 rounded-xl p-3 text-white flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base sm:text-lg font-bold text-black dark:text-white">
                                Visit Us
                            </h2>
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                                76/5 New Moor Street, Colombo 12
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        <div class="bg-blue-950 rounded-xl p-3 text-white flex-shrink-0">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" 
                                 stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-base sm:text-lg font-bold text-black dark:text-white">
                                Call Us
                            </h2>
                            <p class="text-xs sm:text-sm text-gray-600 dark:text-gray-300">
                                +1123-456-7890
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Map Section -->
                <div>
                    <iframe 
                        class="rounded-xl w-full h-64 sm:h-72 md:h-full shadow-md"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.591078167282!2d79.85318591041502!3d6.939376693031697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2591e477f2d19%3A0x989c70a85f646288!2s76%2C%205%20New%20Moor%20St%2C%20Colombo!5e0!3m2!1sen!2slk!4v1726340503987!5m2!1sen!2slk"
                        frameborder="0"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form Section -->
    <div class="p-4 sm:p-6 md:p-10">
        <div class="bg-white dark:bg-stone-800 rounded-2xl shadow-md p-5 lg:px-20 lg:py-10">
            <h2 class="text-base sm:text-lg md:text-xl font-bold text-center text-black dark:text-white mb-6">
                Send Us a Message
            </h2>
            <form action="{{ route('contact.submit') }}" method="POST" class="space-y-4">
                @csrf
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Name</label>
                        <input type="text" id="name" name="name" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-white" 
                               placeholder="Your Name" required>
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                        <input type="email" id="email" name="email" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-white" 
                               placeholder="Your Email" required>
                    </div>
                </div>
                <div>
                    <label for="message" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Message</label>
                    <textarea id="message" name="message" rows="4" 
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-stone-700 dark:border-stone-600 dark:text-white" 
                              placeholder="Your Message" required></textarea>
                </div>
                <div class="flex justify-center">
                    <button type="submit" 
                            class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-md shadow-sm">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
