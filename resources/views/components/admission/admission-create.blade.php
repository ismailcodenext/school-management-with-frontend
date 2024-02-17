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
                                <label class="form-label">Birth Certificate No *</label>
                                <input type="text" class="form-control" id="StudentBCNumber">
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
                                <br/>
                                <img class="w-15" id="studentnewImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Student Photo</label>
                                <input oninput="studentnewImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="student_img_url">
                            </div>
                            {{-- Gradient Information--}}
                            <div class="col-6 p-1">
                            <h6 class="modal-title" id="exampleModalLabel">Gradient Information:</h6>
                                <label class="form-label">Gradient Name *</label>
                                <input type="text" class="form-control" id="GradientName">
                                <label for="startDate">Relation</label>
                                <input id="GradientRelation" class="form-control" type="text" />
                                <label class="form-label">Father Name *</label>
                                <input type="text" class="form-control" id="GradientFatherName">
                                <label class="form-label">Mother Name *</label>
                                <input type="text" class="form-control" id="GradientMotherName">
                                <label class="form-label">Occupation *</label>
                                <input type="text" class="form-control" id="GradientOccupation">
                                <label class="form-label">Income *</label>
                                <input type="text" class="form-control" id="GradientIncome">
                                <label class="form-label">Education Optional*</label>
                                <input type="text" class="form-control" id="GradientEducationOptional">
                                <label class="form-label">Email Optional*</label>
                                <input type="text" class="form-control" id="GradientEmailOptional">
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="GradientMobile">
                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" id="GradientAddress">
                                <label class="form-label">City*</label>
                                <input type="text" class="form-control" id="GradientCity">
                                <label class="form-label">State*</label>
                                <input type="text" class="form-control" id="GradientState">
                                <br/>
                                <img class="w-15" id="gradiatnewImg" src="{{asset('images/default.jpg')}}"/>
                                <br/>
                                <label class="form-label">Gradient Photo</label>
                                <input oninput="gradiatnewImg.src=window.URL.createObjectURL(this.files[0])" type="file" class="form-control" id="gradient_img_url">
                            </div>

                            {{---Academic Information Data--}}
                            <div class="col-6 p-1 mt-3">
                                <h6 class="modal-title" id="exampleModalLabel">Academic Information:</h6>
                                <label class="form-label">Institute Name *</label>
                                <input type="text" class="form-control" id="AcademicInstituteName">
                                <label class="form-label">Admission Date *</label>
                                <input type="date" class="form-control" id="AcademicAdmissionDate">
                                <label class="form-label">Roll No *</label>
                                <input type="text" class="form-control" id="AcademicRollNumber">
                                <label class="form-label">Class Name *</label>
                                <select class="form-select" id="AcademicClassName" aria-label="Default select example">
                                    <option value="">Select Class</option>
                                </select>

                                <label class="form-label">Section Name *</label>
                                <select class="form-select" id="AcademicSectionName" aria-label="Default select example">
                                    <option value="">Section Name</option>
                                </select>
                                <label class="form-label">Group Name *</label>
                                <select class="form-select" id="AcademicGroupName" aria-label="Default select example">
                                    <option value="">Select Group</option>
                                </select>
                            </div>
                            <div class="col-6 p-1 mt-3">
                            <h6 class="modal-title" id="exampleModalLabel">Previous Institute Information:</h6>
                                <label class="form-label">Previous Institute Name *</label>
                                <input type="text" class="form-control" id="PrvInstituteName">
                                <label for="ClassName">Previous Class Name</label>
                                <input id="PrvClassName" class="form-control" />
                                <label class="form-label">Years *</label>
                                <input type="text" class="form-control" id="PrvInstituteYears">
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

    FillClassNameDropDown();
    async function FillClassNameDropDown(){
        let res = await axios.get("/list-class",HeaderToken())
        res.data['classData'].forEach(function (item,i) {
            let option=`<option value="${item['id']}">${item['class_name']}</option>`
            $("#AcademicClassName").append(option);
        })
    }

    FillSectionNameDropDown();
    async function FillSectionNameDropDown(){
        let res = await axios.get("/list-section",HeaderToken())
        res.data['section_data'].forEach(function (item,i) {
            let option=`<option value="${item['id']}">${item['section_name']}</option>`
            $("#AcademicSectionName").append(option);
        })
    }

    FillGroupNameDropDown();
    async function FillGroupNameDropDown(){
        let res = await axios.get("/list-group",HeaderToken())
        res.data['group_data'].forEach(function (item,i) {
            let option=`<option value="${item['id']}">${item['group_name']}</option>`
            $("#AcademicGroupName").append(option);
        })
    }



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
            let imgInput = document.getElementById('student_img_url');


