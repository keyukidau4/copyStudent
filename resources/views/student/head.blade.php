<!DOCTYPE html>
<html lang="en">

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
    <title>Home Page</title>
</head>

<style>

    img{
        cursor: pointer;
    }

    .nav-shadow {
        transition: all .2s linear;
    }

    .nav-shadow:hover {
        border-radius: 20px;
        background-color: white;
        outline: none;
        box-shadow: 1px 1.5px 3px 3.5px gainsboro;
        transform: scale(.9);
    }

    .bx {
        transition: all .2s linear;
    }

    .bx:hover {
        transform: scale(1.2);
    }
</style>
<div class="m-4">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a href="{{route('student.home')}}" class="navbar-brand">
                <i class="bx bx-home-smile" style="color: #95dcc1;font-size: 40px;"></i>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav">
                    <a href="{{route('student.home')}}" class="nav-item nav-shadow nav-link active">ホーム</a>
                    <a href="{{route('student.member')}}" class="nav-item nav-shadow nav-link">クラス</a>
                    <a href="{{ route('student.profile') }}" class="nav-item nav-shadow nav-link">プロフィール</a>
                    <a href="{{route('student.course')}}" class="nav-item nav-shadow nav-link">申し込む</a>
                </div>
                <div class="navbar-nav ms-auto">
                    <a href="{{ route('logout') }}"  class="nav-item nav-shadow nav-link">ログアウト</a>
                </div>
            </div>
        </div>
    </nav>
</div>