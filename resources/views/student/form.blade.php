@include('student.head')
<div class="container mt-3">
    <h2 class="display-3">講座を申し込むフォーム</h2>
    @if (session()->get('error'))
    <div class="alert alert-success">
        {{ session()->get('error') }}
    </div>
    @endif
    <form action="{{ route('student.courseCreate') }}" method="post">
        @csrf
        <div class="mt-5">
            <label for="course_id" class="form-label h4">講座を選んでください！：</label>
            <select class="form-select" name="course_id">
                @foreach ($courses as $course)
                <option value="{{$course->id}}">{{ $course->name }} /
                    <span> クラスルーム：{{ $course->at_room}} / </span>
                    <span> 受講時間：{{ $course->begin_time}}時から</span>
                    <span>{{ $course->end_time}}時まで</span>
                </option>
                @endforeach
            </select>
        </div>
        <button id="submit" type="submit" class="btn btn-primary mt-3">申込</button>
    </form>
</div>