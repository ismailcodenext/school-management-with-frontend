<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Principal Message</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Principal Name *</label>
                                <input type="text" class="form-control" id="principalName">
                                <label class="form-label">Designation *</label>
                                <input type="text" class="form-control" id="principalDesignation">
                                <label class="form-label">Principal Message *</label>
                                <input type="text" class="form-control" id="principalMessage">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Principal Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="img_url">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Save()" id="save-btn" class="btn bg-gradient-success" >Save</button>
            </div>
        </div>
    </div>
</div>


<script>
    async function Save() {
        try {
            let principalName = document.getElementById('principalName').value;
            let principalDesignation = document.getElementById('principalDesignation').value;
            let principalMessage = document.getElementById('principalMessage').value;
            let imgInput = document.getElementById('img_url');

            // Check if a file is selected
            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (principalName.length === 0 || principalDesignation.length === 0 || principalMessage.length === 0) {
                errorToast("All fields are required!");
            } else {
                document.getElementById('modal-close').click();

                let formData = new FormData();
                formData.append('principalName', principalName);
                formData.append('principalDesignation', principalDesignation);
                formData.append('principalMessage', principalMessage);
                formData.append('img', imgFile); // Append the file, not the file URL

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers // Include headers from HeaderToken function
                    }
                }

                showLoader();
                let res = await axios.post("/create-principal-message", formData, config);
                hideLoader();

                if (res.data['status'] === "success") {
                    successToast(res.data['message']);
                    document.getElementById("save-form").reset();
                    await getList();
                } else {
                    errorToast(res.data['message'])
                }
            }

        } catch (e) {
            unauthorized(e.response.status)
        }
    }

</script>
