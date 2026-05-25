<div id="interviewModal" x-data="{
    open: false,
    candidate_experience: '',
    candidate_position: '',
    candidate_current_salary: '',
    candidate_expected_salary: '',
    form: {
        id: 0,
        position: '',
        department: '',
        candidate_id: '',
        proposed_gross_salary: '',
        proposed_ctc_salary: '',
        interview_date: '',
        institution: '',
        categories: []
    }
}" x-show="open" class="fixed inset-0 flex items-center justify-center z-50"
    style="display:none">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <!-- Modal Box -->
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-[600px] max-w-[95%] relative z-10 overflow-y-auto max-h-[90vh]">

        <h2 class="text-2xl font-bold mb-6 text-gray-800" id="interview_label">
            Add Interview
        </h2>

        <form id="interviewForm" class="grid grid-cols-2 gap-4">

            <input type="hidden" name="id" x-model="form.id">

               <!-- Candidate -->
        <div class="col-span-2">
                <label class="block mb-1">
                    Candidate
                </label>

                <select name="candidate_id" x-model="form.candidate_id"
                    @change="
                candidate_experience = $event.target.selectedOptions[0].dataset.experience;
                candidate_position = $event.target.selectedOptions[0].dataset.position;
                candidate_current_salary = $event.target.selectedOptions[0].dataset.current_salary;
                candidate_expected_salary = $event.target.selectedOptions[0].dataset.expected_salary;
                "
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">

                    <option value="">
                        Select Candidate
                    </option>

                    @foreach ($candidates as $candidate)
                <option value="{{ $candidate->id }}"
                    data-experience="{{ ($candidate->experience == 0 || !$candidate->experience) ? 'Fresher' : $candidate->experience . ' Years' }}"
                    data-position="{{ $candidate->position_applied }}"
                    data-current_salary="{{ $candidate->current_gross }}"
                    data-expected_salary="{{ $candidate->expected_gross }}">

                            {{ $candidate->full_name }}
                            -
                            {{ $candidate->mobile }}

                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Position -->
                    <div>
                <label class="block mb-1">
                    Candidate Position
                </label>

                <input type="text"
                    x-model="candidate_position"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]"
                    readonly>
            </div>

            <!-- Department -->
            <div>
                <label class="block mb-1">Department</label>
                <input type="text" name="department" x-model="form.department" class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">
            </div>

            <div>
                <label class="block mb-1">
                    Experience
                </label>

                <input type="text" id="candidate_experience" x-model="candidate_experience" class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]" readonly>
            </div>

            <div>
                <label class="block mb-1">
                    Current Gross Salary
                </label>

                <input type="text"
                    x-model="candidate_current_salary"
                    class="form-input w-full border border-gray-300 rounded-lg p-2"
                    readonly>
            </div>

            <!-- Expected Gross -->
            <div>
                <label class="block mb-1">
                    Expected Gross Salary
                </label>

                <input type="text"
                    x-model="candidate_expected_salary"
                    class="form-input w-full border border-gray-300 rounded-lg p-2"
                    readonly>
            </div>

            <div>
    <label class="block mb-1">
        Proposed Gross Salary
    </label>

    <input type="text"
        name="proposed_gross_salary"
        x-model="form.proposed_gross_salary"
        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">
</div>

<!-- Proposed CTC Salary -->
<div>
    <label class="block mb-1">
        Proposed CTC Salary
    </label>

    <input type="text"
        name="proposed_ctc_salary"
        x-model="form.proposed_ctc_salary"
        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">
</div>

            <!-- Interview Date -->
            <div>
                <label class="block mb-1">Interview Date</label>
                <input type="date" name="interview_date" x-model="form.interview_date"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">
            </div>

            <!-- Institution -->
            <div>
                <label class="block mb-1">Institution</label>
                <input type="text" name="institution" x-model="form.institution" class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">
            </div>

          <div class="col-span-2">
                <label class="block mb-2 font-medium text-gray-700">Interview BY</label>

                <div class="border rounded-lg p-3 max-h-48 overflow-y-auto bg-white shadow-sm space-y-2">

                    @foreach ($categories as $cat)
                        <label class="flex items-center gap-3 p-2 rounded hover:bg-gray-100 cursor-pointer">

                            <input type="checkbox" value="{{ $cat->id }}" x-model="form.categories"
                                class="w-4 h-4 text-blue-600 border-gray-300 rounded">

                            <span class="text-gray-700 text-sm">

                                {{ $cat->person_name }}
                                -
                                {{ $cat->email }}

                                <span class="text-pink-600 font-semibold">
                                    (Level {{ $cat->level }})
                                </span>

                            </span>

                        </label>
                    @endforeach

                </div>
            </div>

            <!-- Buttons -->
         <div class="col-span-2 flex justify-end gap-3 pt-4">
                <button type="button" @click="open=false" class="px-4 py-2 border rounded">
                    Cancel
                </button>

                <button type="submit" class="bg-[#ea2498] text-white px-4 py-2 rounded">
                    Save
                </button>
            </div>

        </form>
    </div>
</div>


<div id="deleteInterviewModal" x-data="{ open: false, deleteId: null }" x-show="open"
    class="fixed inset-0 flex items-center justify-center z-50" style="display:none">

    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">
        <h2 class="text-lg font-bold mb-4">Confirm Delete</h2>

        <p class="mb-6">Are you sure you want to delete this interview?</p>

        <div class="flex justify-end gap-3">
            <button @click="open=false" class="px-4 py-1 border rounded">Cancel</button>

            <button @click="deleteInterview(deleteId)" class="px-4 py-1 bg-red-600 text-white rounded">
                Delete
            </button>
        </div>
    </div>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const candidateSelect = document.querySelector(
            'select[name="candidate_id"]'
        );

        const experienceInput = document.getElementById(
            'candidate_experience'
        );

        candidateSelect.addEventListener("change", function() {

            const selectedOption =
                this.options[this.selectedIndex];

            const experience =
                selectedOption.getAttribute("data-experience");

            experienceInput.value = experience || '';
        });

        document.querySelectorAll('.editInterviewBtn').forEach(button => {

        button.addEventListener('click', function () {

            // Modal
            const modal = document.getElementById('interviewModal');

            const alpineData = Alpine.$data(modal);

            alpineData.open = true;

            // Title
            document.getElementById('interview_label').innerText =
                'Edit Interview';

            // Fill Form
            alpineData.form.id = this.dataset.id;

            alpineData.form.position = this.dataset.position;

            alpineData.form.department = this.dataset.department;

            alpineData.form.candidate_id = this.dataset.candidate;

            alpineData.form.interview_date = this.dataset.date;

            alpineData.form.institution = this.dataset.institution;

            alpineData.form.categories = JSON.parse(this.dataset.categories);

      setTimeout(() => {

    const selectedOption =
        candidateSelect.querySelector(
            `option[value="${alpineData.form.candidate_id}"]`
        );

    alpineData.candidate_experience =
        selectedOption?.dataset?.experience || 'Fresher';
        alpineData.candidate_position =
    selectedOption?.dataset?.position || '';

alpineData.candidate_current_salary =
    selectedOption?.dataset?.current_salary || '';

alpineData.candidate_expected_salary =
    selectedOption?.dataset?.expected_salary || '';

}, 100);
        });

    });
    });
</script>
