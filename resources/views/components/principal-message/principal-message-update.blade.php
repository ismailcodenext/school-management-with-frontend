<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Principal Message</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Principal Name</label>
                                <input type="text" class="form-control" id="principalNameUpdate">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" id="principalDesignationUpdate">
                                <label class="form-label">Message</label>
                                <input type="text" class="form-control" id="principalMessageUpdate">
                                <input type="text" class="d-none" id="updateID">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="updatePreview(this)" type="file" class="form-control" id="principalMessageImgUpdate">
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
    // async function updatePreview(input) {
    //     // Display the selected image in the preview
    //     const oldImg = document.getElementById('oldImg');
    //     oldImg.src = window.URL.createObjectURL(input.files[0]);
    // }

    async function updatePreview(input, imageUrl) {
        const oldImg = document.getElementById('oldImg');

        if (input.files && input.files[0]) {
            oldImg.src = window.URL.createObjectURL(input.files[0]);
        } else if (imageUrl) {
            oldImg.src = imageUrl;
        } else {
            oldImg.src = "{{ asset('images/default.jpg') }}";
        }
    }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();

            // Fetch teacher information by ID
            let res = await axios.post("/principal-message-by-id", { id: id.toString() }, HeaderToken());

            hideLoader();

            // Fill up the form with retrieved data
            let data = res.data.rows;
            document.getElementById('principalNameUpdate').value = data.principal_name;
            document.getElementById('principalDesignationUpdate').value = data.designation;
            document.getElementById('principalMessageUpdate').value = data.principal_message;
            // Update the preview based on the existing image URL
            // updatePreview({ files: [data.img_url ? new File([], data.img_url.split('/').pop()) : null] });
            updatePreview(document.getElementById('principalMessageImgUpdate'), data.img_url);

        } catch (e) {
            // Handle unauthorized access or other errors
            unauthorized(e.response.status);
        }
    }

    async function update() {
        try {
            // Retrieve values from the form
            let principalNameUpdate = document.getElementById('principalNameUpdate').value;
            let principalDesignationUpdate = document.getElementById('principalDesignationUpdate').value;
            let principalMessageUpdate = document.getElementById('principalMessageUpdate').value;
            let updateID = document.getElementById('updateID').value;
            let principalMessageImgUpdate = document.getElementById('principalMessageImgUpdate').files[0];

            // Check for empty fields
            if (!principalNameUpdate || !principalDesignationUpdate ||!principalMessageUpdate || !updateID) {
                errorToast("All fields are required!");
                return;
            }

            document.getElementById('update-modal-close').click();

            // FormData for handling file uploads
            let formData = new FormData();
            formData.append('principal_name', principalNameUpdate);
            formData.append('designation', principalDesignationUpdate);
            formData.append('principal_message', principalMessageUpdate);
            formData.append('id', updateID);
            formData.append('img', principalMessageImgUpdate);

            // Include headers for authentication
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            // Make the POST request to update teacher information
            let res = await axios.post("/update-principal-message", formData, config);
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
