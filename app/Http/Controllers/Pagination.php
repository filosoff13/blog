<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
class Pagination extends Controller
{
  public function users()
  {
    if (request()->has('gender')){
      $news = DB::table('new_table')->where('gender', request('gender'))
        ->paginate(3)->appends('gender', request('gender'));
    } else {
      $news = DB::table('new_table')->paginate(3);
    }

    return view('pagination', ['news' => $news]);
  }

  public function create(){
    return view('articles.add');
  }

  public function show($id){

  }

  public function edit($id){

  }

  public function delete(Request $request){
//    dump($id);
    $id_tmp = DB::table('new_table')->where('id', $id)->first();
    $id_tmp->delete();
    return redirect('/news');
  }

  public function store($id){

  }
}
