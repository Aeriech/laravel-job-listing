<x-layout>
    <x-slot:heading>
        <h1 class="text-6xl font-extrabold mb-12 text-center text-blue-800 animate-fade-in bg-gradient-to-r from-blue-600 to-blue-900 bg-clip-text text-transparent">Welcome Back!</h1>
    </x-slot:heading>

    <form method="POST" action="/login" enctype="multipart/form-data"
        class="max-w-4xl mx-auto bg-white p-14 rounded-3xl shadow-2xl border border-gray-100 transform transition-all duration-300 hover:shadow-blue-100">
        @csrf

        <div class="grid md:grid-cols-1 gap-12">
            <div class="mb-8 group">
                <x-field-label for="email" class="text-lg font-medium text-gray-700">Email</x-field-label>
                <x-field-input type="email" name="email" value="{{old('email')}}" placeholder="your@email.com"
                    class="focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                    required />
                <x-field-error name="email" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="password" class="text-lg font-medium text-gray-700">Password</x-field-label>
                <x-field-input type="password" name="password" placeholder="your password"
                    class="focus:ring-2 focus:ring-blue-500 transition-all duration-300"
                    required />
                <x-field-error name="password" />
            </div>
        </div>

        <div class="flex gap-4 mt-10">
            <button type="submit"
                class="bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 text-white rounded-xl px-8 py-4 hover:from-blue-600 hover:via-blue-700 hover:to-blue-800 transition-all duration-300 w-full shadow-xl hover:shadow-blue-200 transform hover:-translate-y-1 font-bold text-lg">
                <i class="fas fa-sign-in-alt mr-2"></i>Log In
            </button>
        </div>
    </form>
</x-layout>
