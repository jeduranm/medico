<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facility;
use App\Http\Requests\FacilityRequest;
use Storage;

class FacilityController extends Controller
{

    /**
     * Forza login de manera obligatoria
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $facilities= Facility::orderBy('id','DESC')->paginate(4);
        return view('facilities.index', compact('facilities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('facilities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(FacilityRequest $request)
    {
        $facility = new Facility;

        $facility->file          = $request->file;
        $facility->title         = $request->title;

        $facility->save();

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $facility->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('facilities.index')->with('info', 'La instalacion fue guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $facility = Facility::find($id);
        return view('facilities.show', compact('facility'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $facility = Facility::find($id);
        return view('facilities.edit', compact('facility'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(FacilityRequest $request, $id)
    {
        $facility = Facility::find($id);

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $facility->fill(['file' => asset($path)])->save();
        }

        $facility ->title        =   $request->title;

        $facility->save();


        return redirect()->route('facilities.index')->with('info', 'La instalacion fue actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $facility = Facility::find($id);
      $facility->delete();

      return back()->with('info','La instalacion fue eliminada');
    }
}
