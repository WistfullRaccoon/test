@extends('admin.layout')

@section('content')

    <section class="content-header">
        <h1>
            Счета
        </h1>
        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.orders') !!}
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список счетов</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Пользователь</th>
                        <th>Курс</th>
                        <th>Дата оплаты</th>
                        <th>Сумма</th>
                        <th>Действия</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <td>{{$order->id}}</td>
                            <td>{{$order->user->name}}</td>
                            <td>{{$order->group->getCourseName()}}</td>
                            <td>{{$order->payment_time}}</td>
                            <td>{{$order->sum}}</td>
                            <td>
{{--                                @if(!$order->isPaid())--}}
                                    <a href="{{route('admin.orders.pay', $order->id)}}" class="fa fa-money"
                                       data-toggle="tooltip" data-original-title="Пометить оплаченным"></a>
{{--                                @endif--}}
                            </td>
                            {!! Form::close() !!}
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
