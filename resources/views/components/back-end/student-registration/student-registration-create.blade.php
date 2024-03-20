<div class="modal animated zoomIn" id="create-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-box modal-dialog-centered modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" style="font-size: 25px;" id="exampleModalLabel">Create Student Registration</h6>
            </div>
            <div class="modal-body">
                <form id="save-form">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 p-1 mt-3">
                                <h6 class="modal-title" id="exampleModalLabel">Student Registration Information:</h6>
                                <label class="form-label">Student ID *</label>
                                <input type="text" class="form-control" id="StudentID">

                                <label class="form-label">Class Name *</label>
                                <select class="form-select" id="AcademicClassName" aria-label="Default select example">
                                    <option value="">Select Class</option>
                                </select>

                                <label class="form-label">Section Name *</label>
                                <select class="form-select" id="AcademicSectionName" aria-label="Default select example">
                                    <option value="">Section Name</option>
                                </select>

                                <label class="form-label">Roll No *</label>
                                <input type="text" class="form-control" id="AcademicRollNumber">

                                </select>
                                <label class="form-label">Session/Years *</label>
                                <select class="form-select" id="SessonYear" aria-label="Default select example">
                                    <option value="2024">2024</option>
                                    <option value="2023">2023</option>
                                    <option value="2022">2022</option>
                                    <option value="2021">2021</option>
                                    <option value="2020">2020</option>
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

    FillClassNameDropDown();
    async function FillClassNameDropDown(){
        let res = await axios.get("/list-class",HeaderToken())
        res.data['classData'].forEach(function (item,i) {
            let option=`<option value="${item['class_name']}">${item['class_name']}</option>`
            $("#AcademicClassName").append(option);
        })
    }

    FillSectionNameDropDown();
    async function FillSectionNameDropDown(){
        let res = await axios.get("/list-section",HeaderToken())
        res.data['section_data'].forEach(function (item,i) {
            let option=`<option value="${item['section_name']}">${item['section_name']}</option>`
            $("#AcademicSectionName").append(option);
        })
    }

    // FillGroupNameDropDown();
    // async function FillGroupNameDropDown(){
    //     let res = await axios.get("/list-group",HeaderToken())
    //     res.data['group_data'].forEach(function (item,i) {
    //         let option=`<option value="${item['id']}">${item['group_name']}</option>`
    //         $("#AcademicGroupName").append(option);
    //     })
    // }



    async function Save() {
        try {


            // Get values from the form - Academic Information
            let StudentID = document.getElementById('StudentID').value;
            let AcademicClassName = document.getElementById('AcademicClassName').value;
            let AcademicSectionName = document.getElementById('AcademicSectionName').value;
            let AcademicRollNumber = document.getElementById('AcademicRollNumber').value;
            let SessonYear = document.getElementById('SessonYear').value;


            // Prepare data for submission
            let formData = new FormData();

            // Append Academic Information data
            formData.append('student_id', StudentID);
            formData.append('class_name', AcademicClassName);
            formData.append('section_name', AcademicSectionName);
            formData.append('student_roll', AcademicRollNumber);
            formData.append('sesson', SessonYear);


            // Make the API request
            const config = {
                headers: {
                    'content-type': 'multipart/form-data',
                    ...HeaderToken().headers
                }
            };

            showLoader();
            let res = await axios.post("/create-student-registration", formData, config);
            hideLoader();

            if (res.data['status'] === "success") {
                successToast(res.data['message']);
                document.getElementById("save-form").reset();
                await getList();
            } else {
                errorToast(res.data['message'])
            }

        } catch (e) {
            unauthorized(e.response.status)
        }
    }
</script>



