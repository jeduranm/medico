<?php

namespace App\Http\Controllers;

use App\Facility;

use Illuminate\Http\Request;

class FrontendController extends Controller
{


   public function index(){

        //Coloco las tablas que voy a mostrar en el welcome
        $facilities= Facility::orderBy('id','DESC')->paginate(4);

        //Si temgo varias paginas debo hacer un metodo para cada uno de ellas
        //return view('welcome', compact('products', 'carousels', 'infos', 'features', 'teams'));
        return view('bienvenido', compact('facilities'));
       }        


}
