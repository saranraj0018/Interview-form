$(document).ready(function () {

    // ==== CREATE CATEGORY ====
    $(document).on("click", "#createCategoryBtn", function () {

        let modal = document.getElementById("categoryModal");
        let alpine = Alpine.$data(modal);

        alpine.form = { category_id: 0, email: '', person_name: '', designation: '', level: '' };

        alpine.open = true;

        $("#category_label").text("Add Email");
        $("#save_category").text("Save");
    });


    // ==== EDIT CATEGORY ====
    $(document).on("click", ".editCategoryBtn", function () {

        let modal = document.getElementById("categoryModal");
        let alpine = Alpine.$data(modal);

        alpine.form.category_id = $(this).data("id");
        alpine.form.email = $(this).data("email");
        alpine.form.person_name = $(this).data("person-name");
        alpine.form.designation = $(this).data("designation");
        alpine.form.level = $(this).data("level");

        alpine.open = true;

        $("#category_label").text("Edit Email");
        $("#save_category").text("Update");
    });


    // ==== SUBMIT FORM ====
    $(document).on("submit", "#categoryForm", function (e) {
        e.preventDefault();


        let formData = new FormData(this);

        sendRequest("/admin/category/save", formData, "POST", function (res) {
            if (res.success) {

                showToast(res.message, "success", 2000);

                setTimeout(() => {
                    let modal = document.getElementById("categoryModal");
                    let alpine = Alpine.$data(modal);

                    alpine.open = false;
                    alpine.form = { category_id: 0, email: '', person_name: '', designation: '', level: '' };

                    document.getElementById("categoryForm").reset();
                    reloadCategoryList();

                }, 500);

            } else {
                showToast(res.message || "Something went wrong!", "error", 2000);
            }
        });
    });


    // ==== OPEN DELETE MODAL ====
    $(document).on("click", ".btnDeleteCategory", function () {

        let modal = document.querySelector('#deleteCategoryModal');
        let alpine = Alpine.$data(modal);

        alpine.deleteId = $(this).data("id");
        alpine.open = true;
    });


    // ==== DELETE ACTION ====
    window.deleteCategory = function (id) {

        let modal = document.querySelector('#deleteCategoryModal');
        let alpine = Alpine.$data(modal);

        sendRequest(
            "/admin/category/delete",
            { id: id },
            "POST",
            function (res) {
                if (res.success) {
                    showToast("Data deleted successfully!", "success", 2000);
                    reloadCategoryList();
                } else {
                    showToast(res.message, "error", 2000);
                }

                alpine.open = false;
            }
        );
    };


    // ==== RELOAD TABLE ====
    function reloadCategoryList() {
        $.get("/admin/category/list", function (html) {
            let $tbody = $(html).find("#categoryTableBody").html();
            $("#categoryTableBody").html($tbody);
        });
    }

});
