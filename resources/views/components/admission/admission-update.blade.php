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
                            <div class="col-6 p-1">
                                <h6 class="modal-title" id="exampleModalLabel">Student Information:</h6>
                                <label class="form-label">First Name *</label>
                                <input type="text" class="form-control" id="StudentFirstNameUpdate">
                                <label class="form-label">Last Name *</label>
                                <input type="text" class="form-control" id="StudentLastNameUpdate">
                                <label for="startDate">Date of Birth</label>
                                <input type="date" class="form-control" id="StudentDOBUpdate" />
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="StudentMobileUpdate">
                                <label class="form-label">Email *</label>
                                <input type="text" class="form-control" id="StudentEmailUpdate">
                                <label class="form-label">Mother Tongue *</label>
                                <input type="text" class="form-control" id="StudentMotherTonguUpdate">
                                <label class="form-label">Birth Certificate No *</label>
                                <input type="text" class="form-control" id="StudentBCNumberUpdate">
                                <label class="form-label">NID No *</label>
                                <input type="text" class="form-control" id="StudentNIDNumberUpdate">
                                <label class="form-label">Present Address *</label>
                                <input type="text" class="form-control" id="StudentPresentAddressUpdate">
                                <label class="form-label">Permanent Address *</label>
                                <input type="text" class="form-control" id="StudentPermanentAddressUpdate">
                                <label class="form-label">City *</label>
                                <input type="text" class="form-control" id="StudentCityUpdate">
                                <label class="form-label">State *</label>
                                <input type="text" class="form-control" id="StudentStateUpdate">
                                <label class="form-label"> Gender *</label>
                                <select class="form-select" id="StudentGenderUpdate" aria-label="Default select example">
                                    <option selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Religion *</label>
                                <select class="form-select" id="StudentReligionUpdate" aria-label="Default select example">
                                    <option selected>Select Religion</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Others">Others</option>
                                </select>
                                <label class="form-label">Blood Group *</label>
                                <select class="form-select" id="StudentBloodUpdate" aria-label="Default select example">
                                    <option selected>Select Blood Group</option>
                                    <option value="A+">A+</option>
                                    <option value="AB+">AB+</option>
                                    <option value="B+">B+</option>
                                    <option value="O+">O+</option>
                                    <option value="O-">O-</option>
                                </select>
                               
                                <br/>
                                <img class="w-15" id="studentoldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label mt-2">Student Photo</label>
                                <input oninput="updatePreviewstudent(this)" type="file" class="form-control" id="student_img_urlUpdate">
                                

                            </div>
                            {{-- Gradient Information--}}
                            <div class="col-6 p-1">
                            <h6 class="modal-title" id="exampleModalLabel">Gradient Information:</h6>
                                <label class="form-label">Gradient Name *</label>
                                <input type="text" class="form-control" id="GradientNameUpdate">
                                <label for="startDate">Relation</label>
                                <input class="form-control" type="text" id="GradientRelationUpdate" />
                                <label class="form-label">Father Name *</label>
                                <input type="text" class="form-control" id="GradientFatherNameUpdate">
                                <label class="form-label">Mother Name *</label>
                                <input type="text" class="form-control" id="GradientMotherNameUpdate">
                                <label class="form-label">Occupation *</label>
                                <input type="text" class="form-control" id="GradientOccupationUpdate">
                                <label class="form-label">Income *</label>
                                <input type="text" class="form-control" id="GradientIncomeUpdate">
                                <label class="form-label">Education Optional*</label>
                                <input type="text" class="form-control" id="GradientEducationOptionalUpdate">
                                <label class="form-label">Email Optional*</label>
                                <input type="text" class="form-control" id="GradientEmailOptionalUpdate">
                                <label class="form-label">Mobile *</label>
                                <input type="text" class="form-control" id="GradientMobileUpdate">
                                <label class="form-label">Address *</label>
                                <input type="text" class="form-control" id="GradientAddressUpdate">
                                <label class="form-label">City*</label>
                                <input type="text" class="form-control" id="GradientCityUpdate">
                                <label class="form-label">State*</label>
                                <input type="text" class="form-control" id="GradientState">
                                <br/>
                                <img class="w-15" id="gradintldImg" src="{{ asset('images/default.jpg') }}"/>
                                <br/>
                                <label class="form-label mt-2">Gradient Photo</label>
                                <input oninput="updatePreviewsgradiant(this)" type="file" class="form-control" id="gradient_img_urlUpdate">
                            </div>

                            {{---Academic Information Data--}}
                            <div class="col-6 p-1 mt-3">
                                <h6 class="modal-title" id="exampleModalLabel">Academic Information:</h6>
                                <label class="form-label">Institute Name *</label>
                                <input type="text" class="form-control" id="AcademicInstituteNameUpdate">
                                <label class="form-label">Admission Date *</label>
                                <input type="date" class="form-control" id="AcademicAdmissionDateUpdate">
                                <label class="form-label">Roll No *</label>
                                <input type="text" class="form-control" id="AcademicRollNumberUpdate">
                                <label class="form-label">Class Name *</label>
                                <select class="form-select" id="AcademicClassNameUpdate" aria-label="Default select example">
                                    <option value="">Select Class</option>
                                </select>
                                <label class="form-label">Section Name *</label>
                                <select class="form-select" id="AcademicSectionNameUpdate" aria-label="Default select example">
                                    <option value="">Section Name</option>
                                </select>
                                <label class="form-label">Group Name *</label>
                                <select class="form-select" id="AcademicGroupNameUpdate" aria-label="Default select example">
                                    <option value="">Select Group</option>
                                </select>
                            </div>
                            {{-- Previous Institute Information --}}
                            <div class="col-6 p-1 mt-3">
                            <h6 class="modal-title" id="exampleModalLabel">Previous Institute Information:</h6>
                                <label class="form-label">Previous Institute Name *</label>
                                <input type="text" class="form-control" id="PrvInstituteNameUpdate">
                                <label for="ClassName">Previous Class Name</label>
                                <input id="PrvClassNameUpdate" class="form-control" />
                                <label class="form-label">Years *</label>
                                <input type="text" class="form-control" id="PrvInstituteYearsUpdate">
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


