@include('admin.room.head')

<div class="container">

    <div class="card mt-5">

        <div class="card-header">
            <h1>新しいルームを追加する</h1>
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
            <form method="post" action="{{ route('admin.room.store') }}">
                @csrf
                <div class="form-group">

                    <label for="name">ルームの名前：</label>
                    <input type="text" class="form-control" name="name" value="{{old('name')}}"/>
                </div>
                <div class="form-group" id = "available_seat">
                    <label for="available_seat">空席：</label>
                    <input type="number" class="form-control" name="available_seat" value="{{old('available_seat')}}" maxlength="2" />
                </div>
                <div class="form-group">
                    <label for="total_seat" >人数</label>
                    <input type="number" class="form-control" name="total_seat" maxlength="2" />
                </div>
                <label for="class_status">状態：</label>
                <select class="form-select" name="class_status">
                    <option value="Active" selected>Active</option>
                    <option value="Disabled">Disabled</option>
                </select>
                <div class="form-group">
                    <label for="room_id">ルーム番号：</label>
                    <input type="number" class="form-control" name="room_id" required />
                </div>
                <button type="submit" class="mt-3 btn btn-block btn-primary">追加</button>
            </form>
        </div>
    </div>

    <div class="mt-3 ms-3">

        <a href="{{ route('admin.room.dashboard') }}">
            <button type="button" class="btn btn-danger" data-bs-placement="top" data-bs-toggle="tooltip" title="管理ページへ戻る">キャンセル</button>
        </a>
    </div>
</div>
@include('admin.script')

