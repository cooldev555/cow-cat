@extends('backend.layout.main')

@section('before.css')
<link rel="stylesheet" type="text/css" href="/assets/plugins/select2/select2.min.css">
@endsection

@section('content')
<div class="row">
	<div class="col-md-6">
		<form method="post" action="{{route('menu.store')}}">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">新增菜单</h3>
				</div>
					{{csrf_field()}}
					<div class="box-body">
						<div class="form-group">
							<label>菜单上级</label>
							<select class="form-control select2" style="width: 100%;" name="parent_id">
								<option selected="selected" value="0">顶级分类</option>
								@foreach($tree as $item)
								<option selected="selected" value="{{$item['id']}}">
									{{ $item['html'] }}{{ $item['name'] }}
								</option>
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<label for="name">菜单名称</label>
							<input type="text" class="form-control" id="name" name="name" placeholder="菜单名称" value="{{old('name')}}">
						</div>
						<div class="form-group">
							<label for="route">菜单路由</label>
							<input type="text" class="form-control" id="route" name="route" placeholder="菜单路由" value="{{old('route')}}">
						</div>
						<div class="form-group">
							<label for="description">菜单描述</label>
							<input type="text" class="form-control" id="description" name="description" placeholder="菜单描述" value="{{old('description')}}">
						</div>
						<div class="form-group">
							<label for="icon">菜单图标</label>
							<input type="text" class="form-control" id="icon" name="icon" placeholder="菜单图标" value="{{old('icon')}}">
						</div>
						<div class="form-group">
							<label for="sort">菜单排序</label>
							<input type="text" class="form-control" id="sort" name="sort" placeholder="菜单排序" value="0" value="{{old('sort')}}">
						</div>
						<div class="form-group">
							<label for="hide">是否隐藏</label>
							<div class="form-group">
								<select class="form-control select2" name="hide">
									<option selected="selected" value="0">显示</option>
									<option value="1">隐藏</option>
								</select>
							</div>
						</div>
					</div>
				<div class="box-footer clearfix">
					<button type="submit" class="btn btn-success">
						<i class="fa fa-plus"></i>
						新 增
					</button>
				</div>
			</div>
		</form>
	</div>
</div>
@endsection

@section('after.js')
<script type="text/javascript" src="/assets/plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
$(function(){
	$('.select2').select2();
});
</script>
@endsection
