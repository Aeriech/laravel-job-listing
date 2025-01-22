@props(['active' => false])

<a class="{{ $active ? 'bg-indigo-600 text-white shadow-lg' : 'text-gray-300 hover:bg-indigo-500 hover:text-white hover:shadow-md' }}
    rounded-lg px-4 py-2 text-sm font-semibold transition duration-200 ease-in-out" 
    aria-current="{{ $active ? 'page' : 'false' }}" 
    {{ $attributes }}>
    {{ $slot }}
</a>
