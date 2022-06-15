<!DOCTYPE html>
<html lang="en">

@include('admin.student.head')

<body>

    <div class="container mt-5">
        @if (session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <div class="d-flex justify-content-between mb-3 mx-3">
            <h2>学生{{ $student->name }}の情報</h2>
            <a href="{{ route('admin.student.dashboard') }}" class="d-flex justify-content-start">
                <button type="button" class="btn btn-primary" data-bs-placement="top" data-bs-toggle="tooltip"
                    title="管理ページへ戻る">
                    < </button>
            </a>
        </div>
        <table class="table">
            <thead>
                <tr class="table-primary">
                    <td>#ID</td>
                    <td>Name</td>
                    <td>Age</td>
                    <td>Address</td>
                    <td>Phone</td>
                    <td>Email</td>
                    <td>Courses</td>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $student->id - 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->age }}</td>
                    <td>{{ $student->address }}</td>
                    <td>{{ $student->phone }}</td>
                    <td>{{ $student->email }}</td>
                </tr>
            </tbody>
        </table>
    </div>

    @include('admin.script')
</body>

</html>
