<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Room;
use Illuminate\Http\Request;

use Carbon\Carbon;

use function PHPUnit\Framework\isEmpty;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::orderBy('created_at')->paginate(5);

        return view('admin.course.dashboard', compact('courses'));
    }

    public function create()
    {
        $rooms = Room::all();

        return view('admin.course.create', compact('rooms'));
    }

    public function store(Request $request)
    {
        $dataCourse = $request->validate(
            [
                'name' => 'required|max:255',
                'at_room' => 'required|max:30',
                'description' => 'required|max:255',
                'day_of_week' => 'required',
                'begin_time' => 'required|max:2',
                'end_time' => 'required|max:2',
            ],
            [
                'name.required' => '講座の名前を入れてください',
                'at_room.required' => 'ルームを選んでください',
                'description.required' => '記述を入れてください',
                'day_of_week.required' => '何曜日か入れてください',
                'begin_time.required' => 'スタート時間を入れてください！',
                'end_time.required' => '終わり時間を入れてください',
            ],
        );

        $empty = isEmpty(Course::all());

        if (!$empty || Course::where('name', $request->name)->exists()) {
            return redirect('admin/course/create')->with('error', 'この講座が存在しています!');
        } else {
            $newCourse = new Course();

            $newCourse->name = $request->name;

            $newCourse->at_room = $request->at_room;

            $newCourse->description = $request->description;

            $newCourse->day_of_week = $request->day_of_week;

            $newCourse->begin_time = $request->begin_time;

            $newCourse->end_time = $request->end_time;

            $newCourse->created_at = Carbon::now()->timezone('Asia/Tokyo');

            $newCourse->updated_at = Carbon::now()->timezone('Asia/Tokyo');

            $newCourse->save();

            return redirect('admin/course/dashboard')->with('success', '新しい講座を追加された！');
        }
    }

    public function edit($id)
    {
        $rooms = Room::all();

        $course = Course::find($id);

        return view('admin.course.edit', compact('course', 'rooms'));
    }

    public function update(Request $request, $id)
    {
        $dataCourse = $request->validate(
            [
                'name' => 'required|max:255',
                'at_room' => 'required|max:30',
                'description' => 'required|max:255',
                'day_of_week' => 'required',
                'begin_time' => 'required|max:2',
                'end_time' => 'required|max:2',
            ],
            [
                'name.required' => '講座の名前を入れてください',
                'at_room.required' => 'ルームを選んでください',
                'description.required' => '記述を入れてください',
                'day_of_week.required' => '何曜日か入れてください',
                'begin_time.required' => 'スタート時間を入れてください！',
                'end_time.required' => '終わり時間を入れてください',
            ],
        );

        $oldCourse = Course::find($id);

        if ($oldCourse) {
            $oldCourse->name = $request->name;

            $oldCourse->at_room = $request->at_room;

            $oldCourse->description = $request->description;

            $oldCourse->day_of_week = $request->day_of_week;

            $oldCourse->begin_time = $request->begin_time;

            $oldCourse->end_time = $request->end_time;

            $oldCourse->update();

            return redirect('admin/course/dashboard')->with('success', '講座を修正できました!');
        } else {
            return redirect('admin/course/dashboard')->with('error', '存在していません!');
        }
    }


    public function information($id){
        
        $courses = Course::find($id);

        return view('admin.course.information',compact('courses'));
    }
}
