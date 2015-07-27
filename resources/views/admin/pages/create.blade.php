@extends('app')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">新增 Page</div>

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

          <form role="form"  action="{{ URL('admin/pages') }}" method="POST">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                <label for="exampleInputEmail1">文章标题</label>
                <input  class="form-control" name="title" id="exampleInputEmail1" placeholder="请输入文章标题" required="required">
            </div>
            
            <div class="form-group">
                <label for="exampleInputEmail1">摘要</label>
                <textarea name="digest" rows="" cols="" placeholder="请输入摘要" class="form-control" required="required"></textarea>
            </div>

            <div class="form-group">
                <label for="exampleInputEmail1">内容</label>
                <textarea name="body" id="editor_id" cols="30" rows="20" class="form-control" placeholder="请输入内容"></textarea>
              </div>
            <button class="btn btn-lg btn-info">确认发表</button>
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


<!-- <script src="http://cdn.bootcss.com/jquery/1.11.2/jquery.min.js"></script>
<script type="text/javascript" charset="utf-8" src="{sh $smarty.const.__PUBLIC__}/kindeditor/kindeditor.js"></script> -->
@endsection