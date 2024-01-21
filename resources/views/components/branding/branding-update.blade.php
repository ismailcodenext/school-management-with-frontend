<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Branding Information</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1">
                                <label class="form-label">Organigation Name BN Update*</label>
                                <input type="text" class="form-control" id="NameBN_Update">
                                <label class="form-label">Organigation Name EN Update*</label>
                                <input type="text" class="form-control" id="NameEN_Update">
                                <label class="form-label">Organigation Address Update*</label>
                                <input type="text" class="form-control" id="Address_Update">
                                <label class="form-label">Organigation EIIN Number Update*</label>
                                <input type="text" class="form-control" id="EIINCode_Update">
                                <label class="form-label">Organigation Code Update*</label>
                                <input type="text" class="form-control" id="SchoolCode_Update">
                                <input class="d-none" id="updateID">
                                <br/>
                                <img class="w-15" id="oldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label mt-2">Image</label>
                                <input oninput="updatePreview(this)" type="file" class="form-control" id="BrandingLogo_Update">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button id="update-modal-close" class="btn bg-gradient-primary" data-bs-dismiss="modal" aria-label="Close">Close</button>
                <button onclick="Update(event)" id="update-btn" class="btn bg-gradient-success" >Update</button>
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
        let res = await axios.post("/branding-by-id", { id: id.toString() }, HeaderToken());
        hideLoader();

        let data = res.data.rows;
        document.getElementById('NameBN_Update').value = data.nameBangla;
        document.getElementById('NameEN_Update').value = data.nameEnglish;
        document.getElementById('Address_Update').value = data.address;
        document.getElementById('EIINCode_Update').value = data.eiin;
        document.getElementById('SchoolCode_Update').value = data.code;

        // Update the preview with the existing image URL
        updatePreview(document.getElementById('BrandingLogo_Update'), data.logo);
    } catch (e) {
        unauthorized(e.response.status);
    }
}




    async function Update() {
        try {
            let NameBN_Update = document.getElementById('NameBN_Update').value;
            let NameEN_Update = document.getElementById('NameEN_Update').value;
            let Address_Update = document.getElementById('Address_Update').value;
            let EIINCode_Update = document.getElementById('EIINCode_Update').value;
            let SchoolCode_Update = document.getElementById('SchoolCode_Update').value;
            let updateID = document.getElementById('updateID').value;
            let BrandingLogo_Update = document.getElementById('BrandingLogo_Update').files[0];

            if (!NameBN_Update || !NameEN_Update || !Address_Update || !EIINCode_Update || !SchoolCode_Update || !updateID) {
                errorToast("All fields are required!");
                return;
            }

            document.getElementById('update-modal-close').click();

            let formData = new FormData();
            formData.append('nameBangla', NameBN_Update);
            formData.append('nameEnglish', NameEN_Update);
            formData.append('address', Address_Update);
            formData.append('eiin', EIINCode_Update);
            formData.append('code', SchoolCode_Update);
            formData.append('id', updateID);
            formData.append('img', BrandingLogo_Update);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();

            let res = await axios.post("/update-branding", formData, config);
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
