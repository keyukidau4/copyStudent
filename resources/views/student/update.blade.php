@include('student.head')
<div class="container mt-3">
    <h2 class="display-3">プロフィールのアプデート</h2>
    @if (session()->get('error'))
    <div class="alert alert-success">
        {{ session()->get('error') }}
    </div>
    @endif
    <form action="{{ route('student.updateProfileHandle') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mt-5">
            <label for="name" class="form-label h4">名前：</label>
            <input type="text" name="name" id="name" value="{{old('name',$user->name)}}">
        </div>

        <div class="mt-5">
            <label for="image" class="form-label h4">写真を選んでください！：</label>
            <input type="file" name="image" id="image">
        </div>
        <button id="submit" type="submit" class="btn btn-primary mt-3">アプデート</button>
    </form>
</div>