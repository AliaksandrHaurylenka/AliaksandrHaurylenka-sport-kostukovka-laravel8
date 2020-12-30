<?php

namespace App\Http\Controllers;

use App\Models\Director;

use \Mews\Captcha\Captcha;


class ContactsController extends Controller
{
    public function index(){
      //dd(url()->full());
      $director_sok = Director::where('department', 'Директор СОК')
        ->latest('id')
        ->first();
      $director_sdyshor = Director::where('department', 'Директор СДЮШОР')
        ->latest('id')
        ->first();
		return view('site.contacts', compact('director_sok', 'director_sdyshor'));
  }
  
  public function refereshCapcha(){
    return Captcha::img('flat');
    // return captcha_img('flat');
  }
}
