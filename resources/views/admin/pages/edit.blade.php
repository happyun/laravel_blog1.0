@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">编辑 Page</div>

        <div class="panel-body">

          @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form role="form" action="{{ URL('admin/pages/'.$page->id) }}" method="POST">
            <div class="form-group">
              <label for="exampleInputEmail">文章标题</label>
            <input class="form-control" name="title" id="exampleInputEmail1" name="title" placeholder="请输入文章标题" required="required" value="{{ $page->title }}">
            </div> 

            <div class="form-group">
              <label for="exampleInputEmail1">摘要</label>
              <textarea name="digest" rows="" cols="" required="required" placeholder="请输入摘要" class="form-control">{{$page->digest}}</textarea>
          </div>

          <div class="form-group">
              <label for="exampleInputEmail1">内容</label>
              <textarea name="body" id="editor_id" cols="30" rows="20" class="form-control"required="required" placeholder="请输入内容">{!!$page->body!!}</textarea>
          </div>

            <input  name="_method" type="hidden" value="PUT">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
            
            <button type="submit" class="btn btn-lg btn-primary">修改</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript" src="{{ asset('/js/jquery-1.6.js') }}"></script>
<script type="text/javascript" src="{{ asset('/js/kindeditor/kindeditor.js') }}"></script>

<script>
        KindEditor.ready(function(K) {
                window.editor = K.create('#editor_id');
        });
       
</script>
@endsection