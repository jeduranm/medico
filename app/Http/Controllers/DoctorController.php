<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App\Http\Requests\DoctorRequest;
use Storage;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors= Doctor::orderBy('id','DESC')->paginate(4);
        return view('doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('doctors.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorRequest $request)
    {
        $doctor = new Doctor;

        $doctor->file          = $request->file;
        $doctor->title         = $request->title;
        $doctor->description   = $request->description;

        $doctor->save();

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $doctor->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('doctors.index')->with('info', 'El doctor fue guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $doctor = Doctor::find($id);
        return view('doctors.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorRequest $request, $id)
    {
        $doctor = Doctor::find($id);

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $doctor->fill(['file' => asset($path)])->save();
        }

        $doctor ->title        =   $request->title;
        $doctor ->description  =   $request->description;

        $doctor->save();


        return redirect()->route('doctors.index')->with('info', 'El doctor fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $doctor = Doctor::find($id);
      $doctor->delete();

      return back()->with('info','El doctor fue eliminado');
    }
}
