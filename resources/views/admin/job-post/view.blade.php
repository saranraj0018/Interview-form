<x-layouts.app>

    <div class="p-4">

        <div class="flex justify-between mb-4">

            <h2 class="text-xl font-bold">
                Job Posts
            </h2>

            <button id="createJobPostBtn" class="bg-[#ea2498] text-white px-4 py-2 rounded">

                Create

            </button>

        </div>

        <div class="overflow-x-auto bg-white rounded-xl shadow-md">

            <table class="w-full text-sm text-left text-gray-700 border-collapse">

                <thead>

                    <tr class="bg-[#ea2498] text-white text-sm uppercase tracking-wider">

                        <th class="px-3 py-2">ID</th>

                        <th class="px-3 py-2">Company</th>
                        <th class="px-3 py-2">Job Title</th>
                        <th class="px-3 py-2">Location</th>
                        <th class="px-3 py-2">Experience</th>
                        <th class="px-3 py-2">Status</th>
                        <th class="px-3 py-2">Created Date</th>
                        <th class="px-3 py-2 text-center">Actions</th>
                    </tr>

                </thead>

                <tbody id="jobPostTableBody" class="divide-y divide-gray-200">

                    @foreach ($jobPosts as $jobPost)
                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3 font-medium text-gray-900">
                                {{ $jobPost->id }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $jobPost->company->name ?? 'N/A' }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $jobPost->job_title }}
                            </td>

                            <td class="px-4 py-3">
                                {{ $jobPost->location }}
                            </td>

                            <td class="px-4 py-3">

                                <span class="px-2 py-1 text-xs rounded bg-pink-100 text-pink-700">

                                    {{ $jobPost->experience }}

                                </span>

                            </td>

                            <td class="px-4 py-3">

                                @if ($jobPost->status == 1)
                                    <span class="px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                                        Active
                                    </span>
                                @else
                                    <span class="px-2 py-1 text-xs rounded bg-red-100 text-red-700">
                                        Inactive
                                    </span>
                                @endif

                            <td class="px-4 py-3">
                                {{ $jobPost->created_at->format('d M Y, h:i A') }}
                            </td>

                            <td class="px-4 py-3 flex justify-center gap-4">

                                <!-- Edit -->

                                <button class="text-blue-600 hover:text-blue-800 transition editJobPostBtn"
                                    data-id="{{ $jobPost->id }}" data-job_title="{{ $jobPost->job_title }}"
                                    data-company_id="{{ $jobPost->company_id }}"
                                    data-location="{{ $jobPost->location }}"
                                    data-role_summary="{{ $jobPost->role_summary }}"
                                    data-key_responsibilities="{{ $jobPost->key_responsibilities }}"
                                    data-skills="{{ $jobPost->skills }}"
                                    data-qualifications="{{ $jobPost->qualifications }}"
                                    data-experience="{{ $jobPost->experience }}"
                                    data-status="{{ $jobPost->status }}">

                                    <i class="fa-solid fa-pen-to-square"></i>

                                </button>

                                <!-- Delete -->

                                <button class="text-red-600 hover:text-red-800 transition btnDeleteJobPost"
                                    data-id="{{ $jobPost->id }}">

                                    <i class="fa-solid fa-delete-left"></i>

                                </button>

                            </td>

                        </tr>
                    @endforeach

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}

        <div class="p-4">

            {{ $jobPosts->links() }}

        </div>

        {{-- Modal --}}

        @include('admin.job-post.modal')

    </div>

</x-layouts.app>

<script src="{{ asset('admin/js/job-post.js') }}"></script>
