<x-layout>
    <x-slot:heading>
    <div class="flex flex-col space-y-4">
        <div class="flex justify-between items-center bg-gradient-to-r from-blue-100 to-indigo-100 p-4 rounded-lg shadow">
            <div>
                <h1 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-blue-700 to-indigo-700">Jobs Listing</h1>
                <p class="text-sm text-gray-600">Find Your Next Career Move</p>
            </div>

            <a href="/jobs/create" class="flex items-center px-4 py-2 bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white text-sm rounded-md shadow transition hover:-translate-y-0.5">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Create Job
            </a>
        </div>

        <form action="/jobs" method="GET">
            <div class="relative">
                <input type="text" name="search" 
                    placeholder="Search jobs..."
                    class="w-full pl-10 pr-24 py-2 bg-white border border-gray-200 rounded-lg focus:ring-2 focus:ring-blue-100 focus:border-blue-400 text-sm"
                    value="{{ request('search') }}">
                <span class="absolute left-3 top-1/2 -translate-y-1/2">
                    <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded transition">
                    Search
                </button>
            </div>
        </form>
    </div>
</x-slot:heading>    <div class="p-6">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow-lg">
                <thead>
                    <tr class="bg-gradient-to-r from-blue-500 to-blue-600 text-white uppercase text-sm leading-normal">
                        <th class="py-4 px-6 text-left font-semibold">Title</th>
                        <th class="py-4 px-6 text-left font-semibold">Description</th>
                        <th class="py-4 px-6 text-left font-semibold">Company</th>
                        <th class="py-4 px-6 text-left font-semibold">Location</th>
                        <th class="py-4 px-6 text-left font-semibold">Salary</th>
                        <th class="py-4 px-6 text-left font-semibold">Employer</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 text-sm">
                    @foreach ($jobs as $job)
                        <tr onclick="window.location='/jobs/{{$job['id']}}'"
                            class="border-b border-gray-200 hover:bg-blue-50 cursor-pointer transition duration-150">
                            <td class="py-4 px-6">
                                <span class="font-bold text-blue-600">{{$job['title']}}</span>
                            </td>
                            <td class="py-4 px-6">{{$job['description'] ?? 'N/A'}}</td>
                            <td class="py-4 px-6">
                                <span class="font-medium">{{$job['company'] ?? 'N/A'}}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="inline-flex items-center">
                                    <svg class="w-4 h-4 mr-1 text-gray-500" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" />
                                    </svg>
                                    {{$job['location'] ?? 'N/A'}}
                                </span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-medium text-green-600">{{$job['salary'] ?? 'N/A'}}</span>
                            </td>
                            <td class="py-4 px-6">
                                <span class="font-medium">{{$job->employer->name ?? 'N/A'}}</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="p-4">
        {{$jobs->links()}}
    </div>
</x-layout>