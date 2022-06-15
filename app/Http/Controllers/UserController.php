<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;

class UserController extends Controller
{
    //ログインページへアクセスする
    public function login()
    {
        return view('login');
    }

    //ログインの処理
    public function loginPage(Request $request)
    {
        $request->validate(
            [
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'email.required' => 'メールを入れてください',
                'password.required' => 'パスワードを入れてください',
                'password.min' => 'パスワードは８字以上',
            ]
        );

        $input = $request->all();

        $array = ['email' => $input['email'], 'password' => $input['password']];
        if (auth()->attempt($array)) {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('admin.student.dashboard');
            } else {
                return redirect()->route('student.home');
            }
        } else {
            return redirect()
                ->back()
                ->with('error', 'ログインできません。入力した情報に誤りが無いかご確認ください！');
        }
    }

    //ユーザーのホームページへアクセスする
    public function index()
    {
        $user_id = Auth::user()->id;

        $users = User::find($user_id);

        $courses = DB::table('courses')->get();

        $userCourse = $users->course_id;

        $array = [];

        for ($i = 0; $i < strlen($userCourse); $i++) {
            $array[$i] = (int)$userCourse[$i];
        }

        return view('student.home', compact('users', 'courses', 'array'));
    }
    //学生のプロフィール
    public function profile()
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $courses = DB::table('courses')->get();

        $userCourse = $user->course_id;

        $array = [];

        for ($i = 0; $i < strlen($userCourse); $i++) {
            $array[$i] = (int)$userCourse[$i];
        }

        return view('student.profile', compact('user', 'courses', 'array'));
    }

    //学生が講座を申し込む
    public function courseForm()
    {
        $courses = DB::table('courses')->get();

        return view('student.form', compact('courses'));
    }

    public function courseCreate(Request $request)
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $userCourse = $user->course_id;

        $userLength = strlen($userCourse);

        if ($userLength < 1) {

            $courses = Course::find([$request->course_id])->first();

            $user->course_id .= $request->course_id;

            $courses->student_count += 1;

            $courses->student_list .= $user->id;

            $courses->save();

            $user->update();

            return redirect('student/home')->with('success', '新しい講座を申し込みました！');
        } else {
            $requestCourse = (int)($request->course_id);

            $isset = 0;

            for ($i = 0; $i < $userLength; $i++) {
                if ((int)$userCourse[$i] - $requestCourse == 0) {
                    $isset = 1;
                }
            }
            if ($isset == 0) {

                $courses = Course::find([$request->course_id])->first();

                $user->course_id .= $request->course_id;

                $courses->student_count += 1;

                $courses->student_list .= $user->id;

                $courses->save();

                $user->update();

                return redirect('student/home')->with('success', '新しい講座を申し込みました！');
            } else {
                return redirect('student/home')->with('error', 'この講座はもう申し込みました！');
            }
        }
    }

    //学生が名前と好きな写真をアップロードする
    public function updateProfile()
    {

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        return view('student.update', compact('user'));
    }

    public function updateProfileHandle(Request $request)
    {
        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $path = public_path('image');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('image');

        $fileName = trim($file->getClientOriginalName());

        $user->image = $fileName;

        $user->name = $request->name;

        $user->update();

        $file->move($path, $fileName);

        return redirect('student/home')->with('success', 'プロフィールがアップデートできました！');
    }

    //クラスメンバーを確認する

    public function memberList()
    {
        $dataStudents = User::all()->where('is_admin', '=', '0');

        $course = Course::all();

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        for ($i = 0; $i < count($course); $i++) {
            if (strlen(strstr($course[$i]->student_list, $user->id)) > 0) {
                $array3[$i] = array('name' => $course[$i]->name, 'list' => $course[$i]->student_list);
            }
        }
        $arrayCourse = [];

        for ($i = 0; $i < count($course); $i++) {
            $arrayCourse[$i] = $course[$i]->name;
        }

        if (isset($array3)) {
            return view('student.member', compact('user', 'array3', 'dataStudents'));
        } else {
            abort(403, '講座はまだ無い！');
        }
    }

    public function destroyPage()
    {
        $course = Course::all();

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        for ($i = 0; $i < count($course); $i++) {
            if (strlen(strstr($course[$i]->student_list, $user->id)) > 0) {
                $array3[$i] = array('name' => $course[$i]->name, 'listID' => $course[$i]->id);
            }
        }

        return view('student.deletePage', compact('array3'));
    }

    public function destroyCourse($id)
    {

        $user_id = Auth::user()->id;

        $user = User::find($user_id);

        $userCourse = $user->course_id;

        $successDelete = 0;

        $courses = Course::find($id);

        for ($i = 0; $i < strlen($userCourse); $i++) {
            if ((int)$userCourse[$i] == $id) {

                $user->course_id = trim($userCourse, $id);

                $successDelete = 1;
            }
        }

        if ($successDelete == 1) {

            $courses->student_list = trim($courses->student_list, $user->id);

            $courses->student_count -= 1;

            $courses->update();

            $user->update();

            return redirect()->route('student.home')->with('success', 'キャンセルしました！');
        } else {
            return redirect()->back()->with('error', 'エラー！');
        }
    }

    // ーーーーーーーーー　Admin　ーーーーーーーーーーーーー

    ## 学生

    //adminの管理ページへアクセスする
    public function adminDashboard()
    {
        $dataStudents = DB::table('users')->where('is_admin', '=', '0')->paginate(5);
        return view('admin.student.dashboard', compact('dataStudents'));
    }

    //新しい学生を追加する
    public function create()
    {
        return view('admin.student.create');
    }

    public function store(Request $request)
    {
        $dataStudents = $request->validate(
            [
                'name' => 'required|max:255',
                'age' => 'required|max:100',
                'address' => 'required|max:255',
                'phone' => 'required|max:12',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'name.required' => '名前を入れてください',
                'age.required' => '年齢を入れてください',
                'age.max' => '年齢を正しく入れてください',
                'address.required' => 'メールを入れてください',
                'phone.required' => 'メールを入れてください',
                'email.required' => 'メールを入れてください',
                'password.required' => 'パスワードを入れてください',
                'password.min' => 'パスワードは８字以上',
            ]
        );

        if (User::where('email', $request->email)->exists()) {
            return redirect('admin/student/create')->with('error', '学生の情報が存在している！');
        } else {
            $newStudent = new User();
            $newStudent->name = $request->name;
            $newStudent->age = $request->age;
            $newStudent->address = $request->address;
            $newStudent->phone = $request->phone;
            $newStudent->email = $request->email;
            $newStudent->email_verified_at = Carbon::now()->timezone('Asia/Tokyo');
            $newStudent->password = bcrypt($request->password);
            $newStudent->created_at = Carbon::now()->timezone('Asia/Tokyo');
            $newStudent->updated_at = Carbon::now()->timezone('Asia/Tokyo');
            $newStudent->save();
            return redirect('admin/student/dashboard')->with('success', '新しい学生が追加された');
        }
    }

    //学生の情報を確認する
    public function information($id)
    {
        $student = User::find($id);

        return view('admin.student.information', compact('student'));
    }

    //学生の情報を修正する
    public function edit($id)
    {
        $student = User::find($id);
        return view('admin.student.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $dataStudents = $request->validate(
            [
                'name' => 'required|max:255',
                'age' => 'required|max:100',
                'address' => 'required|max:255',
                'phone' => 'required|max:12',
                'email' => 'required|email',
                'password' => 'required|min:8',
            ],
            [
                'name.required' => '名前を入れてください',
                'age.required' => '年齢を入れてください',
                'age.max' => '年齢を正しく入れてください',
                'address.required' => 'メールを入れてください',
                'phone.required' => 'メールを入れてください',
                'email.required' => 'メールを入れてください',
                'password.required' => 'パスワードを入れてください',
                'password.min' => 'パスワードは８字以上',
            ]
        );

        $oldStudent = User::find($id);

        if ($oldStudent) {
            $oldStudent->name = $request->name;
            $oldStudent->age = $request->age;
            $oldStudent->address = $request->address;
            $oldStudent->phone = $request->phone;
            $oldStudent->email = $request->email;
            $oldStudent->email_verified_at = Carbon::now()->timezone('Asia/Tokyo');
            $oldStudent->password = bcrypt($request->password);
            $oldStudent->created_at = Carbon::now()->timezone('Asia/Tokyo');
            $oldStudent->updated_at = Carbon::now()->timezone('Asia/Tokyo');
            $oldStudent->update();
            return redirect('admin/student/dashboard')->with('success', '学生の情報を修正しました');
        } else {
            return redirect('admin/student/dashboard')->with('error', '存在していません');
        }
    }

    //学生の情報を削除する
    public function destroy($id)
    {
        $student = User::find($id);

        $student->delete();

        return redirect('admin/student/dashboard')->with('success', '学生の情報を削除しました！');
    }
    //ログアウトの処理
    public function logout()
    {
        return view('login');

        Auth::logout();

        return redirect()->route('login');
    }
}
