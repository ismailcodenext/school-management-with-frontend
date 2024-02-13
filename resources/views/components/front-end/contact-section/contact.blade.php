
    <!-- Hero Start -->
    <section id="contact_hero">
        <div class="container">
            <div class="contact_hero_content">
                <h1>যোগাযোগ</h1>
            </div>
            <div class="contact_hero_img_line">
                <img src="{{asset('front-end/assets/image/hero_bg_line_.png')}}" alt="">
               </div>
        </div>
    </section>
    <!-- Hero End -->

    <!-- Contact Start -->
    <section id="main_contact">
        <div class="container">
            <div class="contact_content">
                <div class="contact_heading mt-2">
                    <h1>যোগাযোগ করুন</h1>
                </div>
                <form id="save-form" class="contact_form">
                    <div class="row">

                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact_location_box">
                                        <div class="location_box_img mt-3">
                                            <a href="#"><img src="{{asset('front-end/assets/icon/location.svg')}}" alt=""></a>
                                        </div>
                                        <div class="location_box_heading ">
                                            <h1><a href="#">ঠিকানা</a></h1>
                                            <p><a href="#">পাবনা সদর, পাবনা- ৬৬০০</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="contact_phn_box">
                                        <div class="phn_box_img mt-3">
                                            <a href="tel: 01793683129"><img src="{{asset('front-end/assets/icon/phone.svg')}}" alt=""></a>
                                        </div>
                                        <div class="phn_box_heading ">
                                            <h1><a href="#">ফোন নম্বর</a></h1>
                                            <p><a href="tel: 01793683129">+৮৮০ ১৯১২-৯৩৮৪৮৫</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-md-12">
                                    <div class="contact_email_box">
                                        <div class="email_box_img mt-3">
                                            <a href="mailto: shohan.cnits@gmail.com"><img src="{{asset('front-end/assets/icon/gmail.svg')}}" alt=""></a>
                                        </div>
                                        <div class="email_box_heading ">
                                            <h1><a href="mailto: shohan.cnits@gmail.com">ই-মেইল</a></h1>
                                            <p class="e-mail_text"><a href="mailto: shohan.cnits@gmail.com">pabnaintlschl@gmail.com</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-7">
                            <div class="row mt-3">
                                <div class="col-md-6 mt-4">
                                    <div class="contact_name ">
                                        <label for="">Name*</label> <br>
                                        <input type="text" id="UserName" placeholder="Enter here...">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="contact_email">
                                        <label for="">Email*</label> <br>
                                        <input type="email" id="UserEmail" placeholder="Enter here...">
                                    </div>
                                </div>
                            </div>
                            <div class="row ">
                                <div class="col-md-6 mt-4">
                                    <div class="contact_number ">
                                        <label for="">Phone Number*</label> <br>
                                        <input type="number" id="UserMobile" placeholder="Enter here...">
                                    </div>
                                </div>
                                <div class="col-md-6 mt-4">
                                    <div class="contact_subject">
                                        <label for="">Subject*</label> <br>
                                        <input type="text" id="UserSubject" placeholder="Enter here...">
                                    </div>
                                </div>
                            </div>

                            <div class="row ">
                                <div class="col-md-12 mt-4">
                                    <div class="contact_message ">
                                        <label for="">Message*</label> <br>
                                        <textarea name="" id="UserMessage"></textarea>
                                    </div>
                                </div>
                            </form>
                            <div class="row ">
                           
                                
                <div class="col-md-12 mt-4 ms-2">
                    <div class="contact_btn ">
                        <button onclick="Save()" id="save-btn"> SUBMIT</button>
                    </div>
                </div>

                            </div>
                            </div>
                     
                        </div>
                    </div>
               


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="contact_map">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d58313.293816143916!2d89.20840567736266!3d24.0105735504203!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39fe84d98fa5bf3d%3A0xb038902617eb9884!2sPabna!5e0!3m2!1sen!2sbd!4v1705485420551!5m2!1sen!2sbd"
                                width="100%" height="auto" style="border: 0" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact End -->

    <script>
        async function Save() {
            try {
                let UserName = document.getElementById('UserName').value;
                let UserEmail = document.getElementById('UserEmail').value;
                let UserMobile = document.getElementById('UserMobile').value;
                let UserSubject = document.getElementById('UserSubject').value;
                let UserMessage = document.getElementById('UserMessage').value;


                if (UserName.length === 0) {
                    errorToast("Name Is Required !");
                }
                 else if (UserEmail.length === 0) {
                    errorToast("Email Is Required !");
                }
                 else if (UserMobile.length === 0) {
                    errorToast("Number Is Required !");
                }
                else if (UserSubject.length === 0) {
                    errorToast("Subject Is Required !");
                }
                else if (UserMessage.length === 0) {
                    errorToast("Message Required !");
                }
                 else {
                    let formData = new FormData();
                    formData.append('name', UserName);
                    formData.append('email', UserEmail);
                    formData.append('mobile', UserMobile);
                    formData.append('subject', UserSubject);
                    formData.append('message', UserMessage);
                    
                    let res = await axios.post("/user-message-create", formData);
                    if (res.data['status'] === "success") {
                        successToast(res.data['message']);
                        document.getElementById("save-form").reset();
                        await getList();
                    } else {
                        errorToast(res.data['message'])
                    }
                }

            } 
        }
    </script>
