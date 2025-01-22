<x-layout>
    <x-slot:heading>
        <div class="flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-800 bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                DashBoard
            </h1>
            <div class="flex gap-6">
                <div class="text-center">
                    <div class="text-2xl font-bold text-blue-600">{{ $totalJobs ?? 0 }}</div>
                    <div class="text-sm text-gray-500">Total Jobs</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-purple-600">{{ $applications ?? 0 }}</div>
                    <div class="text-sm text-gray-500">Applications</div>
                </div>
                <div class="text-center">
                    <div class="text-2xl font-bold text-indigo-600">{{ $savedJobs ?? 0 }}</div>
                    <div class="text-sm text-gray-500">Saved Jobs</div>
                </div>
            </div>
        </div>
    </x-slot:heading>

    <!-- Job Search -->
    <!-- <div class="bg-white rounded-lg shadow mb-8">
        <div class="p-6">
            <form class="flex flex-wrap gap-4">
                <input type="text" placeholder="Job Title or Keywords" class="flex-1 p-2 border rounded">
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Search Jobs
                </button>
            </form>
        </div>
    </div> -->

    <!-- Recent Jobs -->
    <div class="bg-white rounded-lg shadow-lg hover:shadow-xl transition-shadow duration-300 mb-8">
        <div class="p-6 border-b bg-gradient-to-r from-blue-50 to-white">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <svg class="w-6 h-6 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                </svg>
                Recent Jobs
            </h2>
        </div>
        <div class="p-6">
            @forelse($recentJobs ?? [] as $job)
                <div onclick="window.location='/jobs/{{$job['id']}}'"
                 class="border-b last:border-0 pb-4 mb-4 last:mb-0 hover:bg-gray-50 p-4 rounded-lg transition-colors duration-200">
                    <h3 class="text-xl font-semibold text-gray-800 hover:text-blue-600 transition-colors duration-200">{{ $job->title ?? 'Job Title' }}</h3>
                    <p class="text-gray-600 font-medium">{{ $job->company ?? 'Company Name' }}</p>
                    <div class="flex items-center mt-3 text-sm text-gray-500">
                        <span class="mr-4 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            {{ $job['location'] ?? 'Location' }}
                        </span>
                        <span class="mr-4 flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            {{ $job['salary'] ?? 'Salary' }}
                        </span>
                        <span class="flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Posted {{ $job['created_at'] ?? 'date' }}
                        </span>
                    </div>
                </div>
            @empty
                <div class="text-center py-8">
                    <svg class="w-16 h-16 mx-auto text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                    </svg>
                    <p class="text-gray-500 mt-4">No recent jobs found</p>
                </div>
            @endforelse
        </div>
    </div>

    <!-- Job Categories -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        @foreach($categories ?? [] as $category)
            <div class="bg-white p-6 rounded-lg shadow text-center">
                <h3 class="text-lg font-semibold text-gray-800">{{ $category->name ?? 'Category' }}</h3>
                <p class="text-gray-600">{{ $category->jobs_count ?? 0 }} jobs</p>
            </div>
        @endforeach
    </div>
</x-layout>
