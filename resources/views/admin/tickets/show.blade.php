@extends('admin.layout')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Обращения
            <small>Отличный денёк сегодня</small>
        </h1>
        {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
    </section>

    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Обращение номер {{$ticket->id}}</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div style="display: inline-block; margin-bottom: 20px">
                    <a href="{{ route('admin.tickets.edit', $ticket) }}" class="btn btn-primary mr-1">Редактировать</a>

                    <div style="float: right; margin-left:20px">
                        {!! Form::open(['route' => ['admin.tickets.destroy', $ticket], 'method' => 'delete']) !!}
                        <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
                            Удалить
                        </button>
                        {{Form::close()}}
                    </div>

                    @include('admin.tickets._ticket-buttons', ['ticket' => $ticket])

                </div>

                <div class="row">
                    <div class="col-md-7">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td>{{ $ticket->id }}</td>
                            </tr>
                            <tr>
                                <th>Создан</th>
                                <td>{{ $ticket->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Обновлён</th>
                                <td>{{ $ticket->updated_at }}</td>
                            </tr>
                            <tr>
                                <th>Пользователь</th>
                                <td><a href="{{ route('admin.users.show', $ticket->user) }}"
                                       target="_blank">{{ $ticket->user->name }}</a></td>
                            </tr>
                            <tr>
                                <th>Статус</th>
                                <td>
                                    @if ($ticket->isOpen())
                                        <span class="badge" style="background-color: blue">Открыт</span>
                                    @elseif ($ticket->isApproved())
                                        <span class="badge" style="background-color: darkgreen">Подтверждён</span>
                                    @elseif ($ticket->isClosed())
                                        <span class="badge" style="background-color: red">Закрыт</span>
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>

{{--                        <div class="panel panel-primary">--}}
{{--                            <p class="list-group-item-heading" style="font-size: 21px">{{ $ticket->subject }}</p>--}}
{{--                            <hr style="border: none; color: blue; background-color: blue; height: 1px" />--}}
{{--                            <p class="list-group-item-text" style="font-size: 19px">{!! $ticket->content !!}</p>--}}
{{--                        </div>--}}

                        <div class="card" style="border: 1px solid black; margin-bottom: 10px;">
                            <div class="card-block">
                                <h4 class="card-title">{{ $ticket->subject }}</h4>
                                <p class="card-text">{!! $ticket->content !!}</p>
                            </div>
                        </div>


                        @foreach ($messages as $message)
                            <div class="card mb-3" style="border: 1px solid black; margin-bottom: 10px;">
                                <div class="card-header">
                                    {{ $message->created_at }} by {{ $message->user->name }}
                                </div>
                                <div class="card-body">
                                    {!! $message->message !!}
                                </div>
                            </div>
                        @endforeach


                    </div>
                    <div class="col-md-5">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Дата</th>
                                <th>Пользователь</th>
                                <th>Статус</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($statuses as $status)
                                <tr>
                                    <td>{{ $status->created_at }}</td>
                                    <td>{{ $status->user->name }}</td>
                                    <td>
                                        @if ($status->isOpen())
                                            <span class="badge" style="background-color: blue">Открыт</span>
                                        @elseif ($status->isApproved())
                                            <span class="badge" style="background-color: green">Подтверждён</span>
                                        @elseif ($status->isClosed())
                                            <span class="badge" style="background-color: red">Закрыт</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                @if ($ticket->allowsMessages())
                    {!! Form::open(['route' => ['admin.tickets.message', $ticket]]) !!}
                        <div class="form-group">
                            <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" rows="3" required>{{ old('message') }}</textarea>
                            @if ($errors->has('message'))
                                <span class="invalid-feedback"><strong>{{ $errors->first('message') }}</strong></span>
                            @endif
                        </div>

                        <div class="form-group">
                            <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                            <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                        </div>
                    {{Form::close()}}
                @endif
            </div>
        </div>
    </section>

@endsection
