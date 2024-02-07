    <!-- Topbar Start -->
    <section id="topbar">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <div class="topbar_content">


                <div class="topbar_content_address border-left">
                  <a href="#"><img src="{{asset('front-end/assets/icon/location.svg')}}" alt="" /></a>
                  <a href="#" id="address" class="mt-1"></a>
                </div>
                <div class="topbar_content_address">
                  <a href="#"><img src="{{asset('front-end/assets/icon/phone.svg')}}" alt="" /></a>
                  <a href="tel: 01793683129" id="contact" class="mt-1"></a>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="topbar_content float-end">
                <div class="topbar_content_address border-left">
                  <div class="topbar_img topbar_imgs">
                    <a href="mailto: shohan.cnits@gmail.com">
                      <img src="{{asset('front-end/assets/icon/gmail.svg')}}" alt="" width="25px"
                    /></a>
                  </div>
                  <a href="mailto: shohan.cnits@gmail.com" id="email" class="mt-1"
                    ></a
                  >
                </div>



                <div class="topbar_content_address">
                  <div class="topbar_img">
                    <a href="#">
                      <img src="{{asset('front-end/assets/icon/login.svg')}}" alt="" width="25px"
                    /></a>
                  </div>
                  <a href="#" class="mt-1">লগইন</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Topbar End -->

  <script>

      Topbar();
    async function Topbar(){
      let res=await axios.get("/topbar-list");
      console.log(res.data.data);
      document.getElementById('address').innerText=res.data.data.address
      document.getElementById('contact').innerText=res.data.data.contact
      document.getElementById('email').innerText=res.data.data.email
    }

</script>
