<?php

namespace App\Http\Controllers;

use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Posts;
class Pagination extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    //
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
//    dd($request);
    //    $post = new ArticleRequest();
    //    $post->News = $request->News;
    //    $post->Desc = $request->Desc;
    //    $post->Gender = $request->Gender;
    //    $post->save();
    return view('articles.add');

    //    $news = DB::table('new_table')->insert();
    //    dd($request);
    //    $name = $request->input('title');
    //    DB::insert('insert into new_table (, title, desc, gender) values (,?, ?, ?)');
    //    return redirect('/news');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $post = new Posts();
    $post->news = $request->News;
    $post->desc = $request->Desc;
    $post->gender = $request->Gender;
    $post->save();
    $request->session()->flash('status', 'Запись опубликована!');
//    return view('admin.pages.show');

    return view('articles.show');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
    $id_tmp = DB::table('new_table')->where('id', $id)->first();
    $id_tmp->delete();
    return redirect('/news');
  }
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

  public function delete(Request $request){
//    dump($id);
    $id_tmp = DB::table('new_table')->where('id', $id)->first();
    $id_tmp->delete();
    return redirect('/news');
  }

}
