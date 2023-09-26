@if ($ticket->isOpen())
    <div style="float: right; margin-left:20px">
        {!! Form::open(['route' => ['admin.tickets.approve', $ticket]]) !!}
        <button class="btn btn-success">Подтвердить</button>
        {{Form::close()}}
    </div>
@endif

@if (!$ticket->isClosed())
    <div style="float: right; margin-left:20px">
        {!! Form::open(['route' => ['admin.tickets.close', $ticket]]) !!}
        <button class="btn btn-warning">Закрыть</button>
        {{Form::close()}}
    </div>
@endif

@if ($ticket->isClosed())
    <div style="float: right; margin-left:20px">
        {!! Form::open(['route' => ['admin.tickets.reopen', $ticket]]) !!}
        <button class="btn btn-success">Открыть снова</button>
        {{Form::close()}}
    </div>
@endif
