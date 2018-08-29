<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Box;
use App\Http\Requests\BoxRequest;
use Storage;

class BoxController extends Controller
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
        $boxs= Box::orderBy('id','DESC')->paginate(4);
        return view('boxs.index', compact('boxs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('boxs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BoxRequest $request)
    {
        $box = new Box;

        $box->file          = $request->file;
        $box->icologo       = $request->icologo;
        $box->title         = $request->title;
        $box->description   = $request->description;

        $box->save();

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $box->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('boxs.index')->with('info', 'La caja fue guardada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $box = Box::find($id);
        return view('boxs.show', compact('box'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $box = Box::find($id);
        return view('boxs.edit', compact('box'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BoxRequest $request, $id)
    {
        $box = Box::find($id);

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $box->fill(['file' => asset($path)])->save();
        }

        $box ->icologo      =   $request->icologo;
        $box ->title        =   $request->title;
        $box ->description  =   $request->description;

        $box->save();


        return redirect()->route('boxs.index')->with('info', 'La caja fue actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $box = Box::find($id);
      $box->delete();

      return back()->with('info','La caja fue eliminada');
    }
}
