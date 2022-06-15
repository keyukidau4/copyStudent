@include('admin.course.head')

<body>

    {{-- Room table --}}

    <div class="container mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between mb-3 mx-3">
            <h2>ルーム{{ $courses->name }}の情報</h2>
        </div>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <td>#ID</td>
                    <td>Course Name</td>
                    <td>Room</td>
                    <td>Description</td>
                    <td>Day</td>
                    <td>Begin Time</td>
                    <td>End Time</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $courses->id }}</td>
                    <td>{{ $courses->name }}</td>
                    <td>{{ $courses->at_room }}</td>
                    <td>{{ $courses->description }}</td>
                    <td>{{ $courses->day_of_week }}</td>
                    <td>{{ $courses->begin_time }}</td>
                    <td>{{ $courses->end_time }}</td>
                </tr>

            </tbody>
        </table>
    </div>

    @include('admin.script')
</body>
