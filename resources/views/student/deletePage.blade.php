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
                <th>講座の名前</th>
                <th>ID</th>
                <th>Action</th>
            </thead>
            <tbody>
                @foreach ($array3 as $arr)
                <tr>
                    <td class="text-center">
                        {{ $arr['name'] }}
                    </td>
                    <td class="text-center">
                        {{ $arr['listID'] }}
                    </td>
                    <td class="text-center">
                        <a href="{{ route('student.destroyCourse', $arr['listID']) }}" onclick="return confirm('この講座をキャンセルしますか？');">
                            <button class="btn btn-danger">
                                キャンセル
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- <script type="text/javascript">
        function enter() {
            if (confirm("xoa mon hoc nay ? " == true)) {
                document.querySelector("#deleteID").submit();
            }
        }
    </script> -->
</body>