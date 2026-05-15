$(document).ready(function () {

    // ==== CREATE JOB POST ====

    $(document).on("click", "#createJobPostBtn", function () {
        let modal = document.getElementById("jobPostModal");
        let alpine = Alpine.$data(modal);

        alpine.form = {

            job_post_id: 0,
            job_title: '',
            location: '',
            role_summary: '',
            key_responsibilities: '',
            skills: '',
            qualifications: '',
            experience: '',
            company_id: '',
            status: 1,

        };

        alpine.open = true;

        $("#job_post_label").text("Add Job Post");

        $("#save_job_post").text("Save");

    });


    // ==== EDIT JOB POST ====

    $(document).on("click", ".editJobPostBtn", function () {

        let modal = document.getElementById("jobPostModal");

        let alpine = Alpine.$data(modal);

        alpine.form.job_post_id = $(this).data("id");
        alpine.form.job_title = $(this).data("job_title");
        alpine.form.company_id = $(this).data("company_id");
        alpine.form.status = $(this).data("status");
        alpine.form.location = $(this).data("location");
        alpine.form.role_summary = $(this).data("role_summary");
        alpine.form.key_responsibilities = $(this).data("key_responsibilities");
        alpine.form.skills = $(this).data("skills");
        alpine.form.qualifications = $(this).data("qualifications");
        alpine.form.experience = $(this).data("experience");

        alpine.open = true;

        $("#job_post_label").text("Edit Job Post");

        $("#save_job_post").text("Update");

    });


    // ==== SUBMIT FORM ====

    $(document).on("submit", "#jobPostForm", function (e) {

        e.preventDefault();

        let formData = new FormData(this);

        sendRequest(

            "/admin/job/save",
            formData,
            "POST",
            function (res) {
                if (res.success) {
                    showToast(res.message, "success", 2000);
                    setTimeout(() => {
                        let modal = document.getElementById("jobPostModal");
                        let alpine = Alpine.$data(modal);
                        alpine.open = false;
                        alpine.form = {

                            job_post_id: 0,
                            job_title: '',
                            company_id: '',
                            status: 1,
                            location: '',
                            role_summary: '',
                            key_responsibilities: '',
                            skills: '',
                            qualifications: '',
                            experience: ''

                        };

                        document.getElementById("jobPostForm").reset();

                        reloadJobPostList();

                    }, 500);

                } else {

                    showToast(res.message || "Something went wrong!", "error", 2000);

                }

            }
        );

    });


    // ==== OPEN DELETE MODAL ====

    $(document).on("click", ".btnDeleteJobPost", function () {

        let modal = document.querySelector('#deleteJobPostModal');

        let alpine = Alpine.$data(modal);

        alpine.deleteId = $(this).data("id");

        alpine.open = true;

    });


    // ==== DELETE ACTION ====

    window.deleteJobPost = function (id) {

        let modal = document.querySelector('#deleteJobPostModal');

        let alpine = Alpine.$data(modal);

        sendRequest(

            "/admin/job/delete",

            { id: id },

            "POST",

            function (res) {

                if (res.success) {

                    showToast("Job Post deleted successfully!", "success", 2000);

                    reloadJobPostList();

                } else {

                    showToast(res.message, "error", 2000);

                }

                alpine.open = false;

            }

        );

    };


    // ==== RELOAD TABLE ====

    function reloadJobPostList() {

        $.get("/admin/job/list", function (html) {

            let $tbody = $(html).find("#jobPostTableBody").html();

            $("#jobPostTableBody").html($tbody);

        });

    }

});
