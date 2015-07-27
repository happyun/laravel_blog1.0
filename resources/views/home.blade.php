@extends('_layouts.default')

@section('content')
	<div id="title" style="text-align: center;background-color:#eee;margin:0 0">
		<h1>Learn Laravel 5</h1>
		<div style="padding: 5px; font-size: 16px;">{{ Inspiring::quote() }}</div>
	</div>
	<hr>

	<div id="content">
		<ul>
			@foreach ($pages as $page)
			<li style="margin: 50px 0;border-bottom:1px solid #eee;list-style-type:none">
				<div class="title">
				<div><span style="font-size:17px;color:green;display:block;float:right;">{{App\Model\Comment::where('page_id','=',$page->id)->count()}}Comments</span></div>
					<a href="{{ URL('pages/'.$page->id) }}">
						<h1 >{{ $page->title }}</h1>
					</a>
					
				</div>
				<div class="body">
					<p style="font-size:16px">{{ $page->digest }}...</p>
					<a href="{{ URL('pages/'.$page->id) }}">
						<h5 style="color:green;">Read More</h5>
					</a>
				</div>
			</li>
			@endforeach
		</ul>
		
	{!! $pages->render() !!}
	
	</div>

@endsection