async function updatePreviewstudent(input, imageUrl) {
    const studentoldImg = document.getElementById('studentoldImg');
    
    if (input.files && input.files[0]) {
        studentoldImg.src = window.URL.createObjectURL(input.files[0]);
    } else if (imageUrl) {
        studentoldImg.src = imageUrl;
    } else {
        studentoldImg.src = "{{ asset('images/default.jpg') }}";
    }
}
async function updatePreviewsgradiant(input, imageUrl) {
    const gradintldImg = document.getElementById('gradintldImg');
    
    if (input.files && input.files[0]) {
        gradintldImg.src = window.URL.createObjectURL(input.files[0]);
    } else if (imageUrl) {
        gradintldImg.src = imageUrl;
    } else {
        gradintldImg.src = "{{ asset('images/default.jpg') }}";
    }
}


async function FillUpUpdateForm(id) {
    try {
        document.getElementById('updateID').value = id;
        showLoader();
        let res = await axios.post("/by-id-admission", { id: id.toString() }, HeaderToken());
        hideLoader();


        //-------- Student Information Data Update ----------------- 
        let data = res.data.rows;
        document.getElementById('StudentFirstNameUpdate').value = data.first_name;
        document.getElementById('StudentLastNameUpdate').value = data.last_name;
        document.getElementById('StudentDOBUpdate').value = data.dob;
        document.getElementById('StudentMobileUpdate').value = data.mobile;
        document.getElementById('StudentEmailUpdate').value = data.email;
        document.getElementById('StudentMotherTonguUpdate').value = data.mother_tongue;
        document.getElementById('StudentBCNumberUpdate').value = data.bc_no;
        document.getElementById('StudentNIDNumberUpdate').value = data.nid_no;
        document.getElementById('StudentPresentAddressUpdate').value = data.permanent_address;
        document.getElementById('StudentPermanentAddressUpdate').value = data.present_address;
        document.getElementById('StudentCityUpdate').value = data.city;
        document.getElementById('StudentStateUpdate').value = data.state;
        document.getElementById('StudentGenderUpdate').value = data.gender;
        document.getElementById('StudentReligionUpdate').value = data.religion;
        document.getElementById('StudentBloodUpdate').value = data.blood_group;
        // Update the preview with the existing image URL
        updatePreviewstudent(document.getElementById('student_img_urlUpdate'), data.img_url);


            //-------- Gradiant Information Data Update ----------------- 

        document.getElementById('GradientNameUpdate').value = data.guardian_name;
        document.getElementById('GradientRelationUpdate').value = data.relation;
        document.getElementById('GradientFatherNameUpdate').value = data.father_name;
        document.getElementById('GradientMotherNameUpdate').value = data.mother_name;
        document.getElementById('GradientOccupationUpdate').value = data.occupation;
        document.getElementById('GradientIncomeUpdate').value = data.income;
        document.getElementById('GradientEducationOptionalUpdate').value = data.education;
        document.getElementById('GradientEmailOptionalUpdate').value = data.email;
        document.getElementById('GradientMobileUpdate').value = data.mobile;
        document.getElementById('GradientAddressUpdate').value = data.address;
        document.getElementById('GradientCityUpdate').value = data.city;
        document.getElementById('GradientState').value = data.state;
        // Update the preview with the existing image URL
        updatePreviewsgradiant(document.getElementById('gradient_img_urlUpdate'), data.img_url);


            //-------- Academic Information Data Update ----------------- 

        document.getElementById('AcademicInstituteNameUpdate').value = data.institute_name;
        document.getElementById('AcademicAdmissionDateUpdate').value = data.admisstion_date;
        document.getElementById('AcademicRollNumberUpdate').value = data.roll_no;
        document.getElementById('AcademicClassNameUpdate').value = data.class_name;
        document.getElementById('AcademicSectionNameUpdate').value = data.section_name;
        document.getElementById('AcademicGroupNameUpdate').value = data.group_name;


            //-------- Previous Information Data Update ----------------- 

        document.getElementById('PrvInstituteNameUpdate').value = data.institute_names;
        document.getElementById('PrvClassNameUpdate').value = data.class_name;
        document.getElementById('PrvInstituteYearsUpdate').value = data.years;

    } catch (e) {
        unauthorized(e.response.status);
    }
}




    async function Update() {
        try {

             //-------- Student Information Data Update ----------------- 

            let StudentFirstNameUpdate = document.getElementById('StudentFirstNameUpdate').value;
            let StudentLastNameUpdate = document.getElementById('StudentLastNameUpdate').value;
            let StudentDOBUpdate = document.getElementById('StudentDOBUpdate').value;
            let StudentMobileUpdate = document.getElementById('StudentMobileUpdate').value;
            let StudentEmailUpdate = document.getElementById('StudentEmailUpdate').value;
            let StudentMotherTonguUpdate = document.getElementById('StudentMotherTonguUpdate').value;
            let StudentBCNumberUpdate = document.getElementById('StudentBCNumberUpdate').value;
            let StudentNIDNumberUpdate = document.getElementById('StudentNIDNumberUpdate').value;
            let StudentPresentAddressUpdate = document.getElementById('StudentPresentAddressUpdate').value;
            let StudentPermanentAddressUpdate = document.getElementById('StudentPermanentAddressUpdate').value;
            let StudentCityUpdate = document.getElementById('StudentCityUpdate').value;
            let StudentStateUpdate = document.getElementById('StudentStateUpdate').value;
            let StudentGenderUpdate = document.getElementById('StudentGenderUpdate').value;
            let StudentReligionUpdate = document.getElementById('StudentReligionUpdate').value;
            let StudentBloodUpdate = document.getElementById('StudentBloodUpdate').value;
            let student_img_urlUpdate = document.getElementById('student_img_urlUpdate').files[0];
            // let updateID = document.getElementById('updateID').value;
            let studentUpdateID = document.getElementById('updateID').value;
            


            //-------- Gradiant Information Data Update ----------------- 

            
            let GradientNameUpdate = document.getElementById('GradientNameUpdate').value;
            let GradientRelationUpdate = document.getElementById('GradientRelationUpdate').value;
            let GradientFatherNameUpdate = document.getElementById('GradientFatherNameUpdate').value;
            let GradientMotherNameUpdate = document.getElementById('GradientMotherNameUpdate').value;
            let GradientOccupationUpdate = document.getElementById('GradientOccupationUpdate').value;
            let GradientIncomeUpdate = document.getElementById('GradientIncomeUpdate').value;
            let GradientEducationOptionalUpdate = document.getElementById('GradientEducationOptionalUpdate').value;
            let GradientEmailOptionalUpdate = document.getElementById('GradientEmailOptionalUpdate').value;
            let GradientMobileUpdate = document.getElementById('GradientMobileUpdate').value;
            let GradientAddressUpdate = document.getElementById('GradientAddressUpdate').value;
            let GradientCityUpdate = document.getElementById('GradientCityUpdate').value;
            let GradientState = document.getElementById('GradientState').value;
            let gradient_img_urlUpdate = document.getElementById('gradient_img_urlUpdate').files[0];
            // let updateID = document.getElementById('updateID').value;


            //-------- Academic Information Data Update ----------------- 
            let AcademicInstituteNameUpdate = document.getElementById('AcademicInstituteNameUpdate').value;
            let AcademicAdmissionDateUpdate = document.getElementById('AcademicAdmissionDateUpdate').value;
            let AcademicRollNumberUpdate = document.getElementById('AcademicRollNumberUpdate').value;
            let AcademicClassNameUpdate = document.getElementById('AcademicClassNameUpdate').value;
            let AcademicSectionNameUpdate = document.getElementById('AcademicSectionNameUpdate').value;
            let AcademicGroupNameUpdate = document.getElementById('AcademicGroupNameUpdate').value;
            // let updateID = document.getElementById('updateID').value;


            //-------- Previous Information Data Update ----------------- 

            let PrvInstituteNameUpdate = document.getElementById('PrvInstituteNameUpdate').value;
            let PrvClassNameUpdate = document.getElementById('PrvClassNameUpdate').value;
            let PrvInstituteYearsUpdate = document.getElementById('PrvInstituteYearsUpdate').value;
            let updateID = document.getElementById('updateID').value;

            document.getElementById('update-modal-close').click();

             //-------- Student Information Data Update ----------------- 

            let formData = new FormData();
            formData.append('first_name', StudentFirstNameUpdate);
            formData.append('last_name', StudentLastNameUpdate);
            formData.append('dob', StudentDOBUpdate);
            formData.append('mobile', StudentMobileUpdate);
            formData.append('email', StudentEmailUpdate);
            formData.append('mother_tongue', StudentMotherTonguUpdate);
            formData.append('bc_no', StudentBCNumberUpdate);
            formData.append('nid_no', StudentNIDNumberUpdate);
            formData.append('permanent_address', StudentPresentAddressUpdate);
            formData.append('present_address', StudentPermanentAddressUpdate);
            formData.append('city', StudentCityUpdate);
            formData.append('state', StudentStateUpdate);
            formData.append('gender', StudentGenderUpdate);
            formData.append('id', updateID);

            //-------- Gradiant Information Data Update ----------------- 

            formData.append('guardian_name', GradientNameUpdate);
            formData.append('relation', GradientRelationUpdate);
            formData.append('father_name', GradientFatherNameUpdate);
            formData.append('mother_name', GradientMotherNameUpdate);
            formData.append('occupation', GradientOccupationUpdate);
            formData.append('income', GradientIncomeUpdate);
            formData.append('education', GradientEducationOptionalUpdate);
            formData.append('email', GradientEmailOptionalUpdate);
            formData.append('mobile', GradientMobileUpdate);
            formData.append('address', GradientAddressUpdate);
            formData.append('city', GradientCityUpdate);
            formData.append('state', GradientState);
            formData.append('img_url', gradient_img_urlUpdate);
            formData.append('id', updateID);

            //-------- Academic Information Data Update ----------------- 

            formData.append('institute_name', AcademicInstituteNameUpdate);
            formData.append('admisstion_date', AcademicAdmissionDateUpdate);
            formData.append('roll_no', AcademicRollNumberUpdate);
            formData.append('class_name', AcademicClassNameUpdate);
            formData.append('section_name', AcademicSectionNameUpdate);
            formData.append('group_name', AcademicGroupNameUpdate);
            formData.append('id', updateID);

            //-------- Previous Information Data Update ----------------- 

            formData.append('institute_names', PrvInstituteNameUpdate);
            formData.append('class_name', PrvClassNameUpdate);
            formData.append('years', PrvInstituteYearsUpdate);
            formData.append('id', updateID);

            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();

let res = await axios.post("/update-admission", formData, config);

hideLoader();

if (res && res.data && res.data.status === "success") {
    successToast(res.data.message);
    let modal = new bootstrap.Modal(document.getElementById('update-modal'));
    modal.hide();
    await getList();
} else {
    errorToast("Failed to update admission. Please try again.");
}

} catch (e) {
console.error('Update error:', e);
unauthorized(e.response && e.response.status);
}
}
</script>
