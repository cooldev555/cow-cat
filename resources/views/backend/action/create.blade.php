@extends("backend.layout.main")

@section("content")
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="{{route('action.store')}}">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">新增操作</h3>
                    </div>
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="group">操作分组</label>
                            <div class="form-group">
                                <select class="form-control select2" name="group">
                                    @foreach(config('cowcat.action-group') as $group)
                                        <option value="{{$group}}">{{$group}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">操作名称</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="操作名称" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label for="description">操作邮箱</label>
                            <input type="text" class="form-control" id="description" name="description" placeholder="操作邮箱" value="{{old('description')}}">
                        </div>
                        <div class="form-group">
                            <label for="action">操作标识</label>
                        </div>
                        <div class="form-group">
                            <label for="state">是否禁用</label>
                            <div class="form-group">
                                <select class="form-control select2" name="state">
                                    <option selected="selected" value="0">禁用</option>
                                    <option value="1">启用</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer clearfix">
                        <a href="javascript:history.back(-1);" class="btn btn-default btn-flat">
                            <i class="fa fa-arrow-left"></i>
                            返回
                        </a>
                        <button type="submit" class="btn btn-success pull-right btn-flat">
                            <i class="fa fa-plus"></i>
                            新 增
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection