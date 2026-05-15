<div id="jobPostModal"
     x-data="{
        open:false,
        form: {
            job_post_id: 0,
            job_title: '',
            location: '',
            role_summary: '',
            key_responsibilities: '',
            skills: '',
            qualifications: '',
            experience: '',
            company_id: '',
            status: 1
        }
     }"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <!-- Backdrop -->

    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <!-- Modal Box -->

  <div class="bg-white p-8 rounded-2xl shadow-2xl w-[600px] max-w-[95%] relative z-10 overflow-y-auto max-h-[90vh]">

        <h2 class="text-2xl font-bold mb-6 text-gray-800" id="job_post_label">

            Add Job Post

        </h2>

        <form id="jobPostForm" class="space-y-6">

            <input type="hidden"
                   name="job_post_id"
                   x-model="form.job_post_id"
                   id="job_post_id" />

                    <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Company
                </label>

                <select name="company_id"
                        x-model="form.company_id"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">

                    <option value="">Select Company</option>

                    @foreach($companies as $company)
                        <option value="{{ $company->id }}">
                            {{ $company->name }}
                        </option>
                    @endforeach

                </select>
            </div>

            <!-- Job Title -->
            <div>

                <label class="block text-gray-700 font-medium mb-2">
                    Job Title
                </label>
                <input type="text"
                       name="job_title"
                       id="job_title"
                       x-model="form.job_title"
                       placeholder="Enter job title"
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">

            </div>

            <!-- Location -->
            <div>

                <label class="block text-gray-700 font-medium mb-2">

                    Location

                </label>

                <input type="text"
                       name="location"
                       id="location"
                       x-model="form.location"
                       placeholder="Enter location"
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">

            </div>

            <!-- Role Summary -->

            <div>

                <label class="block text-gray-700 font-medium mb-2">

                    Role Summary

                </label>

                <textarea
                    name="role_summary"
                    id="role_summary"
                    x-model="form.role_summary"
                    rows="4"
                    placeholder="Enter role summary"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]"></textarea>

            </div>

            <!-- Key Responsibilities -->

            <div>

                <label class="block text-gray-700 font-medium mb-2">

                    Key Responsibilities

                </label>

                <textarea
                    name="key_responsibilities"
                    id="key_responsibilities"
                    x-model="form.key_responsibilities"
                    rows="6"
                    placeholder="Enter key responsibilities"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]"></textarea>

            </div>

            <!-- Skills -->

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Skills
                </label>
                <textarea
                    name="skills"
                    id="skills"
                    x-model="form.skills"
                    rows="5"
                    placeholder="Enter skills"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]"></textarea>
            </div>

            <!-- Qualifications -->
            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Qualifications
                </label>
                <textarea
                    name="qualifications"
                    id="qualifications"
                    x-model="form.qualifications"
                    rows="5"
                    placeholder="Enter qualifications"
                    class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]"></textarea>

            </div>

            <!-- Experience -->

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Experience
                </label>
                <input type="text"
                       name="experience"
                       id="experience"
                       x-model="form.experience"
                       placeholder="Example : 1-2 Years"
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">
                    Status
                </label>

                <select name="status"
                        x-model="form.status"
                        class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">

                    <option value="1">Active</option>
                    <option value="0">Inactive</option>

                </select>
            </div>

            <!-- Buttons -->

            <div class="flex justify-end gap-3 pt-4">
                <button type="button"
                        @click="open=false"
                        class="px-5 py-2 rounded-lg border border-gray-300 hover:bg-gray-100">

                    Cancel

                </button>

                <button type="submit"
                        class="bg-[#ea2498] text-white px-5 py-2 rounded-lg hover:bg-[#2a2a3f]"
                        id="save_job_post">

                    Save

                </button>

            </div>

        </form>

    </div>

</div>


<!-- Delete Modal -->

<div id="deleteJobPostModal"
     x-data="{ open: false, deleteId: null }"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <div class="absolute inset-0 bg-black/40" @click="open=false"></div>

    <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">

        <h2 class="text-lg font-bold mb-4 text-gray-800">

            Confirm Delete

        </h2>

        <p class="text-gray-600 mb-6">

            Are you sure you want to delete this job post?

        </p>

        <div class="flex justify-end gap-3">

            <button
                @click="open=false"
                class="px-4 py-1 border rounded-lg hover:bg-gray-100">

                Cancel

            </button>

            <button
                @click="deleteJobPost(deleteId)"
                class="px-4 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">

                Delete

            </button>

        </div>

    </div>

</div>
