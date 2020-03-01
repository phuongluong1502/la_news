<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dstl = Theloai::all();
        return view('admin.theloai.index', compact('dstl'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.theloai.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tl= new theloai([
            'TenTL' => $request->get('TenTL'),
            'ThuTu' => $request->get('ThuTu'),
            'AnHien'=> $request->get('AnHien'),
            'HienMenu'=> $request->get('HienMenu'),
            'lang'=> $request->get('lang'),
        ]);
        $tl->save();
        return redirect('/theloai')->with('success','Thể loại đã được lưu');
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
        $tl = Theloai::find($id);
        return view('admin.theloai.edit', compact('tl')); 

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
        $tl = theloai::find($id);
        $tl->TenTL = $request->get('TenTL');
        $tl->ThuTu = $request->get('ThuTu');
        $tl->AnHien = $request->get('AnHien');
        $tl->HienMenu = $request->get('HienMenu');
        $tl->lang = $request->get('lang');
        $tl->save();
        return redirect('/theloai')->with('success','Cập nhật thành công!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tl = theloai::find($id);
        $tl->delete();
        return redirect('/theloai')->with('success', 'Đã xóa xong');

    }
}
