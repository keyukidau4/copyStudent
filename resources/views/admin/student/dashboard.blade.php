@include('admin.student.head')

<body>
    {{-- student table --}}

    <div class="container mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between mb-3 mx-3">
            <h2>学生テーブル</h2>
            <a href="{{ route('admin.student.create') }}" class="d-flex justify-content-start">
                <button type="button" class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="新しい学生を追加する">
                    +
                </button>
            </a>
        </div>
        {{-- search --}}
        <input type="text" id="myInput" class="ms-2 mb-2 ps-2" onkeyup="myFunction()" placeholder="名前より検索。。。"
            title="Type in a name">

        <table class="table" id="myTable">
            <thead>
                <tr class="table-primary">
                    <th>#ID</th>
                    <th>Name</th>
                    <th>Age</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataStudents as $employee)
                    <tr>
                        <td>{{ $employee->id - 1 }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->age }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>
                            <a href="{{ route('admin.student.info', $employee->id) }}"
                                class="btn btn-primary btn-sm">Show</a>
                            <a href="{{ route('admin.student.edit', $employee->id) }}"
                                class="btn btn-success btn-sm">Edit</a>
                            <form action="{{ route('admin.student.destroy', $employee->id) }}" method="post"
                                style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" type="submit">Delete</button>
                            </form>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Pagination -->
        <div class="d-flex justify-content-center">
            {!! $dataStudents->links() !!}
        </div>
    </div>
    @include('admin.script')
</body>
