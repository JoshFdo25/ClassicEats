<footer class="bg-gradient-to-r from-[#002387] to-[#001147] text-white py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div>
                <h3 class="text-lg font-bold mb-2">About
                <span class="text-lg font-playwrite-cu font-extrabold text-white">ClassicEats</span>
                </h3>
                <p class="text-sm leading-relaxed">
                    Classic Eats blends tradition and innovation to deliver culinary excellence. Enjoy a warm atmosphere and expertly crafted dishes for any occasion.
                </p>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-2">Quick Links</h3>
                <ul class="space-y-1">
                    <li><a href="{{ route('home') }}" class="hover:text-gray-400">Home</a></li>
                    <li><a href="{{ route('products.index') }}" class="hover:text-gray-400">Products</a></li>
                    <li><a href="{{ route('contact-us') }}" class="hover:text-gray-400">Contact Us</a></li>
                    @if (Auth::check())
                        <li><a href="{{ route('profile.edit') }}" class="hover:text-gray-400">Profile</a></li>
                    @else
                        <li><a href="{{ route('login') }}" class="hover:text-gray-400">Login</a></li>
                    @endif
                </ul>
            </div>

            <div>
                <h3 class="text-lg font-bold mb-2">Contact Us</h3>
                <p class="text-sm leading-relaxed">
                    Address: 76/5 New Moor Street, Colombo 12<br>
                    Phone: (123) 456-7890<br>
                    Email: <a href="mailto:info@classiceats.com" class="hover:text-gray-400">info@classiceats.com</a>
                </p>
                <div class="flex space-x-3 mt-4">
                    <a href="https://web.facebook.com/login/?_rdc=1&_rdr&wtsid=rdr_0J0tNHUIofqr05wvA" target="_blank" class="hover:bg-white text-white hover:text-black p-1 duration-400 transition-all rounded-full">
                        <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 24 24">
                            <path fill-rule="evenodd" d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="https://www.instagram.com/accounts/login/" target="_blank" class="hover:bg-white text-white hover:text-black p-1 duration-400 transition-all rounded-full">
                        <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z" clip-rule="evenodd"/>
                        </svg>
                    </a>
                    <a href="https://web.whatsapp.com" target="_blank" class="hover:bg-white text-white hover:text-black p-1 duration-400 transition-all rounded-full">
                        <svg class="size-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path fill="currentColor" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z" clip-rule="evenodd"/>
                            <path fill="currentColor" d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div class="mt-6 border-t border-gray-600 pt-4 text-center text-sm">
            &copy; {{ now()->year }} Classic Eats. All rights reserved.
        </div>
    </div>
</footer>