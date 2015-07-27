<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\Page;
use App\Model\Comment;

use Redirect,Input,Auth;

class PagesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('admin.pages.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			'title' => 'required|unique:pages|max:255',
			'digest' => 'required'
			]);
		$page = new Page;
		$page->title = Input::get('title');
		$page->body  = Input::get('body');
		$page->digest = Input::get('digest');

		if($page->save()){
			return Redirect::to('admin');
		}else{
			return Rediect::back()->withInput()->withError('保存失败！');
		}

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		return view('admin.pages.edit')->withPage(Page::find($id));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request,$id)
	{
		$this->validate($request,[
			'title' => 'required|unique:pages,title,'.$id.'|max:255',
			'body'  => 'required',
			]);
		$page = Page::find($id);
		$page->title = Input::get('title');
		$page->body = Input::get('body');
		$page->user_id = Auth::user()->id;

		if($page->save()){
			return Redirect::to('admin');
		}else{
			return Redirect::back()->withInput()->withError('保存失败！');
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{	

		$comment = Comment::where('page_id',$id)->delete();
		$page = Page::find($id)->delete();


		return Redirect::to('admin');
	}

}
