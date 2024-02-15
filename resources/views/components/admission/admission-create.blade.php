<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-box modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="font-size: 25px;" id="exampleModalLabel">Create New Student Admission</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-6 p-1">
                                <h6 class="modal-title" id="exampleModalLabel">Student Information:</h6>
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="FirstName">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="LastName">
                                <label for="startDate">Date of Birth</label>
                                <input type="date" class="form-control" id="dateOfBirt" />
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="Mobile">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="Email">
                                <label class="form-label">Mother Tongue *</label>
                                <input type="text" class="form-control" id="MotherTongu">
                                <label class="form-label">Birth Certificate No *</label>
                                <input type="text" class="form-control" id="BCNumber">
                                <label class="form-label">NID No *</label>
                                <input type="text" class="form-control" id="NIDNumber">
                                <label class="form-label">Present Address *</label>
                                <input type="text" class="form-control" id="PresentAddress">
                                <label class="form-label">Permanent Address *</label>
                                <input type="text" class="form-control" id="PermanentAddress">
                                <label class="form-label">City *</label>
                                <input type="text" class="form-control" id="City">
                                <label class="form-label">State *</label>
                                <input type="text" class="form-control" id="State">
                                <label class="form-label"> Gender *</label>
                                <select class="form-select" id="Gender" aria-label="Default select example">
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Religion *</label>
                                <select class="form-select" id="Religion" aria-label="Default select example">
                                    <option selected>Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Blood Group *</label>
                                <select class="form-select" id="Blood" aria-label="Default select example">
                                    <option selected>Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Student Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="img_url">
                            </div>

                            <div class="col-6 p-1">
                            <h6 class="modal-title" id="exampleModalLabel">Gradient Information:</h6>
                                <label class="form-label">Gradient Name *</label>
                                <input type="text" class="form-control" id="GradientName">
                                <label for="startDate">Relation</label>
                                <input id="startDate" class="form-control" type="Relation" />
                                <label class="form-label">Father Name *</label>
                                <input type="text" class="form-control" id="FatherName">
                                <label class="form-label">Mother Name *</label>
                                <input type="text" class="form-control" id="MotherName">
                                <label class="form-label">Occupation *</label>
                                <input type="text" class="form-control" id="Occupation">
                                <label class="form-label">Income *</label>
                                <input type="text" class="form-control" id="GradientIncome">
                                <label class="form-label">Education Optional*</label>
                                <input type="text" class="form-control" id="EducationOptional">
                                <label class="form-label">Email Optional*</label>
                                <input type="text" class="form-control" id="EmailOptional">
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="GradientMobile">
                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" id="GradientAddress">
                                <label class="form-label">City*</label>
                                <input type="text" class="form-control" id="GradientCity">
                                <label class="form-label">State*</label>
                                <input type="text" class="form-control" id="GradientState">
                                <br/>
                                <img class="w-15" id="newImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Gradient Photo</label>
                                <input oninput="newImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="img_url">
                            </div>
                            <div class="col-6 p-1 mt-3">
                                <h6 class="modal-title" id="exampleModalLabel">Academic Information:</h6>
                                <label class="form-label">Institute Name *</label>
                                <input type="text" class="form-control" id="InstituteName">
                                <label class="form-label">Admission Date *</label>
                                <input type="date" class="form-control" id="AdmissionDate">
                                <label class="form-label">Roll No *</label>
                                <input type="text" class="form-control" id="RollNumber">
                            </div>
                            <div class="col-6 p-1 mt-3">
                            <h6 class="modal-title" id="exampleModalLabel">Previous Institute Information:</h6>
                                <label class="form-label">Institute Name *</label>
                                <input type="text" class="form-control" id="InstituteName">
                                <label for="startDate">Class Name</label>
                                <input id="startDate" class="form-control" type="ClassName" />
                                <label class="form-label">Years *</label>
                                <input type="text" class="form-control" id="Years">
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
            let heroSliderTitle = document.getElementById('heroSliderTitle').value;
            let heroSliderSubTitle = document.getElementById('heroSliderSubTitle').value;
            let imgInput = document.getElementById('img_url');

            // Check if a file is selected
            if (!imgInput.files || imgInput.files.length === 0) {
                errorToast("Photo Required !");
                return;
            }

            let imgFile = imgInput.files[0];

            if (heroSliderTitle.length === 0 || heroSliderSubTitle.length === 0) {
                errorToast("All fields are required!");
            } else {
                document.getElementById('modal-close').click();

                let formData = new FormData();
                formData.append('heroSliderTitle', heroSliderTitle);
                formData.append('heroSliderSubTitle', heroSliderSubTitle);
                formData.append('img', imgFile); // Append the file, not the file URL

                const config = {
                    headers: {
                        'content-type': 'multipart/form-data',
                        ...HeaderToken().headers // Include headers from HeaderToken function
                    }
                }

                showLoader();
                let res = await axios.post("/create-hero-slider", formData, config);
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
