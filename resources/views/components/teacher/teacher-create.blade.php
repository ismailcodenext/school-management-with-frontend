<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Create Teacher Information</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Teacher Name *</label>
                                <input type="text" class="form-control" id="teacherName">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="email">
                                <label class="form-label">Designation *</label>
                                <input type="text" class="form-control" id="designation">
                                <label class="form-label">Education *</label>
                                <input type="text" class="form-control" id="education">
                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" id="address">
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="mobile">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Photo</label>
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
            let teacherName = document.getElementById('teacherName').value;
            let email = document.getElementById('email').value;
            let designation = document.getElementById('designation').value;
            let education = document.getElementById('education').value;
            let address = document.getElementById('address').value;
            let mobile = document.getElementById('mobile').value;
            let imgInput = document.getElementById('img_url');

            // Check if a file is selected
            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (teacherName.length === 0 || email.length === 0 || designation.length === 0 ||
                education.length === 0 || address.length === 0 || mobile.length === 0) {
                errorToast("All fields are required!");
            } else {
                document.getElementById('modal-close').click();

                let formData = new FormData();
                formData.append('name', teacherName);
                formData.append('email', email);
                formData.append('designation', designation);
                formData.append('education', education);
                formData.append('address', address);
                formData.append('mobile', mobile);
                formData.append('img', imgFile); // Append the file, not the file URL

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers // Include headers from HeaderToken function
                    }
                }

                showLoader();
                let res = await axios.post("/create-teacher", formData, config);
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
