<?php

  namespace App\Http\Controllers;

  use App\Models\Board;
  use App\Models\Director;
  use App\Models\Gomelglass;
  use App\Models\History;

  class HistorysController extends Controller
  {
    public function luzhniki()
    {
      $histories = History::all();
      return view('site.luzhniki', compact('histories'));
    }

    public function doska()
    {
      $director_sok = Director::where('department', 'Директор СОК')
                                ->latest('id')
                                ->get();
      $director_sdyshor = Director::where('department', 'Директор СДЮШОР')
                                    ->latest('id')
                                    ->get();
      $boards = Board::all();
      return view('site.doska', compact('director_sok', 'director_sdyshor', 'boards'));
      //return view('site.doska', compact('director_sdyshor', 'boards'));
    }

    public function gomelsteklo()
    {
      $tennis = Gomelglass::where('sport', 'Настольный теннис')->get();
      $sky = Gomelglass::where('sport', 'Лыжи')->get();
      $swimming = Gomelglass::where('sport', 'Плавание')->get();
      $volleyball = Gomelglass::where('sport', 'Волейбол')->get();
      $athletics = Gomelglass::where('sport', 'Многоборье')->get();
      $chess = Gomelglass::where('sport', 'Шахматы')->get();
      $darts = Gomelglass::where('sport', 'Дартс')->get();
      return view('site.gomelsteklo', compact('tennis', 'sky', 'swimming', 'volleyball', 'athletics', 'chess', 'darts'));
    }
  }
