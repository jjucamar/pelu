<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
   //

   public function index()
   {
      
       // comprobamos que el usuario este autenticado
       if (Auth::check()) {
           /* spati permite que un usuario pueda tener varios roles
           Con esta expresion nos devuelve un array
           $role = Auth::user()->roles
           con esta funcion le decimos que obtenga el nombre
           ->pluck('name')
           y como lo que nos interesa es que nos devuelva 
           agregamos ->join('') */

           $role = Auth::user()->roles->pluck('name')->join('');
           /* Para comprobar damos en la url  https://jcma.ddns.net/redirects
           *  Y la función dd() en este caso dd($role);
           * */
           

           // En el caso de que el usuario este autenticado y  no tenga ningun rol
           $user = auth()->user();

           //Ahora usamos un switch para cada caso
      
           switch ($role) {
               case 'admin':
                   return view('admin.index');
                   break;
               case 'profesional':
                   return view('profesional.index');
                   break;
               case 'pacient':
                   return view('pacient.index');
                   break;
               case 'user':
                   return view('user.index');
                   break;
               case '':
                   return view('welcome');
                   break;
           }

       } else {
           return view('welcome');
       }
   }

}
