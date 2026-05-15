<!-- Company Modal -->
<div id="companyModal"
     x-data="{ open:false, form: {company_id: 0, name: '', image: ''} }"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <!-- Backdrop -->
    <div class="absolute inset-0 bg-black/40"
         @click="open=false"></div>

    <!-- Modal Box -->
    <div class="bg-white p-8 rounded-2xl shadow-2xl w-[500px] max-w-[90%] relative z-10">

        <h2 class="text-2xl font-bold mb-6 text-gray-800"
            id="company_label">
            Add Company
        </h2>

        <form id="companyForm"
              enctype="multipart/form-data"
              class="space-y-6">

            <input type="hidden"
                   name="company_id"
                   x-model="form.company_id"
                   id="company_id" />

            <!-- Company Name -->
            <div>

                <label class="block text-gray-700 font-medium mb-2">
                    Company Name
                </label>

                <input type="text"
                       name="name"
                       id="name"
                       x-model="form.name"
                       required
                       placeholder="Enter company name"
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">

            </div>

            <!-- Company Image -->
            <div>

                <label class="block text-gray-700 font-medium mb-2">
                    Company Image
                </label>

                <input type="file"
                       name="image"
                       id="image"
                       accept="image/*"
                       class="form-input w-full border border-gray-300 rounded-lg p-2 focus:outline-none focus:ring-2 focus:ring-[#ea2498]">

            </div>

            <!-- Preview -->
            <div id="imagePreviewContainer" class="hidden">

                <label class="block text-gray-700 font-medium mb-2">
                    Current Image
                </label>

                <img id="imagePreview"
                     src=""
                     class="w-24 h-24 rounded border object-cover">

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
                        id="save_company">
                    Save
                </button>

            </div>

        </form>

    </div>

</div>



<!-- Delete Modal -->
<div id="deleteCompanyModal"
     x-data="{ open: false, deleteId: null }"
     x-show="open"
     class="fixed inset-0 flex items-center justify-center z-50"
     style="display:none">

    <div class="absolute inset-0 bg-black/40"
         @click="open=false"></div>

    <div class="bg-white p-6 rounded-xl shadow-xl w-[400px] relative z-10">

        <h2 class="text-lg font-bold mb-4 text-gray-800">
            Confirm Delete
        </h2>

        <p class="text-gray-600 mb-6">
            Are you sure you want to delete this company?
        </p>

        <div class="flex justify-end gap-3">

            <button @click="open=false"
                    class="px-4 py-1 border rounded-lg hover:bg-gray-100">
                Cancel
            </button>

            <button @click="deleteCompany(deleteId)"
                    class="px-4 py-1 bg-red-600 text-white rounded-lg hover:bg-red-700">
                Delete
            </button>

        </div>

    </div>

</div>
