<x-layout>
    <x-slot:heading>
        <h1 class="text-5xl font-extrabold mb-10 text-center text-blue-800 animate-fade-in">Register</h1>
    </x-slot:heading>

    <form method="POST" action="/register" enctype="multipart/form-data"
        class="max-w-4xl mx-auto bg-white p-12 rounded-2xl shadow-2xl border border-gray-100 transform transition-all duration-300">
        @csrf

        <div class="grid md:grid-cols-1 gap-10">
            <div class="mb-8 group">
                <x-field-label for="first_name">First Name</x-field-label>
                <x-field-input type="text" name="first_name" value="{{old('first_name')}}"
                    placeholder="Enter your first name" required />
                <x-field-error name="first_name" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="last_name">Last Name</x-field-label>
                <x-field-input type="text" name="last_name" value="{{old('last_name')}}" placeholder="Enter your last name"
                    required />
                <x-field-error name="last_name" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="email">Email</x-field-label>
                <x-field-input type="email" name="email" value="{{old('email')}}" placeholder="your@email.com"
                    required />
                <x-field-error name="email" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="password">Password</x-field-label>
                <x-field-input type="password" name="password" placeholder="your password"
                    required />
                <x-field-error name="password" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="password_confirmation">Confirm Password</x-field-label>
                <x-field-input type="password" name="password_confirmation" placeholder="confirm your password"
                    required />
                <x-field-error name="password_confirmation" />
            </div>
        </div>

        <div class="flex gap-4 mt-4">
            <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl px-6 py-4 hover:from-blue-600 hover:to-blue-700 transition-all duration-300 w-full shadow-lg hover:shadow-blue-200 transform hover:-translate-y-1 font-semibold">
                <i class="fas fa-plus-circle mr-2"></i>Register
            </button>

            <a href="{{ url()->previous() }}"
                class="bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-xl px-6 py-4 hover:from-gray-600 hover:to-gray-700 transition-all duration-300 w-full text-center shadow-lg hover:shadow-gray-200 transform hover:-translate-y-1 font-semibold">
                <i class="fas fa-times-circle mr-2"></i>Cancel
            </a>
        </div>
    </form>
</x-layout>