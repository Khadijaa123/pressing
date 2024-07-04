<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //

    public function submit(Request $request)
    {
        $name = $request->input('username');
        $pwd = $request->input('pwd');
if (($name= "test")&&($pwd= "test")){
        return redirect()->route('home')->with('success', 'Formulaire soumis avec succès!');
    } 
    else{
        return back()->with('success', 'Formulaire soumis avec succès!');
    }
    }


}
