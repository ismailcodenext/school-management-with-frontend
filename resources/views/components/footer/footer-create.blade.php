<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-copy modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Footer Information</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-4 p-1">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="FooterImage">
                                <label class="form-label"> Description *</label><br>
                                <textarea id="Description" cols="40" rows="5"></textarea><br>
                                <label class="form-label">Facebook Url *</label>
                                <input type="text" class="form-control" id="Facebook">
                                <label class="form-label">Twitter Url *</label>
                                <input type="text" class="form-control" id="Twitter">
                                <label class="form-label">Youtube Url *</label>
                                <input type="text" class="form-control" id="Youtube">
                                <label class="form-label">Linkedin Url *</label>
                                <input type="text" class="form-control" id="Linkedin">
                            </div>

                            <div class="col-4 p-1">
                                <h6>My Address</h6>
                            <label class="form-label">Contact Address *</label>
                            <input type="text" class="form-control" id="Address">
                            <label class="form-label">Contact Number *</label>
                            <input type="text" class="form-control" id="Number">
                            <label class="form-label">Contact Email *</label>
                            <input type="email" class="form-control" id="Email">

                            </div>

                            <div class="col-4 p-1">
                                <h6>Official Facebook Page</h6>
                                <label class="form-label">Facebook Page *</label>
                                <input type="text" class="form-control" id="FacebookPage">
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
            let imgInput = document.getElementById('FooterImage');
            let Description = document.getElementById('Description').value;
            let Facebook = document.getElementById('Facebook').value;
            let Twitter = document.getElementById('Twitter').value;
            let Youtube = document.getElementById('Youtube').value;
            let Linkedin = document.getElementById('Linkedin').value;
            let Address = document.getElementById('Address').value;
            let Number = document.getElementById('Number').value;
            let Email = document.getElementById('Email').value;
            let FacebookPage = document.getElementById('FacebookPage').value;


            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (Description.length === 0) {
                errorToast("Description Required !");
            } else if (Facebook.length === 0) {
                errorToast("Facebook Url Required !");
            } else if (Twitter.length === 0) {
                errorToast("Facebook Url Required !");
            } else if (Youtube.length === 0) {
                errorToast("Youtube Url Required !");
            } else if (Linkedin.length === 0) {
                errorToast("Linkedin Url Required !");
            }
             else if (Address.length === 0) {
                errorToast("Contact Address Required !");
            }
             else if (Number.length === 0) {
                errorToast("Contact Number Required !");
            }
             else if (Email.length === 0) {
                errorToast("Contact Email Required !");
            }
             else if (FacebookPage.length === 0) {
                errorToast("Facebook Page Url Required !");
            } else {
                document.getElementById('modal-close').click();
                let formData = new FormData();
                formData.append('img', imgFile);
                formData.append('description', Description);
                formData.append('facebook', Facebook);
                formData.append('twitter', Twitter);
                formData.append('youtube', Youtube);
                formData.append('linkedin', Linkedin);
                formData.append('address', Address);
                formData.append('number', Number);
                formData.append('email', Email);
                formData.append('pageLink', FacebookPage);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                showLoader();
                let res = await axios.post("/create-footer", formData, config);
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
