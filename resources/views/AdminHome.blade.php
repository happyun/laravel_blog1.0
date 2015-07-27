@extends('app')


@section('content')
<div class="container-fluid">
<a href="{{ URL('admin/pages/create') }}" class="btn btn-lg btn-primary">新增</a>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>文章名称</th>
        <th width="200">发表时间</th>
        <th width="200">管理操作</th>
      </tr>
    </thead>
    @foreach ($pages as $page)
      <tr>
        <td>{{ $page->title }}</td>
        <td>{{ $page->created_at}}</td>
        <td><a href="{{ URL('admin/pages/'.$page->id.'/edit') }}" class="btn btn-success btn-sm">修改</a>
        <form action="{{ URL('admin/pages/'.$page->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button onclick="arc_del({{$page->id}})" class="btn btn-success btn-danger">删除</button>
            </form>
        </td>
      </tr>
    @endforeach
  </table>


  <!-- <div class="row">
    <div class="col-md-10 col-md-offset-1">
      <div class="panel panel-default">
        <div class="panel-heading">后台首页</div>
  
        <div class="panel-body">
  
        <a href="{{ URL('admin/pages/create') }}" class="btn btn-lg btn-primary">新增</a>
  
          @foreach ($pages as $page)
            <hr>
            <div class="page">
              <h4>{{ $page->title }}</h4>
              <div class="content">
                <p>
                  {{ $page->body }}
                </p>
              </div>
            </div>
            <a href="{{ URL('admin/pages/'.$page->id.'/edit') }}" class="btn btn-success">编辑</a>
  
            <form action="{{ URL('admin/pages/'.$page->id) }}" method="POST" style="display: inline;">
              <input name="_method" type="hidden" value="DELETE">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-danger">删除</button>
            </form>
          @endforeach
  
        </div>
        
  
  
      </div>
    </div>
  </div> -->
</div>
<div style="width:400px;margin:0 auto;">
   {!!$pages->render()!!}
</div>
<script type="text/javascript">
  function arc_del(aid){
    if(confirm('确定删除吗？')){
      $this.submit();
    }
  }
</script>
@endsection