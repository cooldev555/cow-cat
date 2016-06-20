@extends('backend.layout.main')
@inject('menuPresenter','App\Presenters\MenuPresenter')

@section('content')
    {!! $menuPresenter->renderLinks($links) !!}
    {!! $menuPresenter->renderSearchForm($inputs) !!}

    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">菜单列表</h3>

                    <div class="box-tools">{!! $data->render() !!}</div>
                </div>

                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tr>
                            <th>菜单编号</th>
                            <th>菜单名称</th>
                            <th>菜单地址</th>
                            <th>菜单排序</th>
                            <th>是否显示</th>
                            <th>操作</th>
                        </tr>
                        @foreach($data as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->route}}</td>
                                <td>{{$item->sort}}</td>
                                <td>{{$menuPresenter->showDisplayFormat($item->hide)}}</td>
                                <td>
                                    <a href="{{route('menu.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                    <button class="btn btn-danger btn-flat"
                                            data-url="{{URL::to('menu/'.$item->id)}}"
                                            data-toggle="modal"
                                            data-target="#delete-modal"
                                    >
                                        删除
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                @if($data->render())
                    <div class="box-footer clearfix">
                        {!! $data->render() !!}
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section("after.js")
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这条菜单吗?'])
@endsection