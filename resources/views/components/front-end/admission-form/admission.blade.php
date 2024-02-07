    <!-- Hero Start -->
    <section id="admissison_hero">
        <div class="container">
            <div class="admissison_hero_content">
                <h1>Admission Form</h1>
            </div>
            <div class="admissison_hero_img_line">
                <img src="{{asset('front-end/assets/image/hero_bg_line_.png')}}" alt="">
               </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Admissison Page Start -->
    <section id="admissison_page">
        <div class="container">
            <div class="admissison_page_content mt-4">
                <div class="admissison_content_heading mt-3">
                    <h1>New Admission</h1>
                </div>

                <!-- Academic Details Start -->
                <div class="academic_Details mt-3">
                    <div class="academic_Details_heading">
                        <div class="academic_Details_heading_text">
                            <h1>Academic Details</h1>
                        </div>
                        <div class="academic_Details_heading_line mt-3"></div>
                    </div>

                    <form id="academic_details_content mt-5">
                        <div class="row ">
                            <div class="col-lg-4 mt-3">
                                <div class="academic_details_content_name">
                                    <label for="">Institute Name*</label> <br>
                                    <input type="text">
                                </div>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <div class="academic_details_content_class">
                                    <label for="">Class*</label> <br>
                                    <select id="class" name="class">
                                        <option value="">class</option>
                                        <option value="">class-1</option>
                                        <option value="">class-2</option>
                                        <option value="">class-3</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <div class="academic_details_content_section">
                                    <label for="">Section*</label> <br>
                                    <select id="section" name="section">
                                        <option value="">A</option>
                                        <option value="">B</option>
                                        <option value="">C</option>
                                        <option value="">D</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form id="academic_details_content mt-4">
                        <div class="row ">
                            <div class="col-lg-4 mt-3">
                                <div class="academic_details_content_date">
                                    <label for="">Admission Date*</label> <br>
                                    <input type="date" placeholder="Enter admission date...">
                                </div>
                            </div>
                            <div class="col-lg-4 mt-3">
                                <div class="academic_details_content_category">
                                    <label for="">Category*</label> <br>
                                    <select id="category" name="category">
                                        <option value="" class="active">category</option>
                                        <option value="">category-1</option>
                                        <option value="">category-2</option>
                                        <option value="">category-3</option>
                                    </select>
                                </div>
                    </form>
                    <div class="col-lg-4">
                    </div>
                </div>
            </div>
        </div>
        <!-- Academic Details End -->

        <!-- Students Details Start -->
        <div id="students_details">
            <div class="academic_Details_heading mt-5">
                <div class="academic_Details_heading_text">
                    <h1>Academic Details</h1>
                </div>
                <div class="academic_Details_heading_line mt-3"></div>
            </div>
            <form id="students_details_form mt-5">
                <div class="row">
                    <div class="col-lg-8 ">
                        <div class="student_from_content">
                            <div class="row">
                                <div class="col-lg-6 mt-3">
                                    <div class="students_details_form_name">
                                        <label for="">First Name*</label> <br>
                                        <input type="text" placeholder="Enter here...">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="students_details_form_name">
                                        <label for="">Last Name*</label> <br>
                                        <input type="text" placeholder="Enter here...">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-6 mt-3">
                                    <div class="students_details_form_brithday">
                                        <label for="">Birthday</label> <br>
                                        <input type="date" placeholder="Enter here....">
                                    </div>
                                </div>
                                <div class="col-lg-6 mt-3">
                                    <div class="students_details_form_gender">
                                        <label for="">Gender</label> <br>
                                        <select id="gender" name="gender">
                                            <option value="" class="active">gender</option>
                                            <option value="">Male</option>
                                            <option value="">Female</option>
                                            <option value="">Custom</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4">
                        <div class="students_details_from_img">
                            <div class="students_details_from_content">
                                <div class="students_details_from_content_photo">
                                    <img src="{{asset('front-end/assets/image/form_img.png')}}" alt="">
                                </div>
                                <div class="students_details_from_content_text">
                                    <p>150x150</p>
                                </div>
                            </div>
                            <div class="students_details_from_content_photo_btn mt-4">
                                <label for="imgFile"><span>+</span> Upload Photo</label>
                                <input type="file" name="" id="imgFile">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Students Details End -->

        <!-- Student About YourSelf Start -->
        <form id="student_biodate ">
            <div class="row mt-4">
                <div class="col-lg-4 mt-3">
                    <div class="blood_group">
                        <label for="">Blood Group</label> <br>
                        <select id="blood" name="blood">
                            <option value="" class="active">A+</option>
                            <option value="">A-</option>
                            <option value="">B+</option>
                            <option value="">B-</option>
                            <option value="">AB+</option>
                            <option value="">AB-</option>
                            <option value="">O</option>
                            <option value="">O-</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="religion">
                        <label for="">Religion</label> <br>
                        <select id="religion" name="religion">
                            <option value="" class="active">Muslim</option>
                            <option value="">Hindu</option>
                            <option value="">Chrestan</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="student_phn_number">
                        <label for="">Student Mobile No</label> <br>
                        <input type="text" placeholder="Enter here...">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mt-3">
                    <div class="email">
                        <label for="">Student Email</label> <br>
                        <select id="email" name="email">
                            <option value="" class="active">Student Email-01</option>
                            <option value="">Student Email-02</option>
                            <option value="">Student Email-03</option>
                        </select>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="mother_tongue">
                        <label for="">Mother Tongue</label> <br>
                        <input type="text">
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="nid_card">
                        <label for="">Birth Certificate or NID No</label> <br>
                        <input type="number" placeholder="Enter here...">
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-4 mt-3">
                    <div class="present_address">
                        <label for="">Present Address</label> <br>
                        <textarea name="" id="" placeholder="Enter present address..."></textarea>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="permanent_address">
                        <label for="">Permanent Address</label> <br>
                        <textarea name="" id="" placeholder="Enter permanent address..."></textarea>
                    </div>
                </div>
                <div class="col-lg-4 mt-3">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="city">
                                <label for="">City</label> <br>
                                <select id="email" name="email">
                                    <option value="" class="active">Student Email-01</option>
                                    <option value="">Student Email-02</option>
                                    <option value="">Student Email-03</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="state">
                                <label for="">State</label> <br>
                                <select id="state" name="state">
                                    <option value="" class="active">State</option>
                                    <option value="">State-02</option>
                                    <option value="">State-03</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Student About YourSelf End -->

        <!-- Previous Institute Details Start -->
        <div id="previous_institute">
            <div class="previous_institute_heading mt-5">
                <div class="previous_institute_heading_text">
                    <h1>Previous Institute Details</h1>
                </div>
                <div class="previous_institute_heading_line mt-3"></div>
            </div>

            <form action="" id="previous_institute_content">
                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="previous_institute_name">
                            <label for="">Institute Name</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="qualification">
                            <label for="">Qualification</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="remarks">
                            <label for="">Remarks</label> <br>
                            <textarea name="" id="" placeholder="Enter present address..."></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                    </div>
                </div>
            </form>

        </div>
        <!-- Previous Institute Details End -->

        <!-- Guardian Details Start -->
        <div id="guardian_details">
            <div class="guardian_details_heading mt-5">
                <div class="guardian_details_heading_text">
                    <h1>Previous Institute Details</h1>
                </div>
                <div class="guardian_details_heading_line mt-3"></div>
            </div>
            <form action="" id="guardian_details_content">
                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="guardian_name">
                            <label for="">Guardian Name*</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="relation">
                            <label for="">Relation*</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="father_name">
                            <label for="">Father Name</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="mother_name">
                            <label for="">Mother Name</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="occupation">
                            <label for="">Occupation*</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="income">
                            <label for="">Income*</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="education">
                            <label for="">Education*</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="guardian_e_mail">
                            <label for="">Guardian E-mail*</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="guardian_mobile">
                            <label for="">Guardian Mobile No*</label> <br>
                            <input type="number" placeholder="Enter here...">
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="guardian_address">
                            <label for="">Guardian Address*</label> <br>
                            <input type="text" placeholder="Enter here...">
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-lg-6 mt-4">
                        <div class="guardian_city">
                            <label for="">Guardian City</label> <br>
                            <select id="city" name="email">
                                <option value="" class="active">Guardian City-01</option>
                                <option value="">Guardian City-02</option>
                                <option value="">Guardian City-03</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-4">
                        <div class="guardian_state">
                            <label for="">Guardian State</label> <br>
                            <select id="state" name="state">
                                <option value="" class="active">Guardian State-01</option>
                                <option value="">Guardian State-02</option>
                                <option value="">Guardian State-03</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-5">
                    <div class="col-lg-9 mt-">
                        <div class="guardian_photo">
                            <label for="">Guardian Photo</label> <br>
                            <input type="text" placeholder="Choose file...">
                        </div>
                    </div>
                    <div class="col-lg-3 mt-4">
                        <div class="guardian_photo_btn">
                            <label for="imgFile"> <span style="font-size: 16px;">+ </span>Upload Photo</label> <br>
                            <input type="file" id="imgFile">
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- Guardian Details End -->

        <!-- Upload Documents Start -->
        <div id="upload_documents">
            <div class="upload_documents_heading mt-5">
                <div class="upload_documents_heading_text">
                    <h1>Upload Documents</h1>
                </div>
                <div class="upload_documents_heading_line mt-3"></div>
            </div>
            <form action="" id="upload_documents_content">
                <div class="row mt-5">
                    <div class="col-lg-9 ">
                        <div class="upload_document">
                            <label for="">Upload Documents*</label> <br>
                            <input type="text" placeholder="Choose file...">
                        </div>
                    </div>
                    <div class="col-lg-3 mt-4">
                        <div class="upload_document_btn">
                            <label for="imgFile"> <span style="font-size: 16px;">+ </span>Upload Documents</label>
                            <br>
                            <input type="file" id="imgFile">
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-lg-4 ">
                        <div class="select_box_btn">
                            <button>SUBMIT</button>
                        </div>
                    </div>
                    <div class="col-lg-4 ">

                    </div>
                    <div class="col-lg-4">

                    </div>
                </div>
            </form>

        </div>
        <!-- Upload Documents End -->
        </div>
        </div>
    </section>
    <!-- Admissison Page End -->