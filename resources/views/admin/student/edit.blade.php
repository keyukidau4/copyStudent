@include('admin.student.head')

<div class="container">

    <div class="card mt-5">

        <div class="card-header">
            <h1>学生{{ $student->name }}の情報を修正する</h1>
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
            <form method="POST" action="{{ route('admin.student.update', $student->id) }}">
                @csrf
                @method('PUT')
                <div class="form-group">

                    <label for="name">名前：</label>
                    <input type="text" class="form-control" name="name" placeholder="{{old('name',$student->name)}}"/>
                </div>
                <div class="form-group">

                    <label for="age">年齢：</label>
                    <input type="text" class="form-control" name="age" maxlength="2" placeholder="{{old('age',$student->age)}}"/>
                </div>
                <div class="form-group">
                    <label for="address">住所：</label>
                    <input type="text" class="form-control" name="address" placeholder="{{old('address',$student->address)}}"/>
                </div>
                <div class="form-group">
                    <label for="phone">携帯番号：</label>
                    <input type="tel" class="form-control" name="phone" placeholder="{{old('address',$student->phone)}}"/>
                </div>
                <div class="form-group">
                    <label for="email">メール：</label>
                    <input type="email" class="form-control" name="email" required placeholder="{{old('email',$student->email)}}"/>
                </div>

                <div class="form-group">
                    <label for="password">パスワード：</label>
                    <input type="text" class="form-control" name="password"/>
                </div>
                <button type="submit" class="mt-3 btn btn-block btn-primary">追加</button>
            </form>
        </div>
    </div>

    <div class="mt-3 ms-3">

        <a href="{{ route('admin.student.dashboard') }}">
            <button type="button" class="btn btn-danger" data-bs-placement="top" data-bs-toggle="tooltip"
                title="管理ページへ戻る">キャンセル</button>
        </a>
    </div>
</div>
@include('admin.script')
