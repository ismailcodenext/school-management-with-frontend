<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-box modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="font-size: 25px;" id="exampleModalLabel">Add Guardian</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <h6 class="modal-title" id="exampleModalLabel">Student Information:</h6>
                            <div  class="col-3 p-1">
                                <label class="form-label">Student ID *</label>
                                <input type="number" class="form-control" id="StudentID">
                                <label class="form-label">Father Name *</label>
                                <input type="text" class="form-control" id="FatherName">
                                <label class="form-label">Mother Name *</label>
                                <input type="text" class="form-control" id="MotherName">
                                <label class="form-label">Guardian name *</label>
                                <input type="text" class="form-control" id="GuardianName">
                                <label class="form-label">Guardian email *</label>
                                <input type="text" class="form-control" id="GuardianEmail">
                            </div>
                            <div  class="col-3 p-1">
                                <label class="form-label">Father Mobile *</label>
                                <input type="text" class="form-control" id="FatherMobile">
                                <label class="form-label">Mother Mobile *</label>
                                <input type="text" class="form-control" id="MotherMobile">
                                <label class="form-label">Guardian mobile *</label>
                                <input type="text" class="form-control" id="GuardianMobile">
                                <label class="form-label">Guardian address *</label>
                                <input type="text" class="form-control" id="GuardianAddress">
                            </div>
                            <div  class="col-3 p-1">
                                <label class="form-label">Father profession *</label>
                                <input type="text" class="form-control" id="FatherProfession">
                                <label class="form-label">Mother profession *</label>
                                <input type="text" class="form-control" id="MotherProfession">
                                <label class="form-label">Guardian profession *</label>
                                <input type="text" class="form-control" id="GuardianProfession">
                                <label class="form-label">Guardian Relation *</label>
                                <input type="text" class="form-control" id="GuardianRelation">
                            </div>
                            <div  class="col-3 p-1">
                                <label class="form-label">Father image</label>
                                <input oninput="previewImage('FatherImagePreview', this)" type="file" class="form-control" id="FatherImage">
                                <img id="FatherImagePreview" src="#" alt="Father Image" style="display: none; max-width: 100px; max-height: 100px; margin-top: 5px;">
                                <label class="form-label">Mother image</label>
                                <input oninput="previewImage('MotherImagePreview', this)" type="file" class="form-control" id="MotherImage">
                                <img id="MotherImagePreview" src="#" alt="Mother Image" style="display: none; max-width: 100px; max-height: 100px; margin-top: 5px;">
                                <label class="form-label">Guardian image</label>
                                <input oninput="previewImage('GuardianImagePreview', this)" type="file" class="form-control" id="GuardianImage">
                                <img id="GuardianImagePreview" src="#" alt="Guardian Image" style="display: none; max-width: 100px; max-height: 100px; margin-top: 5px;">
                                <label class="form-label">Status *</label>
                                <select class="form-select" id="StudentStatus" aria-label="Default select example">
                                    <option selected>Select Status</option>
                                    <option value="Active">Active</option>
                                    <option value="InActive">InActive</option>
                                </select>
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
            // Get form field values
            const StudentID = document.getElementById('StudentID').value;
            const FatherName = document.getElementById('FatherName').value;
            const MotherName = document.getElementById('MotherName').value;
            const GuardianName = document.getElementById('GuardianName').value;
            const GuardianEmail = document.getElementById('GuardianEmail').value;
            const FatherMobile = document.getElementById('FatherMobile').value;
            const MotherMobile = document.getElementById('MotherMobile').value;
            const GuardianMobile = document.getElementById('GuardianMobile').value;
            const GuardianAddress = document.getElementById('GuardianAddress').value;
            const FatherProfession = document.getElementById('FatherProfession').value;
            const MotherProfession = document.getElementById('MotherProfession').value;
            const GuardianProfession = document.getElementById('GuardianProfession').value;
            const GuardianRelation = document.getElementById('GuardianRelation').value;

            // Validate required fields
            if (!StudentID || !FatherName || !MotherName || !GuardianName || !GuardianEmail || !FatherMobile || !MotherMobile || !GuardianMobile || !GuardianAddress || !FatherProfession || !MotherProfession || !GuardianProfession || !GuardianRelation) {
                alert("Please fill in all required fields.");
                return;
            }

            // Get image files
            const FatherImage = document.getElementById('FatherImage').files[0];
            const MotherImage = document.getElementById('MotherImage').files[0];
            const GuardianImage = document.getElementById('GuardianImage').files[0];

            // Get student status
            const StudentStatus = document.getElementById('StudentStatus').value;

            // Prepare form data
            const formData = new FormData();
            formData.append('student_id', StudentID);
            formData.append('father_name', FatherName);
            formData.append('mother_name', MotherName);
            formData.append('guardian_name', GuardianName);
            formData.append('guardian_email', GuardianEmail);
            formData.append('father_mobile', FatherMobile);
            formData.append('mother_mobile', MotherMobile);
            formData.append('guardian_mobile', GuardianMobile);
            formData.append('guardian_address', GuardianAddress);
            formData.append('father_profession', FatherProfession);
            formData.append('mother_profession', MotherProfession);
            formData.append('guardian_profession', GuardianProfession);
            formData.append('guardian_relation', GuardianRelation);
            formData.append('father_image', FatherImage);
            formData.append('mother_image', MotherImage);
            formData.append('guardian_image', GuardianImage);
            formData.append('status', StudentStatus);

            const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers
                    }
                }
            // Submit form
            showLoader();
            let res = await axios.post("/create-gradian-info", formData, config);
            hideLoader();

            // Handle response
            if (res.data.status === "success") {
                successToast(res.data.message);
                document.getElementById("save-form").reset();
                await getList();
            } else {
                errorToast(res.data.message);
            }
        } catch (error) {
            console.error(error);
            unauthorized(error.response.status);
        }
    }

    function previewImage(imageId, input) {
        const preview = document.getElementById(imageId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "#";
            preview.style.display = 'none';
        }
    }
