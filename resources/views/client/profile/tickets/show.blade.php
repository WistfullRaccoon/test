@extends('client.profile.layout')

@section('content')

    <div class="d-flex justify-content-center">
        <div class="container" style="margin-top:18px; margin-bottom:100px">
            <div class="box-header with-border">
                {!! \DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs::render() !!}
                <h3 class="box-title">Информация о запросе</h3>
            </div>

            <div class="box-body">
                <div>
                    <div class="d-flex flex-row mb-3">
                            <a class="btn btn-default" href="{{url()->previous()}}">Назад</a>
                        @if ($ticket->canBeRemoved())

                            {!! Form::open(['route' => ['profile.tickets.destroy', $ticket], 'method' => 'delete']) !!}
                            <button onclick="return confirm('Вы уверены?')" type="submit" class="btn btn-danger">
                                Удалить
                            </button>
                            {!! Form::close() !!}

                        @endif
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
                                    <th>Статус</th>
                                    <td>
                                        @if ($ticket->isOpen())
                                            <span class="badge badge-info">Открыт</span>
                                        @elseif ($ticket->isApproved())
                                            <span class="badge badge-success">Подтверждён</span>
                                        @elseif ($ticket->isClosed())
                                            <span class="badge badge-dark">Закрыт</span>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
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
                                @foreach ($ticket->statuses()->orderBy('id')->with('user')->get() as $status)
                                    <tr>
                                        <td>{{ $status->created_at }}</td>
                                        <td>{{ $status->user->name }}</td>
                                        <td>
                                            @if ($status->isOpen())
                                                <span class="badge badge-info">Открыт</span>
                                            @elseif ($status->isApproved())
                                                <span class="badge badge-success">Подтверждён</span>
                                            @elseif ($status->isClosed())
                                                <span class="badge badge-dark">Закрыт</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="card mb-3">
                        <div class="card-header">
                            {{ $ticket->subject }}
                        </div>
                        <div class="card-body">
                            {!! $ticket->content !!}
                        </div>
                    </div>

                    @foreach ($messages as $message)
                        <div class="card mb-3">
                            <div class="card-header">
                                {{ $message->created_at }} by {{ $message->user->name }}
                            </div>
                            <div class="card-body">
                                {!! $message->message !!}
                            </div>
                        </div>
                    @endforeach

                    @if ($ticket->allowsMessages())

                        {{ Form::open([
                            'route' => ['profile.tickets.message', $ticket],
                            'files' => true,
                            ])}}
                            <div class="form-group">
                                <textarea class="form-control{{ $errors->has('message') ? ' is-invalid' : '' }}" name="message" rows="3" required>{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('message') }}</strong></span>
                                @endif
                            </div>

                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Отправить сообщение</button>
                            </div>

                    {{Form::close()}}
                    @endif

                </div>
            </div>
        </div>
    </div>


@endsection
