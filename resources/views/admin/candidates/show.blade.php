<x-layouts.app>

    <div class="p-6 space-y-6">

        {{-- Header --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <div class="flex items-center justify-between">

                <div>
                    <h2 class="text-2xl font-bold text-gray-800">
                        Candidate Details
                    </h2>

                    <p class="text-sm text-gray-500 mt-1">
                        Complete candidate application information
                    </p>
                </div>

             <div class="flex items-center gap-3">

        <a href="{{ route('admin.candidates.download', $candidate->id) }}"
            class="px-4 py-2 bg-green-100 text-green-700 rounded-lg text-sm font-semibold hover:bg-green-700 hover:text-white transition">

            Download PDF

        </a>

        <a href="{{ route('admin.candidates.index') }}"
            class="px-4 py-2 bg-pink-100 text-pink-700 rounded-lg text-sm font-semibold hover:bg-pink-700 hover:text-white transition">

            Back

        </a>

    </div>

            </div>

        </div>

        {{-- Personal Details --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <h3 class="text-lg font-bold mb-5 text-[#ea2498]">
                Personal Information
            </h3>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">

                <div><strong>Full Name :</strong> {{ $candidate->full_name }}</div>
                <div><strong>Email :</strong> {{ $candidate->email }}</div>

                <div><strong>Mobile :</strong> {{ $candidate->mobile }}</div>
                <div><strong>Phone :</strong> {{ $candidate->phone ?? '-' }}</div>

                <div><strong>Gender :</strong> {{ ucfirst($candidate->gender) }}</div>
                <div><strong>Marital Status :</strong> {{ ucfirst($candidate->marital_status) }}</div>

                <div><strong>Date of Birth :</strong> {{ $candidate->dob }}</div>
                <div><strong>Age :</strong> {{ $candidate->age }}</div>

                <div><strong>Position Applied :</strong> {{ $candidate->position_applied }}</div>
                <div><strong>Source :</strong> {{ $candidate->source }}</div>

                <div><strong>Current Gross :</strong> ₹{{ $candidate->current_gross }}</div>
                <div><strong>Expected Gross :</strong> ₹{{ $candidate->expected_gross }}</div>

                <div><strong>Experience :</strong> {{ $candidate->experience }} Years</div>
                <div><strong>Notice Period :</strong> {{ $candidate->notice_period }}</div>

                <div><strong>Joining Date :</strong> {{ $candidate->joining_date }}</div>
                <div><strong>Sunday Work :</strong> {{ $candidate->sunday_work }}</div>

                <div><strong>Litigation :</strong> {{ $candidate->litigation }}</div>
                <div><strong>Employee Reference :</strong> {{ $candidate->employee_reference }}</div>

                <div class="md:col-span-2">
                    <strong>Address :</strong>
                    {{ $candidate->contact_address }}
                </div>

                <div><strong>Pin Code :</strong> {{ $candidate->pin_code }}</div>

                <div><strong>Certifications :</strong> {{ $candidate->certifications }}</div>

            </div>

        </div>

        {{-- Education --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <h3 class="text-lg font-bold mb-5 text-[#ea2498]">
                Education Details
            </h3>

            <div class="overflow-x-auto">

                <table class="w-full text-sm border-collapse">

                    <thead>

                        <tr class="bg-[#ea2498] text-white">

                            <th class="p-3 text-left">Degree</th>
                            <th class="p-3 text-left">College</th>
                            <th class="p-3 text-left">University</th>
                            <th class="p-3 text-left">Marks</th>
                            <th class="p-3 text-left">Year</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($candidate->educations as $education)

                            <tr class="border-b">

                                <td class="p-3">{{ $education->degree }}</td>
                                <td class="p-3">{{ $education->college }}</td>
                                <td class="p-3">{{ $education->university }}</td>
                                <td class="p-3">{{ $education->marks }}</td>
                                <td class="p-3">{{ $education->year }}</td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Experience --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <h3 class="text-lg font-bold mb-5 text-[#ea2498]">
                Experience Details
            </h3>

            @foreach($candidate->experiences as $experience)

                <div class="border rounded-xl p-4 mb-4">

                    <div class="grid grid-cols-2 gap-4 text-sm">

                        <div>
                            <strong>Organization :</strong>
                            {{ $experience->organization }}
                        </div>

                        <div>
                            <strong>Designation :</strong>
                            {{ $experience->designation }}
                        </div>

                        <div>
                            <strong>From :</strong>
                            {{ $experience->from_date }}
                        </div>

                        <div>
                            <strong>To :</strong>
                            {{ $experience->to_date }}
                        </div>

                        <div>
                            <strong>Gross Salary :</strong>
                            ₹{{ $experience->gross_salary }}
                        </div>

                        <div>
                            <strong>Annual CTC :</strong>
                            ₹{{ $experience->annual_ctc }}
                        </div>

                        <div class="col-span-2">
                            <strong>Reason For Leaving :</strong>
                            {{ $experience->reason_for_leaving }}
                        </div>

                    </div>

                </div>

            @endforeach

        </div>

        {{-- Languages --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <h3 class="text-lg font-bold mb-5 text-[#ea2498]">
                Languages Known
            </h3>

            <div class="overflow-x-auto">

                <table class="w-full text-sm">

                    <thead>

                        <tr class="bg-[#ea2498] text-white">

                            <th class="p-3 text-left">Language</th>
                            <th class="p-3">Read</th>
                            <th class="p-3">Write</th>
                            <th class="p-3">Speak</th>
                            <th class="p-3">Understand</th>

                        </tr>

                    </thead>

                    <tbody>

                        @foreach($candidate->languages as $language)

                            <tr class="border-b">

                                <td class="p-3">
                                    {{ $language->language }}
                                </td>

                                <td class="p-3 text-center">
                                    {{ $language->can_read ? 'Yes' : 'No' }}
                                </td>

                                <td class="p-3 text-center">
                                    {{ $language->can_write ? 'Yes' : 'No' }}
                                </td>

                                <td class="p-3 text-center">
                                    {{ $language->can_speak ? 'Yes' : 'No' }}
                                </td>

                                <td class="p-3 text-center">
                                    {{ $language->can_understand ? 'Yes' : 'No' }}
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

        {{-- Family --}}
        <div class="bg-white rounded-2xl shadow p-6">

            <h3 class="text-lg font-bold mb-5 text-[#ea2498]">
                Family Details
            </h3>

            @foreach($candidate->families as $family)

                <div class="border rounded-xl p-4 mb-4">

                    <div class="grid grid-cols-2 gap-4 text-sm">

                        <div><strong>Name :</strong> {{ $family->name }}</div>
                        <div><strong>Age :</strong> {{ $family->age }}</div>

                        <div><strong>Relationship :</strong> {{ $family->relationship }}</div>
                        <div><strong>Occupation :</strong> {{ $family->occupation }}</div>

                        <div><strong>Dependent :</strong> {{ $family->dependent }}</div>
                        <div><strong>Contact :</strong> {{ $family->contact }}</div>

                    </div>

                </div>

            @endforeach

        </div>

        <div class="bg-white rounded-2xl shadow p-6">

    <h3 class="text-lg font-bold mb-5 text-[#ea2498]">
        Reference Details
    </h3>

    @forelse($candidate->references as $reference)

        <div class="border rounded-xl p-4 mb-4">

            <div class="grid grid-cols-2 gap-4 text-sm">

                <div>
                    <strong>Name :</strong>
                    {{ $reference->name }}
                </div>

                <div>
                    <strong>Designation :</strong>
                    {{ $reference->designation }}
                </div>

                <div>
                    <strong>Mobile :</strong>
                    {{ $reference->mobile }}
                </div>

                <div>
                    <strong>Phone :</strong>
                    {{ $reference->phone }}
                </div>

            </div>

        </div>

    @empty

        <div class="text-gray-500 text-sm">
            No Reference Details Found
        </div>

    @endforelse

</div>

{{-- Friend References --}}
<div class="bg-white rounded-2xl shadow p-6">

    <h3 class="text-lg font-bold mb-5 text-[#ea2498]">
        Friend References
    </h3>

    @forelse($candidate->friendReferences as $friend)

        <div class="border rounded-xl p-4 mb-4">

            <div class="grid grid-cols-2 gap-4 text-sm">

                <div>
                    <strong>Name :</strong>
                    {{ $friend->name }}
                </div>

                <div>
                    <strong>Relationship :</strong>
                    {{ $friend->relationship }}
                </div>

                <div>
                    <strong>Mobile :</strong>
                    {{ $friend->mobile }}
                </div>

                <div>
                    <strong>Phone :</strong>
                    {{ $friend->phone }}
                </div>

            </div>

        </div>

    @empty

        <div class="text-gray-500 text-sm">
            No Friend Reference Details Found
        </div>

    @endforelse

</div>

    </div>

</x-layouts.app>
