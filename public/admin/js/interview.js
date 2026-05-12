$(document).ready(function () {

    // ==== CREATE INTERVIEW ====
    $(document).on("click", "#createInterviewBtn", function () {

        let modal = document.getElementById("interviewModal");
        let alpine = Alpine.$data(modal);

        alpine.form = {
            id: 0,
            position: '',
            department: '',
            candidate_name: '',
            interview_date: '',
            institution: '',
            categories: []
        };

        alpine.open = true;

        $("#interview_label").text("Add Interview");
    });


    // ==== EDIT INTERVIEW ====
    $(document).on("click", ".editInterviewBtn", function () {

        let modal = document.getElementById("interviewModal");
        let alpine = Alpine.$data(modal);

        alpine.form.id = $(this).data("id");
        alpine.form.position = $(this).data("position");
        alpine.form.department = $(this).data("department");
        alpine.form.candidate_name = $(this).data("candidate");
        alpine.form.interview_date = $(this).data("date");
        alpine.form.institution = $(this).data("institution");

        // 🔥 IMPORTANT: fetch selected emails
        let selectedCategories = $(this).data("categories") || [];
        alpine.form.categories = selectedCategories;

        alpine.open = true;

        $("#interview_label").text("Edit Interview");
    });


    // ==== SUBMIT FORM ====
    $(document).on("submit", "#interviewForm", function (e) {
        e.preventDefault();
     let modal = document.getElementById("interviewModal");
    let alpine = Alpine.$data(modal);
        let formData = new FormData(this);
 alpine.form.categories.forEach((id, index) => {
        formData.append(`categories[${index}]`, id);
    });
        sendRequest("/admin/interview/save", formData, "POST", function (res) {

            if (res.success) {

                showToast(res.message, "success", 2000);

                setTimeout(() => {

                    let modal = document.getElementById("interviewModal");
                    let alpine = Alpine.$data(modal);

                    alpine.open = false;

                    alpine.form = {
                        id: 0,
                        position: '',
                        department: '',
                        candidate_name: '',
                        interview_date: '',
                        institution: '',
                        categories: []
                    };

                    document.getElementById("interviewForm").reset();

                    reloadInterviewList();

                }, 500);

            } else {
                showToast(res.message || "Something went wrong!", "error", 2000);
            }

        });
    });


    // ==== OPEN DELETE MODAL ====
    $(document).on("click", ".btnDeleteInterview", function () {

        let modal = document.querySelector('#deleteInterviewModal');
        let alpine = Alpine.$data(modal);

        alpine.deleteId = $(this).data("id");
        alpine.open = true;
    });


    // ==== DELETE ACTION ====
    window.deleteInterview = function (id) {

        let modal = document.querySelector('#deleteInterviewModal');
        let alpine = Alpine.$data(modal);

        sendRequest(
            "/admin/interview/delete",
            { id: id },
            "POST",
            function (res) {

                if (res.success) {
                    showToast("Interview deleted successfully!", "success", 2000);
                    reloadInterviewList();
                } else {
                    showToast(res.message, "error", 2000);
                }

                alpine.open = false;
            }
        );
    };


    // ==== RELOAD TABLE ====
    function reloadInterviewList() {
        $.get("/admin/interview/list", function (html) {
            let $tbody = $(html).find("#interviewTableBody").html();
            $("#interviewTableBody").html($tbody);
        });
    }

});
