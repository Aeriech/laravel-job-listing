<x-layout>
    <x-slot:heading>
        Job Details
    </x-slot:heading>

    <div
        class="job-card bg-white shadow-lg rounded-lg p-8 mb-6 border border-gray-200 hover:shadow-xl transition duration-300">
        <div class="mb-6">
            <h2 class="font-bold text-3xl mb-3 text-blue-600">{{$job['title']}}</h2>
            <p class="text-lg text-gray-600 font-medium">{{$job['company']}}</p>
        </div>

        <div class="grid grid-cols-2 gap-4 mb-6">
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-gray-700">{{$job['location']}}</span>
            </div>
            <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-500 mr-2" viewBox="0 0 20 20"
                    fill="currentColor">
                    <path
                        d="M8.433 7.418c.155-.103.346-.196.567-.267v1.698a2.305 2.305 0 01-.567-.267C8.07 8.34 8 8.114 8 8c0-.114.07-.34.433-.582zM11 12.849v-1.698c.22.071.412.164.567.267.364.243.433.468.433.582 0 .114-.07.34-.433.582a2.305 2.305 0 01-.567.267z" />
                    <path fill-rule="evenodd"
                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-13a1 1 0 10-2 0v.092a4.535 4.535 0 00-1.676.662C6.602 6.234 6 7.009 6 8c0 .99.602 1.765 1.324 2.246.48.32 1.054.545 1.676.662v1.941c-.391-.127-.68-.317-.843-.504a1 1 0 10-1.51 1.31c.562.649 1.413 1.076 2.353 1.253V15a1 1 0 102 0v-.092a4.535 4.535 0 001.676-.662C13.398 13.766 14 12.991 14 12c0-.99-.602-1.765-1.324-2.246A4.535 4.535 0 0011 9.092V7.151c.391.127.68.317.843.504a1 1 0 101.511-1.31c-.563-.649-1.413-1.076-2.354-1.253V5z"
                        clip-rule="evenodd" />
                </svg>
                <span class="text-gray-700 font-semibold">{{$job['salary']}}</span>
            </div>
        </div>

        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-2 text-gray-800">Description</h3>
            <p class="text-gray-600 leading-relaxed">{{$job['description']}}</p>
        </div>

        <div class="border-t border-gray-200 pt-6">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-gray-600"><span class="font-semibold">Contact:</span> {{$employer['name']}}</p>
                    <p class="text-gray-600"><span class="font-semibold">Email:</span> {{$job['email']}}</p>
                </div>
                <div class="flex gap-4">
                    <a href="/jobs/{{$job['id']}}/edit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                        Edit
                    </a>                    <button class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition duration-300">
                        Apply Now
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-layout>