// Check if a file is selected for student photo
            let studentImgFiles = imgInput.files[0];




            // Get values from the form - Gradient Information
            let GradientName = document.getElementById('GradientName').value;
            let GradientRelation = document.getElementById('GradientRelation').value;
            let GradientFatherName = document.getElementById('GradientFatherName').value;
            let GradientMotherName = document.getElementById('GradientMotherName').value;
            let GradientOccupation = document.getElementById('GradientOccupation').value;
            let GradientIncome = document.getElementById('GradientIncome').value;
            let GradientEducationOptional = document.getElementById('GradientEducationOptional').value;
            let GradientEmailOptional = document.getElementById('GradientEmailOptional').value;
            let GradientMobile = document.getElementById('GradientMobile').value;
            let GradientAddress = document.getElementById('GradientAddress').value;
            let GradientCity = document.getElementById('GradientCity').value;
            let GradientState = document.getElementById('GradientState').value;
            let imgInputs = document.getElementById('gradient_img_url');

            // Check if a file is selected for gradient photo
            let gradientImgFile = imgInputs.files[0];



            // Get values from the form - Academic Information
            let AcademicInstituteName = document.getElementById('AcademicInstituteName').value;
            let AcademicAdmissionDate = document.getElementById('AcademicAdmissionDate').value;
            let AcademicRollNumber = document.getElementById('AcademicRollNumber').value;
            let AcademicClassName = document.getElementById('AcademicClassName').value;
            let AcademicSectionName = document.getElementById('AcademicSectionName').value;
            let AcademicGroupName = document.getElementById('AcademicGroupName').value;


            // Get values from the form - Previous Information
            let PrvInstituteName = document.getElementById('PrvInstituteName').value;
            let PrvClassName = document.getElementById('PrvClassName').value;
            let PrvInstituteYears = document.getElementById('PrvInstituteYears').value;

            // Prepare data for submission
            let formData = new FormData();
            // Append Student Information data
            formData.append('first_name', StudentFirstName);
            formData.append('last_name', StudentLastName);
            formData.append('dob', StudentDOB);
            formData.append('gender',StudentGender);
            formData.append('blood_group',StudentBlood);
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
            formData.append('img_student', studentImgFiles);





            // Append Gradient Information data
            formData.append('guardian_name', GradientName);
            formData.append('relation', GradientRelation);
            formData.append('father_name', GradientFatherName);
            formData.append('mother_name', GradientMotherName);
            formData.append('occupation', GradientOccupation);
            formData.append('income', GradientIncome);
            formData.append('education', GradientEducationOptional);
            formData.append('email', GradientEmailOptional);
            formData.append('mobile', GradientMobile);
            formData.append('address', GradientAddress);
            formData.append('city', GradientCity);
            formData.append('state', GradientState);
            formData.append('img_gradient', gradientImgFile);



            // Append Academic Information data
            formData.append('institute_name', AcademicInstituteName);
            formData.append('admisstion_date', AcademicAdmissionDate);
            formData.append('roll_no', AcademicRollNumber);
            formData.append('class_name', AcademicClassName);
            formData.append('section_name', AcademicSectionName);
            formData.append('group_name', AcademicGroupName);

            // Append Previous Institute Information data
            formData.append('institute_names', PrvInstituteName);
            formData.append('class_name', PrvClassName);
            formData.append('years', PrvInstituteYears);



            // Make the API request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/create-admission", formData, config);
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



