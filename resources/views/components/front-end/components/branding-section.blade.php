    <!-- Branding Header Start  -->
    <section id="header">
        <div class="container">
            <div class="header_logo">
                <img id="logo" src="" alt="" />
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="header_wapper">
                        <div class="header_content">
                            <h1 id="nameBangla"></h1>
                            <h2 id="nameEnglish"></h2>
                            <p id="address"></p>
                        </div>
                        <div class="header_content_heading">
                            <div class="header_content_heading_address header_border_right">
                                <a id="eiin" href="#"></a>
                            </div>
                            <div class="header_content_heading_address ms-2">
                                <a id="code" href="#"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Branding Header End  -->

    <script>
        Branding();
        async function Branding() {
            let res = await axios.get("/branding-list");
            console.log(res.data.data);
            let logoSrc = res.data.data.logo;
            document.getElementById('logo').src = logoSrc;
            document.getElementById('nameBangla').innerText = res.data.data.nameBangla
            document.getElementById('nameEnglish').innerText = res.data.data.nameEnglish
            document.getElementById('address').innerText = res.data.data.address
            document.getElementById('eiin').innerText = res.data.data.eiin
            document.getElementById('code').innerText = res.data.data.code
        }
    </script>
