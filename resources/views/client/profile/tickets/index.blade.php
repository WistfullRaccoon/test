<a href="{{route('profile.tickets.create')}}" class="btn btn-info">Создать запрос</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>Тема</th>
        <th>Создан</th>
        <th>Обновлён</th>
        <th>Новые сообщения</th>
        <th>Статус</th>
    </tr>
    </thead>
    <tbody>

    @foreach ($tickets as $ticket)
        <tr>
            <td>{{ $ticket->id }}</td>
            <td><a href="{{ route('profile.tickets.show', $ticket) }}">{{ $ticket->subject }}</a></td>
            <td>{{ $ticket->created_at }}</td>
            <td>{{ $ticket->updated_at }}</td>
            <td>
                @switch($ticket->admin_new_messages)
                    @case(0)
                    Нет новых сообщений
                    @break
                    @case(1)
                    {{$ticket->admin_new_messages}} сообщение
                    @break
                    @default
                    {{$ticket->admin_new_messages}} сообщения
                    @break
                @endswitch
            </td>
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
    @endforeach

    </tbody>
</table>

{{ $tickets->links() }}
