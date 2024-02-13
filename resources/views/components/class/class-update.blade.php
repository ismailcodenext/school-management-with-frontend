<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Class</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Class Name *</label>
                                <input type="text" class="form-control" id="clsNameUpdate">
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

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();

            // Fetch teacher information by ID
            let res = await axios.post("/class-by-id", { id: id.toString() }, HeaderToken());

            hideLoader();

            // Fill up the form with retrieved data
            let data = res.data.rows;
            document.getElementById('clsNameUpdate').value = data.class_name;

        } catch (e) {
            // Handle unauthorized access or other errors
            unauthorized(e.response.status);
        }
    }

    async function update() {
        try {
            // Retrieve values from the form
            let clsNameUpdate = document.getElementById('clsNameUpdate').value;
            let updateID = document.getElementById('updateID').value;

            document.getElementById('update-modal-close').click();

            // FormData for handling file uploads
            let formData = new FormData();
            formData.append('clsNameUpdate', clsNameUpdate);
            formData.append('id', updateID);


            showLoader();
            // Make the POST request to update teacher information
            let res = await axios.post("/update-class", formData);
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
