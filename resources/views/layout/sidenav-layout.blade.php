<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <title></title>

    <link rel="icon" type="image/x-icon" href="{{asset('/favicon.ico')}}" />
    <link href="{{asset('css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{asset('css/animate.min.css')}}" rel="stylesheet" />
    <link href="{{asset('css/fontawesome.css')}}" rel="stylesheet" />
    <link href="{{asset('css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('css/toastify.min.css')}}" rel="stylesheet" />


    <link href="{{asset('https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css')}}" rel="stylesheet" />

    <link href="{{asset('css/jquery.dataTables.min.css')}}" rel="stylesheet" />
    <script src="{{asset('js/jquery-3.7.0.min.js')}}"></script>
    <script src="{{asset('js/jquery.dataTables.min.js')}}"></script>


    <script src="{{asset('js/toastify-js.js')}}"></script>
    <script src="{{asset('js/axios.min.js')}}"></script>
    <script src="{{asset('js/config.js')}}"></script>
    <script src="{{asset('js/bootstrap.bundle.js')}}"></script>

</head>

<body>

<div id="loader" class="LoadingOverlay d-none">
    <div class="Line-Progress">
        <div class="indeterminate"></div>
    </div>
</div>

<nav class="navbar fixed-top px-0 shadow-sm bg-white">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">
            <span class="icon-nav m-0 h5" onclick="MenuBarClickHandler()">
                <img class="nav-logo-sm mx-2"  src="{{asset('images/menu.svg')}}" alt="logo"/>
            </span>
            <img class="nav-logo  mx-2"  src="{{asset('images/logo.png')}}" alt="logo"/>
        </a>
        <h4>Pabna International High School, Pabna</h4>

        <div class="float-right h-auto d-flex">
            <div class="user-dropdown">
                <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                <div class="user-dropdown-content ">
                    <div class="mt-4 text-center">
                        <img class="icon-nav-img" src="{{asset('images/user.webp')}}" alt=""/>
                        <h6>User Name</h6>
                        <hr class="user-dropdown-divider  p-0"/>
                    </div>
                    <a href="{{url('/userProfile')}}" class="side-bar-item">
                        <span class="side-bar-item-caption">Profile</span>
                    </a>
                    <button  onclick="logout()" class="side-bar-item">
                        <span class="side-bar-item-caption">Logout</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>


<div id="sideNavRef" class="side-nav-open mt-4">

    <a href="{{url("/dashboardSummary")}}" class="side-bar-item">
        <i class="bi bi-graph-up"></i>
        <span class="side-bar-item-caption">Dashboard</span>
    </a>

    <a href="{{url("/teacherPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Teacher</span>
    </a>

    <a href="{{url("/topbarPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Topbar</span>
    </a>

    <a href="{{url("/brandingPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Branding</span>
    </a>

    <a href="{{url("/footerPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Footer</span>
    </a>

    <a href="{{url("/institutionHistoryPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Institution History</span>
    </a>

    <a href="{{url("/principalMessagePage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Principal Message</span>
    </a>

    <a href="{{url("/photoGalleryPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Photo Gallery</span>
    </a>

    <a href="{{url("/bolgNewsPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Blog & News</span>
    </a>

    <a href="{{url("/heroSliderPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Hero Slider</span>
    </a>


    <a href="{{url("/sectionPage")}}" class="side-bar-item">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Section</span>

    <a href="{{url("/classPage")}}" class="side-bar-item">
        <i class="bi bi-people"></i>
        <span class="side-bar-item-caption">Class</span>

    </a>

    <a href="{{url("/groupPage")}}" class="side-bar-item">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Group</span>
    </a>

    <a href="{{url("/userMessage")}}" class="side-bar-item">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">User Message</span>
    </a>

    <a href="{{url("/admissionPage")}}" class="side-bar-item">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Student Admission Details</span>
    </a>

{{--    <a href="{{url("/categoryPage")}}" class="side-bar-item">--}}
{{--        <i class="bi bi-list-nested"></i>--}}
{{--        <span class="side-bar-item-caption">Category</span>--}}
{{--    </a>--}}

{{--    <a href="{{url("/productPage")}}" class="side-bar-item">--}}
{{--        <i class="bi bi-bag"></i>--}}
{{--        <span class="side-bar-item-caption">Product</span>--}}
{{--    </a>--}}

{{--    <a href="{{url('/salePage')}}" class="side-bar-item">--}}
{{--        <i class="bi bi-currency-dollar"></i>--}}
{{--        <span class="side-bar-item-caption">Create Sale</span>--}}
{{--    </a>--}}

{{--    <a href="{{url('/invoicePage')}}" class="side-bar-item">--}}
{{--        <i class="bi bi-receipt"></i>--}}
{{--        <span class="side-bar-item-caption">Invoice</span>--}}
{{--    </a>--}}

    <a href="#" class="side-bar-item">
        <i class="bi bi-file-earmark-bar-graph"></i>
        <span class="side-bar-item-caption">Report</span>
    </a>


</div>


<div id="contentRef" class="content">
    @yield('content')
</div>



<script>
    function MenuBarClickHandler() {
        let sideNav = document.getElementById('sideNavRef');
        let content = document.getElementById('contentRef');
        if (sideNav.classList.contains("side-nav-open")) {
            sideNav.classList.add("side-nav-close");
            sideNav.classList.remove("side-nav-open");
            content.classList.add("content-expand");
            content.classList.remove("content");
        } else {
            sideNav.classList.remove("side-nav-close");
            sideNav.classList.add("side-nav-open");
            content.classList.remove("content-expand");
            content.classList.add("content");
        }
    }

    async function logout() {

try {
    let res = await axios.get("/logout", HeaderToken());
    localStorage.clear();
    sessionStorage.clear();
    window.location.href = "/userLogin";
} catch (e) {
    errorToast(res.data['message']);
}
}

</script>

</body>
</html>
