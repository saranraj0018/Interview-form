$(document).ready(function () {

    // ==== CREATE COMPANY ====
    $(document).on("click", "#createCompanyBtn", function () {

        let modal = document.getElementById("companyModal");
        let alpine = Alpine.$data(modal);

        alpine.form = {
            company_id: 0,
            name: '',
            image: ''
        };

        alpine.open = true;

        $("#company_label").text("Add Company");
        $("#save_company").text("Save");

        $("#companyForm")[0].reset();

        $("#imagePreviewContainer").addClass("hidden");
        $("#imagePreview").attr("src", "");
    });


    // ==== EDIT COMPANY ====
    $(document).on("click", ".editCompanyBtn", function () {

        let modal = document.getElementById("companyModal");
        let alpine = Alpine.$data(modal);

        alpine.form.company_id = $(this).data("id");
        alpine.form.name = $(this).data("name");

        alpine.open = true;

        $("#company_label").text("Edit Company");
        $("#save_company").text("Update");

        let image = $(this).data("image");

        if (image) {

            $("#imagePreviewContainer").removeClass("hidden");

            $("#imagePreview").attr("src", "/" + image);

        } else {

            $("#imagePreviewContainer").addClass("hidden");

            $("#imagePreview").attr("src", "");
        }
    });


    // ==== IMAGE PREVIEW ====
    $(document).on("change", "#image", function (e) {

        let reader = new FileReader();

        reader.onload = function (e) {

            $("#imagePreviewContainer").removeClass("hidden");

            $("#imagePreview").attr("src", e.target.result);
        };

        reader.readAsDataURL(this.files[0]);
    });


    // ==== SUBMIT FORM ====
    $(document).on("submit", "#companyForm", function (e) {

        e.preventDefault();

        let formData = new FormData(this);

        sendRequest(
            "/admin/company/save",
            formData,
            "POST",

            function (res) {

                if (res.success) {

                    showToast(res.message, "success", 2000);

                    setTimeout(() => {

                        let modal = document.getElementById("companyModal");

                        let alpine = Alpine.$data(modal);

                        alpine.open = false;

                        alpine.form = {
                            company_id: 0,
                            name: '',
                            image: ''
                        };

                        document.getElementById("companyForm").reset();

                        reloadCompanyList();

                    }, 500);

                } else {

                    showToast(res.message || "Something went wrong!", "error", 2000);
                }
            }
        );
    });


    // ==== OPEN DELETE MODAL ====
    $(document).on("click", ".btnDeleteCompany", function () {

        let modal = document.querySelector('#deleteCompanyModal');

        let alpine = Alpine.$data(modal);

        alpine.deleteId = $(this).data("id");

        alpine.open = true;
    });


    // ==== DELETE ACTION ====
    window.deleteCompany = function (id) {

        let modal = document.querySelector('#deleteCompanyModal');

        let alpine = Alpine.$data(modal);

        sendRequest(

            "/admin/company/delete",

            { id: id },

            "POST",

            function (res) {

                if (res.success) {

                    showToast("Company deleted successfully!", "success", 2000);

                    reloadCompanyList();

                } else {

                    showToast(res.message, "error", 2000);
                }

                alpine.open = false;
            }
        );
    };


    // ==== RELOAD TABLE ====
    function reloadCompanyList() {

        $.get("/admin/company/list", function (html) {

            let $tbody = $(html).find("tbody").html();

            $("tbody").html($tbody);
        });
    }

});
