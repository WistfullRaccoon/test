@extends('admin.layout')

@section('content')

    <section class="content-header">
        <h1>
            Обращения
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Редактировать тикет</h3>
                @include('admin.errors')
            </div>
            <div class="box-body">
                {!! Form::open(['route' => ['admin.tickets.update', $ticket], 'method' => 'put']) !!}
                <div class="col-md-5">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Название</label>
                        <input type="text" class="form-control" id="ticketSubject" placeholder=""
                               value="{{$ticket->subject}}" name="subject">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Статус</label>
                        {{Form::select('category_id',
                          $statuses,
                          null,
                          ['class' => 'form-control select2']
                        )}}
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Текст</label>
                        <textarea name="content" id="" cols="30" rows="5"
                                  class="form-control">{!! $ticket->content !!}</textarea>
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                <button class="btn btn-warning pull-right">Изменить</button>
            </div>
            <!-- /.box-footer-->
            {!! Form::close() !!}
        </div>
        <!-- /.box -->

    </section>


@endsection
