<?php

namespace App\Http\Controllers;

use App\Models\RoomFacility;
use Illuminate\Http\Request;

class RoomFacilityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = RoomFacility::all();
        return view('admin.roomfacility.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roomfacility.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = RoomFacility::create($request->all());

        if($post){
            return redirect()->route('roomfacility.index')->with('message', 'Data created!');
        }else{
            return redirect()->route('roomfacility.index')->with('message', 'Failed to create data!');
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
        $data = RoomFacility::find($id);
        return view('admin.roomfacility.edit',compact('data'));
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
        $post = RoomFacility::find($id)->update($request->all());

        if($post){
            return redirect()->route('roomfacility.index')->with('message', 'Data created!');
        }else{
            return redirect()->route('roomfacility.index')->with('message', 'Failed to create data!');
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
        RoomFacility::destroy($id);
        return redirect()->route('roomfacility.index');
    }
}
