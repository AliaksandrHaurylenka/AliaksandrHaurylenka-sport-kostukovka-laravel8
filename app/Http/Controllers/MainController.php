<?php

namespace App\Http\Controllers;

use App\Models\Main;
use App\Models\Section;

class MainController extends Controller
{
    public function index()
    {
//        dump(url()->full());
//        dump(url()->current());
//        dump(url()->previous());
//        dump(url()->route('main'));
        $sections = Section::all();
        $sections_1 = Section::where('id', '<=', 3)->get();
        $sections_2 = Section::where('id', '>', 3)->get();
        $slides = Main::where('block', 'Слайд')->get();
        $buildings = Main::where('block', 'Сооружение')->whereNotNull('description')->get();
        $gallery = Main::where('block', 'Сооружение')->whereNull('description')->get();

        return view('site.main', compact('slides', 'buildings', 'gallery', 'sections', 'sections_1', 'sections_2'));
    }
}
