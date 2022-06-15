@include('student.head')
<style>
    body {
        color: #6F8BA4;
        margin-top: 20px;
    }

    .section {
        padding: 1rem 0;
        position: relative;
    }

    .gray-bg {
        background-color: #f5f5f5;
    }

    .about-avatar {
        display: flex;
    }

    img {
        width: 50%;
        max-width: 100%;
    }

    img {
        vertical-align: middle;
        border-style: none;
    }

    /* About Me
---------------------*/
    .about-text h3 {
        font-size: 45px;
        font-weight: 700;
        margin: 0 0 6px;
    }

    @media (max-width: 767px) {
        .about-text h3 {
            font-size: 35px;
        }
    }

    .about-text h6 {
        font-weight: 600;
        margin-bottom: 15px;
    }

    @media (max-width: 767px) {
        .about-text h6 {
            font-size: 18px;
        }
    }

    .about-text p {
        font-size: 18px;
        max-width: 450px;
    }

    .about-text p mark {
        font-weight: 600;
        color: #20247b;
    }

    .about-list {
        padding-top: 10px;
    }

    .about-list .media {
        padding: 5px 0;
    }

    .about-list label {
        color: #20247b;
        font-weight: 600;
        width: 88px;
        margin: 0;
        position: relative;
    }

    .about-list p {
        margin: 0;
        font-size: 15px;
    }

    @media (max-width: 991px) {
        .about-avatar {
            margin-top: 30px;
        }

        img{
            margin: 0 auto;
        }
    }

    .about-section .counter {
        padding: 22px 20px;
        background: #ffffff;
        border-radius: 10px;
        box-shadow: 0 0 30px rgba(31, 45, 61, 0.125);
    }

    .about-section .counter .count-data {
        margin-top: 10px;
        margin-bottom: 10px;
    }

    .about-section .counter .count {
        font-weight: 700;
        color: #20247b;
        margin: 0 0 5px;
    }

    .about-section .counter p {
        font-weight: 600;
        margin: 0;
    }

    mark {
        background-image: linear-gradient(rgba(252, 83, 86, 0.6), rgba(252, 83, 86, 0.6));
        background-size: 100% 3px;
        background-repeat: no-repeat;
        background-position: 0 bottom;
        background-color: transparent;
        padding: 0;
        color: currentColor;
    }

    .theme-color {
        color: #fc5356;
    }

    .dark-color {
        color: #20247b;
    }

    .row>* {
        /* flex-shrink: 1; */
        /* width: 100%; */
        max-width: 100%;
        padding-right: calc(var(--bs-gutter-x) * .5);
        padding-left: calc(var(--bs-gutter-x) * .5);
        margin-top: var(--bs-gutter-y);
        margin: 0 auto;
    }
</style>

<body>
    <div class="container me-5 mb-2 d-flex justify-content-end">

        <a href="{{route('student.updateProfile')}}"><button class="btn btn-primary py-0" style="background-color:#84f14e;">
                <h5>アップデート</h5>
            </button></a>

    </div>
    <section class="section about-section container gray-bg" id="about">
        <div class="container mt-2">
            <div class="row align-items-center flex-row-reverse">
                <div class="col-lg-6">
                    <div class="about-avatar">
                        <img class="img-fluid img-thumbnail border border-3 border-primary" src="/image/{{ $user->image }}" title="" alt="">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-text go-to">
                        <h3 class="dark-color">{{ $user->name }}</h3>
                        <h6 class="theme-color lead">学生のプロフィール</h6>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos delectus nisi nobis
                            expedita, beatae fugit numquam perspiciatis veniam atque sit. Eum dolores perspiciatis
                            assumenda voluptatum debitis aliquid dicta tempora officia?
                        </p>
                        <div class="row about-list">
                            <div class="col-md-6">
                                <div class="media">
                                    <label>名前：</label>
                                    <p>{{ $user->name }}</p>
                                </div>
                                <div class="media">
                                    <label>年齢：</label>
                                    <p>{{ $user->age }}</p>
                                </div>
                                <div class="media">
                                    <label>住所</label>
                                    <p>{{ $user->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="media">
                                    <label>メール：</label>
                                    <p>{{ $user->email }}</p>
                                </div>
                                <div class="media">
                                    <label>携帯番号</label>
                                    <p>{{ $user->phone }}</p>
                                </div>
                                <div class="media">
                                    <label>科目：</label>
                                    <p>
                                        @foreach ($courses as $course)
                                        @foreach ($array as $a)
                                        @if ($course->id == $a){{ $course->name }}
                                        @endif
                                        @endforeach
                                        @endforeach
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</body>