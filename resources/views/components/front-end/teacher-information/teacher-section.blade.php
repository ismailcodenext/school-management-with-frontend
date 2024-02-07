 
    <!-- Hero Start -->
    <section id="teacher_hero">
        <div class="container">
            <div class="teacher_hero_content">
                <h1>শিক্ষক মন্ডলীর তথ্যাবলী</h1>
            </div>
            <div class="teacher_hero_img_line">
                <img src="{{asset('front-end/assets/image/hero_bg_line_.png')}}" alt="">
               </div>
        </div>
    </section>
    <!-- Hero End -->



    <!-- Teachers_Information Start -->
    {{-- <section id="teachers_information">
        <div class="container">
            <div class="teachers_information_content ">
                <div class="row">
                    @foreach ($TeacherInformations as $TeacherInformation)
                    <div class="col-md-6 col-lg-4 mt-4">
                        <div class="teacher_cards">
                            <div class="teachers_img">
                                <img src="{{$TeacherInformation->img_url}}" alt="">
                            </div>
                            <div class="teachers_name mt-4">
                                <h1>{{$TeacherInformation->name}}</h1>
                                <p>{{$TeacherInformation->designation}}</p>
                            </div>
                            <div class="teachers_info">
                                <div class="teachers_info_item">
                                    <div class="teachers_info_title">
                                        <span>শিক্ষাগত যোগ্যতা</span>
                                        <span>:</span>
                                    </div>
                                    <span class="teachers_info_text">{{$TeacherInformation->education}}</span>
                                </div>

                                <div class="teachers_info_item">
                                    <div class="teachers_info_title mt-1 ">
                                        <span>ঠিকানা </span>
                                        <span>:</span>
                                    </div>
                                    <span class="teachers_info_text">{{$TeacherInformation->address}}</span>
                                </div>
                                <div class="teachers_info_item">
                                    <div class="teachers_info_title mt-1">
                                        <span>মোবাইল নম্বর </span>
                                        <span>:</span>
                                    </div>
                                    <span class="teachers_info_text">{{$TeacherInformation->mobile}}</span>
                                </div>
                                <div class="teachers_info_item">
                                    <div class="teachers_info_title mt-1">
                                        <span>ইমেল</span>
                                        <span>:</span>
                                    </div>
                                    <span class="teachers_info_text">{{$TeacherInformation->email}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                   @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- Teachers_Information End -->