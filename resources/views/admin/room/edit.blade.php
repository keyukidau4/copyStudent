
@include('admin.room.head')

<div class="container">

    <div class="card mt-5">

        <div class="card-header">
            <h1>学生{{ $room->name }}の情報を修正する</h1>
        </div>

        <div class="card-body">
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                    @php
                        Session::forget('error');
                    @endphp
                </div>
            @endif
            <form method="POST" action="{{ route('admin.room.update', $room->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <label for="name">ルームの名前：</label>
                    <input type="text" class="form-control" name="name" placeholder="{{ old('name', $room->name) }}" />
                </div>
                <div class="form-group">

                    <label for="available_seat">空席：</label>
                    <input type="text" class="form-control" name="available_seat" maxlength="2"
                        placeholder="{{ old('available_seat', $room->available_seat) }}" />
                </div>
                <div class="form-group">

                    <label for="total_seat">人数：</label>
                    <input type="text" class="form-control" name="total_seat"
                        placeholder="{{ old('total_seat', $room->total_seat) }}" />
                </div>
                <label for="phone">状態：</label>
                <select class="form-select" name="class_status">
                    <option value="Active" @if ($room->class_status == 'Active') {{ 'selected' }} @endif>Active</option>
                    <option value="Disabled" @if ($room->class_status == 'Disabled') {{ 'selected' }} @endif>Disabled
                    </option>
                </select>
                <div class="form-group">
                    <label for="room_id">ルーム番号：</label>
                    <input type="number" class="form-control" name="room_id" required
                        placeholder="{{ old('room_id', $room->room_id) }}" />
                </div>
                <button type="submit" class="mt-3 btn btn-block btn-primary">追加</button>
            </form>
        </div>
    </div>

    <div class="mt-3 ms-3">

        <a href="{{ route('admin.room.dashboard') }}">
            <button type="button" class="btn btn-danger" data-bs-placement="top" data-bs-toggle="tooltip"
                title="管理ページへ戻る">キャンセル</button>
        </a>
    </div>
</div>

@include('admin.script')
