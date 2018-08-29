<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests\MenuRequest;
use Storage;

class MenuController extends Controller
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
        $menues= Menu::orderBy('pos','ASC')->paginate(4);
        return view('menues.index', compact('menues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequest $request)
    {
        $menu = new Menu;

        $menu->file          = $request->file;
        $menu->icologo       = $request->icologo;
        $menu->title         = $request->title;
        $menu->url           = $request->url;
        $menu ->pos          = $request->pos;

        $menu->save();

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $menu->fill(['file' => asset($path)])->save();
        }

        return redirect()->route('menues.index')->with('info', 'El menu fue guardado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = Menu::find($id);
        return view('menues.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = Menu::find($id);
        return view('menues.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $id)
    {
        $menu = Menu::find($id);

        //SAVE IMAGE
        if($request->file('file')){
            $path = Storage::disk('public')->put('image', $request->file('file'));
            $menu->fill(['file' => asset($path)])->save();
        }

        $menu ->icologo      =   $request->icologo;
        $menu ->title        =   $request->title;
        $menu ->url          =   $request->url;
        $menu ->pos          =   $request->pos;

        $menu->save();


        return redirect()->route('menues.index')->with('info', 'El menu fue actualizado');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $menu = Menu::find($id);
      $menu->delete();

      return back()->with('info','El menu fue eliminado');
    }
}
