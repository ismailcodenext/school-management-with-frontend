<div class="modal animated zoomIn" id="update-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Student Information Page</h5>
            </div>
            <div class="modal-body">
                <form id="update-form">
                    <div class="container">
                        <div class="row">
                           
                            <h6 class="modal-title" id="exampleModalLabel">Student Information Update:</h6>
                            <div  class="col-3 p-1">
                                <label class="form-label">Student ID *</label>
                                <input type="number" class="form-control" id="StudentIDUpdate">
                                <label class="form-label">Father Name *</label>
                                <input type="text" class="form-control" id="FatherNameUpdate">
                                <label class="form-label">Mother Name *</label>
                                <input type="text" class="form-control" id="MotherNameUpdate">
                                <label class="form-label">Guardian name *</label>
                                <input type="text" class="form-control" id="GuardianNameUpdate">
                                <label class="form-label">Guardian email *</label>
                                <input type="text" class="form-control" id="GuardianEmailUpdate">
                            </div>
                            <div  class="col-3 p-1">
                                <label class="form-label">Father Mobile *</label>
                                <input type="text" class="form-control" id="FatherMobileUpdate">
                                <label class="form-label">Mother Mobile *</label>
                                <input type="text" class="form-control" id="MotherMobileUpdate">
                                <label class="form-label">Guardian mobile *</label>
                                <input type="text" class="form-control" id="GuardianMobileUpdate">
                                <label class="form-label">Guardian address *</label>
                                <input type="text" class="form-control" id="GuardianAddressUpdate">
                            </div>
                            <div  class="col-3 p-1">
                                <label class="form-label">Father profession *</label>
                                <input type="text" class="form-control" id="FatherProfessionUpdate">
                                <label class="form-label">Mother profession *</label>
                                <input type="text" class="form-control" id="MotherProfessionUpdate">
                                <label class="form-label">Guardian profession *</label>
                                <input type="text" class="form-control" id="GuardianProfessionUpdate">
                                <label class="form-label">Guardian Relation *</label>
                                <input type="text" class="form-control" id="GuardianRelationUpdate">
                            </div>

                            <div class="col-3 p-1">
                                <img class="w-15" id="oldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label mt-2">Banner</label>
                                <input oninput="updatePreview(this)" type="file" class="form-control" id="FatherImageUpdate" >

                                <br>  
                                <label class="form-label mt-2">Logo</label>
                                <img class="w-15" id="oldmgs" src="{{ asset('images/default.jpg') }}"/>
                                <input oninput="updatePreviews(this)" type="file" class="form-control" id="MotherImageUpdate">

                                <br>  
                                <label class="form-label mt-2">Logo</label>
                                <img class="w-15" id="oldimges" src="{{ asset('images/default.jpg') }}"/>
                                <input oninput="updatePreviewe(this)" type="file" class="form-control" id="GuardianImageUpdate">

                                <select class="form-select" id="StudentStatusUpdate" aria-label="Default select example">
                                    <option selected>Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="InActive">InActive</option>
                                </select>

                                <input class="d-none" id="updateID">
                            </div>
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

    async function updatePreviews(input, imageUrl) {
        const oldmgs = document.getElementById('oldmgs');

        if (input.files && input.files[0]) {
            oldmgs.src = window.URL.createObjectURL(input.files[0]);
        } else if (imageUrl) {
            oldmgs.src = imageUrl;
        } else {
            oldmgs.src = "{{ asset('images/default.jpg') }}";
        }
    }

    async function updatePreviewe(input, imageUrl) {
        const oldimges = document.getElementById('oldimges');

        if (input.files && input.files[0]) {
            oldimges.src = window.URL.createObjectURL(input.files[0]);
        } else if (imageUrl) {
            oldimges.src = imageUrl;
        } else {
            oldimges.src = "{{ asset('images/default.jpg') }}";
        }
    }

    async function FillUpUpdateForm(id) {
        try {
            document.getElementById('updateID').value = id;
            showLoader();
            let res = await axios.post("/gradian-info-by-id", { id: id.toString() }, HeaderToken());
            hideLoader();

            let data = res.data.rows;
            // Update the preview with the existing image URL
            updatePreview(document.getElementById('FatherImageUpdate'), data.father_image);
            updatePreviews(document.getElementById('MotherImageUpdate'), data.mother_image);
            updatePreviewe(document.getElementById('GuardianImageUpdate'), data.guardian_image);

            document.getElementById('StudentIDUpdate').value = data.student_id;
            document.getElementById('FatherNameUpdate').value = data.father_name;
            document.getElementById('MotherNameUpdate').value = data.mother_name;
            document.getElementById('GuardianNameUpdate').value = data.guardian_name;
            document.getElementById('GuardianEmailUpdate').value = data.guardian_email;
            document.getElementById('FatherMobileUpdate').value = data.father_mobile;
            document.getElementById('MotherMobileUpdate').value = data.mother_mobile;
            document.getElementById('GuardianMobileUpdate').value = data.guardian_mobile;
            document.getElementById('GuardianAddressUpdate').value = data.guardian_address;
            document.getElementById('FatherProfessionUpdate').value = data.father_profession;
            document.getElementById('MotherProfessionUpdate').value = data.mother_profession;
            document.getElementById('GuardianProfessionUpdate').value = data.guardian_profession;
            document.getElementById('GuardianRelationUpdate').value = data.guardian_relation;
            document.getElementById('StudentStatusUpdate').value = data.status;

        } catch (e) {
            unauthorized(e.response.status);
        }
    }

    async function Update() {
        try {
            let FatherImageUpdate = document.getElementById('FatherImageUpdate').files[0];
            let MotherImageUpdate = document.getElementById('MotherImageUpdate').files[0];
            let GuardianImageUpdate = document.getElementById('GuardianImageUpdate').files[0];
            const StudentIDUpdate = document.getElementById('StudentIDUpdate').value;
            const FatherNameUpdate = document.getElementById('FatherNameUpdate').value;
            const MotherNameUpdate = document.getElementById('MotherNameUpdate').value;
            const GuardianNameUpdate = document.getElementById('GuardianNameUpdate').value;
            const GuardianEmailUpdate = document.getElementById('GuardianEmailUpdate').value;
            const FatherMobileUpdate = document.getElementById('FatherMobileUpdate').value;
            const MotherMobileUpdate = document.getElementById('MotherMobileUpdate').value;
            const GuardianMobileUpdate = document.getElementById('GuardianMobileUpdate').value;
            const GuardianAddressUpdate = document.getElementById('GuardianAddressUpdate').value;
            const FatherProfessionUpdate = document.getElementById('FatherProfessionUpdate').value;
            const MotherProfessionUpdate = document.getElementById('MotherProfessionUpdate').value;
            const GuardianProfessionUpdate = document.getElementById('GuardianProfessionUpdate').value;
            const GuardianRelationUpdate = document.getElementById('GuardianRelationUpdate').value;
            const StudentStatusUpdate = document.getElementById('StudentStatusUpdate').value;
            let updateID = document.getElementById('updateID').value;

            document.getElementById('update-modal-close').click();

            let formData = new FormData();
            formData.append('father_image', FatherImageUpdate);
            formData.append('mother_image', MotherImageUpdate);
            formData.append('guardian_image', GuardianImageUpdate);
            formData.append('student_id', StudentIDUpdate);
            formData.append('father_name', FatherNameUpdate);
            formData.append('mother_name', MotherNameUpdate);
            formData.append('guardian_name', GuardianNameUpdate);
            formData.append('guardian_email', GuardianEmailUpdate);
            formData.append('father_mobile', FatherMobileUpdate);
            formData.append('mother_mobile', MotherMobileUpdate);
            formData.append('guardian_mobile', GuardianMobileUpdate);
            formData.append('guardian_address', GuardianAddressUpdate);
            formData.append('father_profession', FatherProfessionUpdate);
            formData.append('mother_profession', MotherProfessionUpdate);
            formData.append('guardian_profession', GuardianProfessionUpdate);
            formData.append('guardian_relation', GuardianRelationUpdate);
            formData.append('status', StudentStatusUpdate);
            formData.append('id', updateID);

            const config = {
            headers: {
                'content-type': 'multipart/form-data',
                ...HeaderToken().headers
            }
        };

        showLoader();

        let res = await axios.post("/update-gradian-info", formData, config);
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




