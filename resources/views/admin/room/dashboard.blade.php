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
            <h2>ルームテーブル</h2>
            <a class="d-flex justify-content-start" href="{{route('admin.room.create')}}">
                <button type="button" class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="新しいルームを追加する">
                    +
                </button>
            </a>
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
                    <td>Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataRooms as $room)
                    <tr>
                        <td>{{ $room->id}}</td>
                        <td>{{ $room->name }}</td>
                        <td>{{ $room->available_seat }}</td>
                        <td>{{ $room->total_seat }}</td>
                        <td>{{ $room->class_status }}</td>
                        <td>{{ $room->room_id }}</td>
                        <td>
                            <a href="{{route('admin.room.information',$room->id)}}" class="btn btn-primary btn-sm">Show</a>
                            <a href="{{route('admin.room.edit',$room->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <form action="{{route('admin.room.destroy',$room->id)}}" method="post" style="display: inline-block">
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
            {!! $dataRooms->links() !!}
        </div>
    </div>

    @include('admin.script')
</body>
