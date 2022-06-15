<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- custom css link start-->
    <link rel="stylesheet" href="{{ asset('../../css/app.css') }}" />
    <!-- custom css link end-->

    <!-- bootstrap link start -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- bootstrap link end -->

    <!-- boxicons link start -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
    <!-- boxicons link end -->

    <title>@yield('title')</title>
    <!-- <title>Admin Student Control Page</title> -->
</head>

<style>
    .nav-link:hover {
        background-color: #666;
        border-radius: 10px;
        color: white;
    }
</style>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ route('admin.student.dashboard') }}">
                    <i class='bx bxs-dashboard' style="font-size: 30px;"></i>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ps-2">
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('admin.student.dashboard') }}">学生</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="#">教師</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{ route('admin.room.dashboard') }}">教室</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="nav-link" href="{{route('admin.course.dashboard')}}">講座</a>
                        </li>
                    </ul>
                    <div class="navbar-nav ms-auto">
                        <a href="{{ route('logout') }}" class="nav-item nav-link me-2">ログアウト</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</body>
