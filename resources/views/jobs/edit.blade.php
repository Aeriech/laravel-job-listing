<x-layout>
    <x-slot:heading>
        <h1 class="text-5xl font-extrabold mb-10 text-center text-blue-800 animate-fade-in">Edit Job Listing</h1>
    </x-slot:heading>

    <form method="POST" action="/jobs/{{$job->id}}" enctype="multipart/form-data"
        class="max-w-4xl mx-auto bg-white p-12 rounded-2xl shadow-2xl border border-gray-100 transform transition-all duration-300">
        @csrf
        @method('PATCH')

        <div class="grid md:grid-cols-2 gap-10">
            <div class="mb-8 group">
                <label for="company"
                    class="block text-gray-800 text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors">
                    <i class="fas fa-building mr-2 text-blue-500"></i>Company Name
                </label>
                <input type="text" required
                    class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                    name="company" value="{{$job->company}}" placeholder="Enter your company name" />
                @error('company')
                    <p class="text-red-500 text-sm mt-2 animate-pulse">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-8 group relative">
                <label for="employers"
                    class="block text-gray-800 text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors">
                    <i class="fas fa-search mr-2 text-blue-500"></i>Search Employers
                </label>
                <input type="text" id="employerSearch"
                    class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                    placeholder="Search employers..." value="{{$job->employer->name}}" required>
                <input type="hidden" name="employer_id" id="selectedEmployer">
                <div id="employersList"
                    class="hidden absolute bg-white border-2 border-gray-200 rounded-xl w-full mt-1 max-h-60 overflow-y-auto z-50 shadow-xl">
                </div>
                <script>
                    const employers = [
                        @foreach($employers as $employer)
                            { id: "{{ $employer->id }}", name: "{{ $employer->name }}" },
                        @endforeach
                    ];

                    const searchInput = document.getElementById('employerSearch');
                    const employersList = document.getElementById('employersList');
                    const selectedEmployer = document.getElementById('selectedEmployer');

                    searchInput.addEventListener('input', function () {
                        const input = this.value.toLowerCase();
                        employersList.innerHTML = '';
                        employersList.classList.remove('hidden');

                        const filteredEmployers = employers.filter(employer =>
                            employer.name.toLowerCase().includes(input)
                        );

                        filteredEmployers.forEach(employer => {
                            const div = document.createElement('div');
                            div.className = 'p-4 hover:bg-blue-50 cursor-pointer transition-colors duration-200';
                            div.textContent = employer.name;
                            div.onclick = function () {
                                searchInput.value = employer.name;
                                selectedEmployer.value = employer.id;
                                employersList.classList.add('hidden');
                            };
                            employersList.appendChild(div);
                        });

                        if (filteredEmployers.length === 0) {
                            employersList.classList.add('hidden');
                        }
                    });

                    document.addEventListener('click', function (e) {
                        if (!searchInput.contains(e.target) && !employersList.contains(e.target)) {
                            employersList.classList.add('hidden');
                        }
                    });

                    @if($job->employer_id)
                        const initialEmployer = employers.find(e => e.id === "{{ $job->employer_id }}");
                        if (initialEmployer) {
                            searchInput.value = initialEmployer.name;
                            selectedEmployer.value = initialEmployer.id;
                        }
                    @endif
                </script>
                @error('employer_id')
                    <p class="text-red-500 text-sm mt-2 animate-pulse">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-8 group">
                <label for="title"
                    class="block text-gray-800 text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors">
                    <i class="fas fa-briefcase mr-2 text-blue-500"></i>Job Title
                </label>
                <input type="text"
                    class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                    name="title" value="{{$job->title}}" placeholder="Enter job title" required />
                @error('title')
                    <p class="text-red-500 text-sm mt-2 animate-pulse">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-8 group">
                <label for="salary"
                    class="block text-gray-800 text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors">
                    <i class="fas fa-money-bill-wave mr-2 text-blue-500"></i>Salary Range
                </label>
                <input type="text"
                    class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                    name="salary" pattern="[0-9-]+" oninput="this.value = this.value.replace(/[^0-9-]/g, '')"
                    placeholder="Example: 50000, 60000-80000, etc" value="{{$job->salary}}" required />
                @error('salary')
                    <p class="text-red-500 text-sm mt-2 animate-pulse">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-8 group">
                <label for="location"
                    class="block text-gray-800 text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors">
                    <i class="fas fa-map-marker-alt mr-2 text-blue-500"></i>Job Location
                </label>
                <input type="text"
                    class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                    name="location" value="{{$job->location}}" placeholder="City, State or Remote" required />
                @error('location')
                    <p class="text-red-500 text-sm mt-2 animate-pulse">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-8 group">
                <label for="email"
                    class="block text-gray-800 text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors">
                    <i class="fas fa-envelope mr-2 text-blue-500"></i>Contact Email
                </label>
                <input type="email"
                    class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                    name="email" value="{{$job->email}}" placeholder="your@email.com" required />
                @error('email')
                    <p class="text-red-500 text-sm mt-2 animate-pulse">{{$message}}</p>
                @enderror
            </div>
        </div>

        <div class="mb-8 group">
            <label for="description"
                class="block text-gray-800 text-lg font-bold mb-3 group-hover:text-blue-600 transition-colors">
                <i class="fas fa-file-alt mr-2 text-blue-500"></i>Job Description
            </label>
            <textarea
                class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                name="description" rows="10"
                placeholder="Include key responsibilities, requirements, benefits, etc">{{$job->description ?? ''}}</textarea>
            @error('decription')
                <p class="text-red-500 text-sm mt-2 animate-pulse">{{$message}}</p>
            @enderror
        </div>

        <div class="flex gap-4 mt-8">
            <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl px-6 py-4 hover:from-blue-600 hover:to-blue-700 transition-all duration-300 w-full shadow-lg hover:shadow-blue-200 transform hover:-translate-y-1 font-semibold">
                <i class="fas fa-paper-plane mr-2 animate-pulse"></i>Update Job
            </button>

            <button form="deleteJobForm"
                class="bg-gradient-to-r from-red-500 to-red-600 text-white rounded-xl px-6 py-4 hover:from-red-600 hover:to-red-700 transition-all duration-300 w-full text-center shadow-lg hover:shadow-red-200 transform hover:-translate-y-1 font-semibold">
                <i class="fas fa-trash-alt mr-2"></i>Delete Job
            </button>

            <a href="{{ url()->previous() }}"
                class="bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-xl px-6 py-4 hover:from-gray-600 hover:to-gray-700 transition-all duration-300 w-full text-center shadow-lg hover:shadow-gray-200 transform hover:-translate-y-1 font-semibold">
                <i class="fas fa-arrow-left mr-2"></i>Go Back
            </a>
        </div>
    </form>

    <form method="POST" action="/jobs/{{$job->id}}" class="hidden" id="deleteJobForm">
        @csrf
        @method('DELETE')
    </form>

</x-layout>