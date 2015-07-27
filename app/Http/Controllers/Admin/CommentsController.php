<?php namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Model\Comment;
use App\Model\Page;
use Redirect, Input;

class CommentsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()

	{	

		return view('admin.comments.index')->withComments(Comment::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
		$this->validate($request,[
			'nickname'=>'required|unique:comments|max:15',
			'content' =>'required|max:255',
			]);
		$comment = new Comment;
		$comment->nickname = htmlspecialchars(Input::get('nickname')) ;
		$comment->email =htmlspecialchars(Input::get('email'));
		$comment->website = htmlspecialchars(Input::get('website'));
		$comment->content = htmlspecialchars(Input::get('content'));

		if($comment->save()){
			return Redirect::to('admin');
		}else{
			return Redirect::back()->withInput()->withError('啊哦，吐槽不成:(');
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
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$comment = Comment::find($id);
		$comment->delete();
		return Redirect::to('admin/comments');
	}

}
