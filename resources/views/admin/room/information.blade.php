@include('admin.room.head')

<body>

    {{-- Room table --}}

    <div class="container mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between mb-3 mx-3">
            <h2>ルーム{{ $room->name }}の情報</h2>
        </div>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <td>#ID</td>
                    <td>Room Name</td>
                    <td>Available Seat</td>
                    <td>Total Seat</td>
                    <td>Class Status</td>
                    <td>Room ID</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $room->id }}</td>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->available_seat }}</td>
                    <td>{{ $room->total_seat }}</td>
                    <td>{{ $room->class_status }}</td>
                    <td>{{ $room->room_id }}</td>
                </tr>

            </tbody>
        </table>
    </div>

    @include('admin.script')
</body>
