<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomType;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Room::all();
        return view('admin.room.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typeRooms = RoomType::all();
        return view('admin.room.add', compact('typeRooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = Room::create([
            'type_id' => $request->type_id,
            'number' => $request->number,
        ]);

        if($post){
            return redirect()->route('room.index')->with('message', 'Data created!');
        }else{
            return redirect()->route('room.create')->with('message', 'Failed to create data!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typeRooms = RoomType::all();
        $data = Room::find($id);
        return view('admin.room.edit',compact('data', 'typeRooms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Room::find($id)->update([
            'type_id' => $request->type_id,
            'number' => $request->number,
            'status' => $request->status,
        ]);

        if($post){
            return redirect()->route('room.index')->with('message', 'Data created!');
        }else{
            return redirect()->route('room.index')->with('message', 'Failed to create data!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::destroy($id);
        return redirect()->route('room.index');
    }
}
