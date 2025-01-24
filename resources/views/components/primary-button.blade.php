<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center text-white bg-[#002199] hover:bg-[#001979] rounded-md text-md px-2 py-1
    shadow-md hover:shadow-sm transition-all duration-300']) }}>
    {{ $slot }}
</button>
