<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Teacher</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Teacher</label>
                                <label class="form-label mt-2">Name</label>
                                <input type="text" class="form-control" id="teacherNameUpdate">
                                <label class="form-label mt-2">Email</label>
                                <input type="text" class="form-control" id="teacherEmailUpdate">
                                <label class="form-label mt-2">Mobile</label>
                                <input type="text" class="form-control" id="teacherMobileUpdate">
                                <label class="form-label mt-2">Designation</label>
                                <input type="text" class="form-control" id="teacherDesignation">
                                <label class="form-label mt-2">Education</label>
                                <input type="text" class="form-control" id="teacherEducation">
                                <label class="form-label mt-2">Address</label>
                                <input type="text" class="form-control" id="teacherAddress">
                                <input type="text" class="d-none" id="updateID">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="updatePreview(this)" type="file" class="form-control" id="teacherImgUpdate">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="update()" id="update-btn" class="btn bg-gradient-success" >Update</button>
            </div>
        </div>
    </div>
</div>

<script>
    async function updatePreview(input) {
        // Display the selected image in the preview
        const oldImg = document.getElementById('oldImg');
        oldImg.src = window.URL.createObjectURL(input.files[0]);
    }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();

            // Fetch teacher information by ID
            let res = await axios.post("/teacher-by-id", { id: id.toString() }, HeaderToken());

            hideLoader();

            // Fill up the form with retrieved data
            let data = res.data.rows;
            document.getElementById('teacherNameUpdate').value = data.name;
            document.getElementById('teacherEmailUpdate').value = data.email;
            document.getElementById('teacherMobileUpdate').value = data.mobile;
            document.getElementById('teacherDesignation').value = data.designation;
            document.getElementById('teacherEducation').value = data.education;
            document.getElementById('teacherAddress').value = data.address;

            // Update the preview based on the existing image URL
            updatePreview({ files: [data.img_url ? new File([], data.img_url.split('/').pop()) : null] });

        } catch (e) {
            // Handle unauthorized access or other errors
            unauthorized(e.response.status);
        }
    }

    async function update() {
        try {
            // Retrieve values from the form
            let teacherNameUpdate = document.getElementById('teacherNameUpdate').value;
            let teacherEmailUpdate = document.getElementById('teacherEmailUpdate').value;
            let teacherMobileUpdate = document.getElementById('teacherMobileUpdate').value;
            let teacherDesignation = document.getElementById('teacherDesignation').value;
            let teacherEducation = document.getElementById('teacherEducation').value;
            let teacherAddress = document.getElementById('teacherAddress').value;
            let updateID = document.getElementById('updateID').value;
            let teacherImgUpdate = document.getElementById('teacherImgUpdate').files[0];

            // Check for empty fields
            if (!teacherNameUpdate || !teacherEmailUpdate || !teacherMobileUpdate || !teacherDesignation || !teacherEducation || !teacherAddress || !updateID) {
                errorToast("All fields are required!");
                return;
            }

            document.getElementById('update-modal-close').click();

            // FormData for handling file uploads
            let formData = new FormData();
            formData.append('name', teacherNameUpdate);
            formData.append('email', teacherEmailUpdate);
            formData.append('mobile', teacherMobileUpdate);
            formData.append('designation', teacherDesignation);
            formData.append('education', teacherEducation);
            formData.append('address', teacherAddress);
            formData.append('id', updateID);
            formData.append('img', teacherImgUpdate);

            // Include headers for authentication
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            // Make the POST request to update teacher information
            let res = await axios.post("/update-teacher", formData, config);
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message);
                await getList(); // Refresh the teacher list after a successful update
            } else {
                errorToast(res.data.message);
            }

        } catch (e) {
            // Handle unauthorized access or other errors
            unauthorized(e.response.status);
        }
    }
</script>
