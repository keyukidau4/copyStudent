@include('admin.room.head')

<div class="container">

    <div class="card mt-5">

        <div class="card-header">
            <h1>新しい講座を追加する</h1>
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
            <form method="post" action="{{ route('admin.course.store') }}">
                @csrf
                <div class="form-group">

                    <label for="name">講座の名前：</label>
                    <input type="text" class="form-control" name="name" />
                </div>

                <label for="class_status">教室：</label>
                <select class="form-select" name="at_room">
                    @foreach($rooms as $room)
                    <option value="{{ $room -> room_id}}">{{$room -> room_id}}</option>
                    @endforeach
                </select>

                <div class="form-group">
                    <label for="description">記述</label>
                    <textarea class="form-control" name="description" cols="30" rows="10"></textarea>
                </div>


                <label for="day_of_week">曜日：</label>
                <select class="form-select" name="day_of_week">
                    <option value="monday" selected>月曜日</option>
                    <option value="tuesday">火曜日</option>
                    <option value="wednesday">水曜日</option>
                    <option value="thursday">木曜日</option>
                    <option value="friday">金曜日</option>
                </select>

                <div class="form-group">
                    <label for="begin_time">スタート時間：</label>
                    <input type="number" class="form-control" name="begin_time" required />
                </div>

                <div class="form-group">
                    <label for="end_time">終わり時間：</label>
                    <input type="number" class="form-control" name="end_time" required />
                </div>

                <button type="submit" class="mt-3 btn btn-block btn-primary">追加</button>
            </form>
        </div>
    </div>

    <div class="mt-3 ms-3">

        <a href="{{ route('admin.course.dashboard') }}">
            <button type="button" class="btn btn-danger" data-bs-placement="top" data-bs-toggle="tooltip" title="管理ページへ戻る">キャンセル</button>
        </a>
    </div>
</div>
@include('admin.script')