@extends('admin.layout')

@section('content')

    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Разделы
        </h1>
{{--        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.categories') !!}--}}
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список разделов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Тип элемента</th>
                        <th>Причина</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($claims as $claim)
                        <tr>
                            <td>{{$claim->id}}</td>
                            <td>{{$claim->element_type}}</td>
                            <td>{{$claim->reason}}</td>
                            <td>
{{--                                <a href="{{route('admin.categories.edit', $claim->id)}}" class="fa fa-pencil"--}}
{{--                                   data-toggle="tooltip" data-original-title="Редактировать раздел"></a>--}}
{{--                                {{ Form::open(['route' => ['admin.categories.destroy', $claim->id], 'method' => 'delete']) }}--}}
{{--                                <button onclick="return confirm('Are you sure?')" type="submit" class="delete"--}}
{{--                                        data-toggle="tooltip" data-original-title="Удалить раздел">--}}
{{--                                    <i class="fa fa-trash-o"></i>--}}
{{--                                </button>--}}
{{--                                {{ Form::close() }}--}}
                            </td>

                        </tr>
                    @endforeach
                    </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
@endsection
