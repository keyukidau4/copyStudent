<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;
use Carbon\Carbon;  

class RoomController extends Controller
{
    public function index()
    {
        $dataRooms = DB::table('rooms')->paginate(5);

        return view('admin.room.dashboard', compact('dataRooms'));
    }

    public function create()
    {
        return view('admin.room.create');
    }

    public function store(Request $request)
    {
        $dataRooms = $request->validate(
            [
                'name' => 'required|max:255',
                'available_seat' => 'required|max:30',
                'total_seat' => 'required|max:30',
                'class_status' => 'required',
                'room_id' => 'required|max:255',
            ],
            [
                'name.required' => 'ルームの名前を入れてください',
                'available_seat.required' => '空席を入れてください',
                'available_seat.max' => '席を正しく入れてください（最大：３０）',
                'total_seat.required' => '人数を入れてください',
                'class_status.required' => '状態を選んでください！',
                'room_id.required' => 'ルーム番号を入れてください',
            ]
        );

        $empty = isEmpty(Room::all());

        if (!$empty || Room::where('room_id', $request->room_id)->exists()) {
            return redirect('admin/room/create')->with('error', 'このルームはもう存在しています');
        } else {
            $newRoom = new Room();
            $newRoom->name = $request->name;
            $newRoom->available_seat = $request->available_seat;
            $newRoom->total_seat = $request->total_seat;
            if ($request->total_seat > $request->available_seat) {
                return redirect('admin/room/create')->with('error', '人数が多すぎる(人数＜空席)');
            }
            $newRoom->class_status = $request->class_status;
            $newRoom->room_id = $request->room_id;
            $newRoom->created_at = Carbon::now()->timezone('Asia/Tokyo');
            $newRoom->updated_at = Carbon::now()->timezone('Asia/Tokyo');
            $newRoom->save();
            return redirect('admin/room/dashboard');
        }
    }

    public function edit($id)
    {       
        $room = Room::find($id);

        return view('admin.room.edit',compact('room'));
    }

    public function update(Request $request,$id){
        $dataRooms = $request->validate(
            [
                'name' => 'required|max:255',
                'available_seat' => 'required|max:30',
                'total_seat' => 'required|max:30',
                'class_status' => 'required',
                'room_id' => 'required|max:255',
            ],
            [
                'name.required' => 'ルームの名前を入れてください',
                'available_seat.required' => '空席を入れてください',
                'available_seat.max' => '席を正しく入れてください（最大：３０）',
                'total_seat.required' => '人数を入れてください',
                'class_status.required' => '状態を選んでください！',
                'room_id.required' => 'ルーム番号を入れてください',
            ]
        );

        $oldRoom = Room::find($id);

        if ($oldRoom){
            $oldRoom->name = $request->name;
            $oldRoom->available_seat = $request->available_seat;
            $oldRoom->total_seat = $request->total_seat;
            if ($request->total_seat > $request->available_seat) {
                return redirect('admin/room/create')->with('error', '人数が多すぎる(人数＜空席)');
            }
            $oldRoom->class_status = $request->class_status;
            $oldRoom->room_id = $request->room_id;
            $oldRoom->created_at = Carbon::now()->timezone('Asia/Tokyo');
            $oldRoom->updated_at = Carbon::now()->timezone('Asia/Tokyo');
            $oldRoom->update();
            return redirect('admin/room/dashboard')->with('success','ルーム情報を修正しました！');
        }else{
            return redirect('admin/room/dashboard')->with('error','存在していません');
        }
    }

    public function destroy($id){
        $room = Room::find($id);
        $room->delete();
        return redirect('admin/room/dashboard')->with('success','ルームの情報を削除できました!');
    }

    public function information($id){
        $room = Room::find($id);

        return view('admin.room.information',compact('room'));
    }
}
