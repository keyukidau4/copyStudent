@include('student.head')

<body>
    <div class="container">

        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        @if (session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead class="text-center">
                <th>名前</th>
                <th>年齢</th>
                <th>写真</th>
                <th>講座</th>
                <th>住所</th>
                <th>携帯番号</th>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center align-middle">
                        {{ $users->name }}
                    </td>
                    <td class="text-center align-middle">
                        {{ $users->age }}
                    </td>
                    <td class="w-25 text-center align-middle">
                        <img class="img-fluid img-thumbnail border border-3 border-primary"
                            src="{{ url('image/' . $users->image) }}" alt="" width="80">
                    </td>
                    <td>
                        @foreach ($array as $a)
                            @foreach ($courses as $course)
                                @if ($course->id == $a)
                                    <span>科目：{{ $course->name }}</span><br>
                                    <span>クラスルーム：{{ $course->at_room }}</span><br>
                                    <span>曜日：{{ $course->day_of_week }}</span><br>
                                    <span>受講時間：{{ $course->begin_time }}時から</span>
                                    <span>{{ $course->end_time }}時まで</span><br>
                                @endif
                            @endforeach
                            @if ($a != 0)
                                <p class="border-bottom border-info border-3"></p>
                            @endif
                        @endforeach
                    </td>
                    <td class="text-center align-middle">
                        {{ $users->address }}
                    </td>
                    <td class="text-center align-middle">
                        {{ $users->phone }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

</body>
