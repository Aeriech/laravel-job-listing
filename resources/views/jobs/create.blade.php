<x-layout>
    <x-slot:heading>
        <h1 class="text-5xl font-extrabold mb-10 text-center text-blue-800 animate-fade-in">Create Your Dream Job
            Listing</h1>
    </x-slot:heading>

    <form method="POST" action="/jobs" enctype="multipart/form-data"
        class="max-w-4xl mx-auto bg-white p-12 rounded-2xl shadow-2xl border border-gray-100 transform transition-all duration-300">
        @csrf

        <div class="grid md:grid-cols-2 gap-10">
            <div class="mb-8 group">
                <x-field-label for="company">Company Name</x-field-label>
                <x-field-input type="text" name="company" value="{{old('company')}}"
                    placeholder="Enter your company name" required />
                <x-field-error name="company" />
            </div>

            <div class="mb-8 group relative">
                <x-field-label for="employers">Search Employers</x-field-label>
                <x-field-input type="text" id="employerSearch" placeholder="Search employers..." required />
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

                    @if(old('employer_id'))
                        const initialEmployer = employers.find(e => e.id === "{{ old('employer_id') }}");
                        if (initialEmployer) {
                            searchInput.value = initialEmployer.name;
                            selectedEmployer.value = initialEmployer.id;
                        }
                    @endif
                </script>
                <x-field-error name="employer_id" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="title">Job Title</x-field-label>
                <x-field-input type="text" name="title" value="{{old('title')}}" placeholder="Enter job title"
                    required />
                <x-field-error name="title" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="salary">Salary Range</x-field-label>
                <x-field-input type="text" name="salary" value="{{old('salary')}}" pattern="[0-9-]+"
                    oninput="this.value = this.value.replace(/[^0-9-]/g, '')"
                    placeholder="Example: 50000, 60000, 80000, etc" required />
                <x-field-error name="salary" />

            </div>

            <div class="mb-8 group">
                <x-field-label for="location">Job Location</x-field-label>
                <x-field-input type="text" name="location" value="{{old('location')}}"
                    placeholder="City, State or Remote" required />
                <x-field-error name="location" />
            </div>

            <div class="mb-8 group">
                <x-field-label for="email">Contact Email</x-field-label>
                <x-field-input type="email" name="email" value="{{old('email')}}" placeholder="your@email.com"
                    required />
                <x-field-error name="email" />
            </div>
        </div>

        <div class="mb-8 group">
            <x-field-label for="description">Job Description</x-field-label>
            <textarea
                class="border-2 border-gray-200 rounded-xl p-4 w-full focus:outline-none focus:ring-4 focus:ring-blue-400 focus:border-transparent transition-all duration-300 hover:border-blue-300 bg-gray-50"
                name="description" rows="10"
                placeholder="Include key responsibilities, requirements, benefits, etc">{{old('description')}}</textarea>
            <x-field-error name="decription" />
        </div>

        <div class="flex gap-4 mt-4">
            <button type="submit"
                class="bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-xl px-6 py-4 hover:from-blue-600 hover:to-blue-700 transition-all duration-300 w-full shadow-lg hover:shadow-blue-200 transform hover:-translate-y-1 font-semibold">
                <i class="fas fa-plus-circle mr-2"></i>Post Job
            </button>

            <a href="{{ url()->previous() }}"
                class="bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-xl px-6 py-4 hover:from-gray-600 hover:to-gray-700 transition-all duration-300 w-full text-center shadow-lg hover:shadow-gray-200 transform hover:-translate-y-1 font-semibold">
                <i class="fas fa-times-circle mr-2"></i>Cancel
            </a>
        </div>
    </form>
</x-layout>