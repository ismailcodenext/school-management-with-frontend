<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-box modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="font-size: 25px;" id="exampleModalLabel">Add New Student Admission</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <h6 class="modal-title" id="exampleModalLabel">Student Information:</h6>
                            <div  class="col-4 p-1">
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="StudentFirstName">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="StudentLastName">
                                <label for="startDate">Date of Birth</label>
                                <input type="date" class="form-control" id="StudentDOB" />
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="StudentMobile">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="StudentEmail">
                                <label class="form-label">Mother Tongue *</label>
                                <input type="text" class="form-control" id="StudentMotherTongu">
                                <br/>
                                <img class="w-15" id="studentnewImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Student Photo</label>
                                <input oninput="studentnewImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="student_img_url">

                            </div>
                            <div  class="col-4 p-1">
                                <label class="form-label">Birth Certificate No *</label>
                                <input type="text" class="form-control" id="StudentBCNumber">
                                <label class="form-label">Admission Date *</label>
                                <input type="date" class="form-control" id="AdmissionDate">
                                <label class="form-label">NID No *</label>
                                <input type="text" class="form-control" id="StudentNIDNumber">
                                <label class="form-label">Present Address *</label>
                                <input type="text" class="form-control" id="StudentPresentAddress">
                                <label class="form-label">Permanent Address *</label>
                                <input type="text" class="form-control" id="StudentPermanentAddress">
                                <label class="form-label">City *</label>
                                <input type="text" class="form-control" id="StudentCity">
                                <label class="form-label">State *</label>
                                <input type="text" class="form-control" id="StudentState">

                            </div>
                            <div  class="col-4 p-1">
                                <label class="form-label"> Category *</label>
                                <select class="form-select" id="StudentCategory" aria-label="Default select example">
                                    <option selected>Select Category</option>
                                    <option value="Regular">Regular</option>
                                    <option value="Eregular">Eregular</option>
                                </select>
                                <label class="form-label"> Gender *</label>
                                <select class="form-select" id="StudentGender" aria-label="Default select example">
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Religion *</label>
                                <select class="form-select" id="StudentReligion" aria-label="Default select example">
                                    <option selected>Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Blood Group *</label>
                                <select class="form-select" id="StudentBlood" aria-label="Default select example">
                                    <option selected>Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                                <label class="form-label">Permanent Address *</label>
                                <input type="text" class="form-control" id="StudentPermanentAddress">
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

            // Get values from the form - Student Information
            let StudentFirstName = document.getElementById('StudentFirstName').value;
            let StudentLastName = document.getElementById('StudentLastName').value;
            let StudentDOB = document.getElementById('StudentDOB').value;
            let StudentMobile = document.getElementById('StudentMobile').value;
            let StudentEmail = document.getElementById('StudentEmail').value;
            let StudentMotherTongu = document.getElementById('StudentMotherTongu').value;
            let StudentBCNumber = document.getElementById('StudentBCNumber').value;
            let StudentNIDNumber = document.getElementById('StudentNIDNumber').value;
            let StudentPresentAddress = document.getElementById('StudentPresentAddress').value;
            let StudentPermanentAddress = document.getElementById('StudentPermanentAddress').value;
            let StudentCity = document.getElementById('StudentCity').value;
            let StudentState = document.getElementById('StudentState').value;
            let StudentGender = document.getElementById('StudentGender').value;
            let StudentReligion = document.getElementById('StudentReligion').value;
            let StudentBlood = document.getElementById('StudentBlood').value;
            let AdmissionDate = document.getElementById('AdmissionDate').value;
            let StudentCategory = document.getElementById('StudentCategory').value;
            let StudentStatus = document.getElementById('StudentStatus').value;
            let imgInput = document.getElementById('student_img_url');


// Check if a file is selected for student photo
            let studentImgFiles = imgInput.files[0];


            // Prepare data for submission
            let formData = new FormData();
            // Append Student Information data
            formData.append('first_name', StudentFirstName);
            formData.append('last_name', StudentLastName);
            formData.append('dob', StudentDOB);
            formData.append('gender',StudentGender);
            formData.append('blood_group',StudentBlood);
            formData.append('admission_date',AdmissionDate);
            formData.append('religion',StudentReligion);
            formData.append('mobile', StudentMobile);
            formData.append('email',StudentEmail);
            formData.append('mother_tongue', StudentMotherTongu);
            formData.append('bc_no', StudentBCNumber);
            formData.append('nid_no',StudentNIDNumber);
            formData.append('present_address',StudentPresentAddress);
            formData.append('permanent_address',StudentPermanentAddress);
            formData.append('city',StudentCity);
            formData.append('state',StudentState);
            formData.append('category',StudentCategory);
            formData.append('status',StudentStatus);
            formData.append('img_student', studentImgFiles);




            // Make the API request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/create-student-info", formData, config);
            hideLoader();

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();  // Assuming you have a function to refresh the list
            } else {
                errorToast(res.data['message'])
            }

        } catch (e) {
            unauthorized(e.response.status)
        }
    }
</script>



