<x-layouts.app>

    <div class="p-4">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">

            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    Candidate Applications
                </h2>
            </div>

        </div>

        {{-- Table --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">

            <table class="w-full text-sm text-left text-gray-700 border-collapse">

                <thead>

                    <tr class="bg-[#ea2498] text-white text-sm uppercase tracking-wider">

                        <th class="px-4 py-3">
                            ID
                        </th>
                        <th class="px-4 py-3">
                            Company Name
                        </th>
                        <th class="px-4 py-3">
                            Candidate Name
                        </th>
                        <th class="px-4 py-3">
                            Position
                        </th>
                        <th class="px-4 py-3">
                            Mobile
                        </th>
                        <th class="px-4 py-3">
                            Email
                        </th>
                        <th class="px-4 py-3">
                            Experience
                        </th>
                        <th class="px-4 py-3">
                            Applied Date
                        </th>
                        <th class="px-4 py-3 text-center">
                            Action
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-gray-200">

                    @forelse ($candidates as $candidate)

                        <tr class="hover:bg-gray-50 transition-colors">

                            <td class="px-4 py-3 font-medium">
                                {{ $candidate->id }}
                            </td>
                            <td class="px-4 py-3">
                               {{ $candidate->jobPost->company->name ?? '-' }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $candidate->full_name }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $candidate->position_applied }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $candidate->mobile }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $candidate->email }}
                            </td>
                            <td class="px-4 py-3">
                                {{ $candidate->experience }} Years
                            </td>
                            <td class="px-4 py-3">
                                {{ \Carbon\Carbon::parse($candidate->date)->format('d M Y') }}
                            </td>
                            <td class="px-4 py-3 text-center">
                                <a href="{{ route('admin.candidates.show', $candidate->id) }}"
                                    class="inline-block px-4 py-2 rounded-lg text-xs font-semibold bg-indigo-50 text-indigo-700 hover:bg-indigo-700 hover:text-white transition-colors duration-150">
                                    View Details
                                </a>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="8" class="px-4 py-6 text-center text-gray-500">

                                No Candidate Applications Found

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

        {{-- Pagination --}}
        <div class="mt-4">
            {{ $candidates->links() }}
        </div>

    </div>

</x-layouts.app>
