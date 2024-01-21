<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Branding Information</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Organigation Name BN *</label>
                                <input type="text" class="form-control" id="NameBN">
                                <label class="form-label">Organigation Name EN *</label>
                                <input type="text" class="form-control" id="NameEN">
                                <label class="form-label">Organigation Address *</label>
                                <input type="text" class="form-control" id="Address">
                                <label class="form-label">Organigation EIIN Number *</label>
                                <input type="text" class="form-control" id="EIINCode">
                                <label class="form-label">Organigation Code *</label>
                                <input type="text" class="form-control" id="SchoolCode">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="BrandingLogo">
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
            let NameBN = document.getElementById('NameBN').value;
            let NameEN = document.getElementById('NameEN').value;
            let Address = document.getElementById('Address').value;
            let EIINCode = document.getElementById('EIINCode').value;
            let SchoolCode = document.getElementById('SchoolCode').value;
            let imgInput = document.getElementById('BrandingLogo');

            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (NameBN.length === 0) {
                errorToast("Organisation Bangla Name Required !");
            } else if (NameEN.length === 0) {
                errorToast("Organisation English Name Required !");
            } else if (Address.length === 0) {
                errorToast("Organisation Address Required !");
            } else if (EIINCode.length === 0) {
                errorToast("Organisation EIIN Code Required !");
            } else if (SchoolCode.length === 0) {
                errorToast("Organisation School Code Required !");
            } else {
                document.getElementById('modal-close').click();
                let formData = new FormData();
                formData.append('nameBangla', NameBN);
                formData.append('nameEnglish', NameEN);
                formData.append('address', Address);
                formData.append('eiin', EIINCode);
                formData.append('code', SchoolCode);
                formData.append('img', imgFile);

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }

                showLoader();
                let res = await axios.post("/create-branding", formData, config);
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