</script>




{{-- <script>
    async function Save() {
        try {
            let StudentID = document.getElementById('StudentID').value;
            let FatherName = document.getElementById('FatherName').value;
            let MotherName = document.getElementById('MotherName').value;
            let GuardianName = document.getElementById('GuardianName').value;
            let GuardianEmail = document.getElementById('GuardianEmail').value;
            let FatherMobile = document.getElementById('FatherMobile').value;
            let MotherMobile = document.getElementById('MotherMobile').value;
            let GuardianMobile = document.getElementById('GuardianMobile').value;
            let GuardianAddress = document.getElementById('GuardianAddress').value;
            let FatherProfession = document.getElementById('FatherProfession').value;
            let MotherProfession = document.getElementById('MotherProfession').value;
            let GuardianProfession = document.getElementById('GuardianProfession').value;
            let GuardianRelation = document.getElementById('GuardianRelation').value;

            let FatherImage = document.getElementById('FatherImage');
            let MotherImage = document.getElementById('MotherImage');
            let GuardianImage = document.getElementById('GuardianImage');

            let StudentStatus = document.getElementById('StudentStatus').value;


            
            let FatherImageFile = FatherImage.files[0];
            let MotherImageFile = MotherImage.files[0];
            let GuardianImageFile = GuardianImage.files[0];




            let formData = new FormData();
            formData.append('student_id', StudentID);
            formData.append('father_name', FatherName);
            formData.append('mother_name', MotherName);
            formData.append('guardian_name', GuardianName);
            formData.append('guardian_email', GuardianEmail);
            formData.append('father_mobile', FatherMobile);
            formData.append('mother_mobile', MotherMobile);
            formData.append('guardian_mobile', GuardianMobile);
            formData.append('guardian_address', GuardianAddress);
            formData.append('father_profession', FatherProfession);
            formData.append('mother_profession', MotherProfession);
            formData.append('guardian_profession', GuardianProfession);
            formData.append('guardian_relation', GuardianRelation);
            formData.append('father_image', FatherImageFile);
            formData.append('mother_image', MotherImageFile);
            formData.append('guardian_image', GuardianImageFile);
            formData.append('status', StudentStatus);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                }
            };

            showLoader();
            let res = await axios.post("/create-gradian-info", formData, config);
            hideLoader();

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                    document.getElementById("save-form").reset();
                    await getList();
            } else {
                errorToast(res.data['message']);
            }

        } catch (e) {
            unauthorized(e.response.status)
        }
    }

    function previewImage(imageId, input) {
        const preview = document.getElementById(imageId);
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "#";
            preview.style.display = 'none';
        }
    }
</script> --}}
