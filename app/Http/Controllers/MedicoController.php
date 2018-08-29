<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Medico;
use App\Http\Requests\MedicoRequest;
use Storage;

class MedicoController extends Controller
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
        $medicos= Medico::orderBy('id','DESC')->paginate(4);
        return view('medicos.index', compact('medicos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicoRequest $request)
    {
        $medico = new Medico;

        $medico->file          = $request->file;
        $medico->name         = $request->name;
        $medico->position   = $request->position;

        $medico->save();

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $medico->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('medicos.index')->with('info', 'El medico fue guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $medico = Medico::find($id);
        return view('medicos.show', compact('medico'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico = Medico::find($id);
        return view('medicos.edit', compact('medico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MedicoRequest $request, $id)
    {
        $medico = Medico::find($id);

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $medico->fill(['file' => asset($path)])->save();
        }

        $medico ->name        =   $request->name;
        $medico ->position  =   $request->position;

        $medico->save();


        return redirect()->route('medicos.index')->with('info', 'El medico fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $medico = Medico::find($id);
      $medico->delete();

      return back()->with('info','El medico fue eliminado');
    }
}
