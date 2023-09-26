@extends('admin.layout')

@section('content')

    <!-- Content Wrapper. Contains page content -->
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Обращения
        </h1>
        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render('admin.tickets') !!}
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Список обращений</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Тема</th>
                        <td>Статус</td>
                        <td>Новые сообщения</td>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>
                                <a href="{{route('admin.tickets.show', $ticket)}}">{{$ticket->subject}}</a>
                            </td>
                            <td>
                                @if ($ticket->isOpen())
                                    <span class="badge" style="background-color: blue;">Открыт</span>
                                @elseif ($ticket->isApproved())
                                    <span class="badge" style="background-color: green;">Подтверждён</span>
                                @elseif ($ticket->isClosed())
                                    <span class="badge" style="background-color: black;">Закрыт</span>
                                @endif
                            </td>

                            <td>
                                @switch($ticket->user_new_messages)
                                    @case(0)
                                    Нет новых сообщений
                                    @break
                                    @case(1)
                                    {{$ticket->user_new_messages}} сообщение
                                    @break
                                    @default
                                    {{$ticket->user_new_messages}} сообщения
                                    @break
                                @endswitch
                            </td>

                            <td>
                                <a href="{{route('admin.tickets.edit', $ticket->id)}}" class="fa fa-pencil"
                                   data-toggle="tooltip" data-original-title="Редактировать обращение"></a>
                                {!! Form::open(['route' => ['admin.tickets.destroy', $ticket->id], 'method' => 'delete']) !!}
                                <button onclick="return confirm('Вы уверены?')" type="submit" class="delete"
                                        data-toggle="tooltip" data-original-title="Удалить обращение">
                                    <i class="fa fa-trash-o"></i>
                                </button>
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
