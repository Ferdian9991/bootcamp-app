<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\DataSiswa;

class DataSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data_siswa = DataSiswa::get();
        return view("siswa", [
            "siswa" => $data_siswa, 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $confirm = Validator::make($request->all(), [
            'nim' => 'required|max:30',
            'name' => 'required|max:30',
            'email' => 'required|max:30',
        ]);
        if ($confirm->fails()) {
            return redirect('/siswa')
                        ->withErrors($confirm)
                        ->withInput();
        }
        $input = $request->all();

        $insert = DataSiswa::create($input);
        return redirect('/siswa');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $response = DataSiswa::find($id);

        return response()->json(['data_siswa' => $response]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $update = DataSiswa::find($id);
        $update->nim = $request->nim; 
        $update->name = $request->name; 
        $update->email = $request->email;
        $update->save();
        return redirect('/siswa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete = DataSiswa::find($id);
        
        $delete->delete();
        return redirect('/siswa');
    }
}
