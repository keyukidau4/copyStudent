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
            <div class="my-3 ms-3">
                <h2>{{ $user->name }}</h2>
            </div>
            <thead class="text-center">
                <th>講座の名前</th>
                <th>クラスメンバー</th>
            </thead>
            <tbody>
                @foreach ($array3 as $arr)
                <tr>
                    <td class="text-center d-flex flex-column">
                        {{ $arr['name'] }}
                        <a href="#" class="mt-3">
                            <button class="btn btn-danger">
                                キャンセル
                            </button>
                        </a>
                    </td>
                    <td>
                        @for ($j = 0; $j < strlen(trim($arr['list'])); $j++) 名前：{{ $dataStudents[trim($arr['list'])[$j]-1]->name }}, イメージ： <img class="img-fluid img-thumbnail border border-3 border-primary" src="{{ url('image/' . $dataStudents[trim($arr['list'])[$j]-1]->image) }}" alt="" width="80">
                            <h4></h4>
                            @endfor
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>