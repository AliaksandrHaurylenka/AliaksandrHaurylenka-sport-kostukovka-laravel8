<?php

namespace App\Http\Controllers;

use App\Models\Director;


class ContactsController extends Controller
{
    function index(){
      $director_sok = Director::where('department', 'Директор СОК')
        ->latest('id')
        ->first();
      $director_sdyshor = Director::where('department', 'Директор СДЮШОР')
        ->latest('id')
        ->first();
		return view('site.contacts', compact('director_sok', 'director_sdyshor'));
	}
}
