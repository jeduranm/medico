<?php

namespace App\Http\Controllers;

use App\Facility;
use App\Box;
use App\Medico;
use App\Service;
use App\Partner;
use App\Menu;

use Illuminate\Http\Request;

class FrontendController extends Controller
{


   public function index(){

        //Coloco las tablas que voy a mostrar en el welcome
        $facilities= Facility::orderBy('id','DESC')->paginate(8);

        $boxs= Box::orderBy('id','DESC')->paginate(6);

        $medicos= Medico::orderBy('id','DESC')->paginate(4);

        $services= Service::orderBy('id','DESC')->paginate(8);

        $partners= Partner::orderBy('id','DESC')->paginate(8);

        $menues= Menu::orderBy('pos','ASC')->paginate(99);

        //Si tengo varias paginas debo hacer un metodo para cada uno de ellas
        //return view('welcome', compact('products', 'carousels', 'infos', 'features', 'teams'));
        return view('bienvenido', compact('facilities', 'boxs', 'services', 'partners', 'medicos', 'menues'));
       }        


}
