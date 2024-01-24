<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-update modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Footer Information</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 p-1">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label">Photo</label>
                                <input type="file" class="form-control" id="Update_FooterImage"
                                 onchange="updatePreview(this)">                                                               
                                <label class="form-label"> Update Description *</label><br>
                                <textarea id="Update_Description" cols="25" rows="5"></textarea><br>
                                <label class="form-label"> Update Facebook Url *</label>
                                <input type="text" class="form-control" id="Update_Facebook">
                                <label class="form-label"> Update Twitter Url *</label>
                                <input type="text" class="form-control" id="Update_Twitter">
                                <label class="form-label"> Update Youtube Url *</label>
                                <input type="text" class="form-control" id="Update_Youtube">
                                <label class="form-label"> Update Linkedin Url *</label>
                                <input type="text" class="form-control" id="Update_Linkedin">
                            </div>

                            <div class="col-4 p-1">
                                <h6>My Address</h6>
                                <label class="form-label"> Update Contact Address *</label>
                                <input type="text" class="form-control" id="Update_Address">
                                <label class="form-label"> Update Contact Number *</label>
                                <input type="text" class="form-control" id="Update_Number">
                                <label class="form-label"> Update Contact Email *</label>
                                <input type="email" class="form-control" id="Update_Email">
                            </div>

                            <div class="col-4 p-1">
                                <h6>Official Facebook Page</h6>
                                <label class="form-label"> Update Facebook Page *</label>
                                <input type="text" class="form-control" id="Update_FacebookPage">
                            </div>
                            <input class="d-none" id="updateID">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update(event)" id="update-btn" class="btn bg-gradient-success">Update</button>
            </div>
        </div>
    </div>
</div>


<script>

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
        let res = await axios.post("/footer-by-id", { id: id.toString() }, HeaderToken());
        hideLoader();

        let data = res.data.rows;

 document.getElementById('Update_Description').value = data.description;
document.getElementById('Update_Facebook').value = data.facebook;
document.getElementById('Update_Twitter').value = data.twitter;
document.getElementById('Update_Youtube').value = data.youtube;
document.getElementById('Update_Linkedin').value = data.linkedin;
document.getElementById('Update_Address').value = data.address;
document.getElementById('Update_Number').value = data.number;
document.getElementById('Update_Email').value = data.email;
document.getElementById('Update_FacebookPage').value = data.pageLink;

        updatePreview(document.getElementById('Update_FooterImage'), data.img_url);
    } catch (e) {
        unauthorized(e.response.status);
    }
}




    async function Update() {
        try {
            let Update_FooterImage = document.getElementById('Update_FooterImage').files[0];
            let Update_Description = document.getElementById('Update_Description').value;
            let Update_Facebook = document.getElementById('Update_Facebook').value;
            let Update_Twitter = document.getElementById('Update_Twitter').value;
            let Update_Youtube = document.getElementById('Update_Youtube').value;
            let Update_Linkedin = document.getElementById('Update_Linkedin').value;
            let Update_Address = document.getElementById('Update_Address').value;
            let Update_Number = document.getElementById('Update_Number').value;
            let Update_Email = document.getElementById('Update_Email').value;
            let Update_FacebookPage = document.getElementById('Update_FacebookPage').value;
            let updateID = document.getElementById('updateID').value;

            if (!Update_Description || !Update_Facebook || !Update_Twitter || !Update_Youtube || !Update_Linkedin || !Update_Address || !Update_Number || !Update_Email || !Update_FacebookPage || !updateID) {
                errorToast("All fields are required!");
                return;
            }

            document.getElementById('update-modal-close').click();

            let formData = new FormData();

                formData.append('img',Update_FooterImage);
                formData.append('description', Update_Description);
                formData.append('facebook', Update_Facebook);
                formData.append('twitter', Update_Twitter);
                formData.append('youtube', Update_Youtube);
                formData.append('linkedin', Update_Linkedin);
                formData.append('address', Update_Address);
                formData.append('number', Update_Number);
                formData.append('email', Update_Email);
                formData.append('pageLink', Update_FacebookPage);
                formData.append('id', updateID);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();

            let res = await axios.post("/update-footer", formData, config);
            hideLoader();

            if (res.data.status === "success") {
                successToast(res.data.message);
                let modal = new bootstrap.Modal(document.getElementById('update-modal'));
            modal.hide();
                await getList();
            } else {
                errorToast(res.data.message);
            }

        } catch (e) {
            unauthorized(e.response.status);
        }
    }
</script>
