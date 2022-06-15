@include('admin.course.head')

<body>

    {{-- Room table --}}

    <div class="container mt-5">
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
        <div class="d-flex justify-content-between mb-3 mx-3">
            <h2>講座テーブル</h2>
            <a class="d-flex justify-content-start" href="{{ route('admin.course.create') }}">
                <button type="button" class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip" title="新しい講座を追加する">
                    +
                </button>
            </a>
        </div>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <td>#ID</td>
                    <td>Course Name</td>
                    <td>Room</td>
                    <td>Description</td>
                    <td>Day Of Week</td>
                    <td>Begin Time</td>
                    <td>End Time</td>
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $course->id }}</td>
                    <td>{{ $course->name }}</td>
                    <td>{{ $course->at_room }}</td>
                    <td>{{ $course->description }}</td>
                    <td>{{ $course->day_of_week }}</td>
                    <td>{{ $course->begin_time }}</td>
                    <td>{{ $course->end_time }}</td>
                    <td>
                        <a href="{{ route('admin.course.information', $course->id) }}" class="btn btn-primary btn-sm">Show</a>
                        <a href="{{ route('admin.course.edit', $course->id) }}" class="btn btn-success btn-sm">Edit</a>
                        <form action="{{ route('admin.course.destroy', $course->id) }}" method="post" style="display: inline-block">
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
            {!! $courses->links() !!}
        </div>
    </div>

    @include('admin.script')
</body>