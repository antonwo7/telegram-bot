@include('include.modals.forms.filter-log')

<div class="navbar navbar-light justify-content-start">
    <a
        class="pt-1 pb-1 navbar-brand alert alert-secondary @if($activeLogTypeId === null ){{ 'border border-dark' }}@endif"
        href="{{ url('/logs') }}"
    >
        Все
    </a>
    @foreach($logTypes as $logType)
        <a
            class="pt-1 pb-1 navbar-brand alert @if($logType->color){{ "alert-{$logType->color}" }}@endif @if($activeLogTypeId === $logType->id ){{ 'border border-dark' }}@endif"
            href="{{ url("/logs/{$logType->id}") }}"
        >
            {{ $logType->name }}
        </a>
        <form action="{{ url("/logtype/{$logType->id}") }}" class="form-button" data-confirmation method="post">
            @csrf
            @method('delete')
            <button type="submit" class="close">
                <span>&times;</span>
            </button>
        </form>
    @endforeach
    <a
        class="pt-1 pb-1 navbar-brand alert alert-light alert-secondary"
        href="#"
        data-modal="add_logtype_modal"
    >
        Добавить
    </a>
</div>

@include('include.modals.forms.create-logtype')
@include('include.modals.forms.edit-logtype')

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Событие</th>
            <th scope="col">Клиент</th>
            <th scope="col">Бот</th>
            <th scope="col">Примечание</th>
            <th scope="col">Дата-время</th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($logs))
            @foreach($logs as $log)
                <tr @if($log->logType && $log->logType->color){{ "class=table-{$log->logType->color}" }}@endif data-toggle="tooltip" data-placement="top" title="{{ $log->note }}">
                    <td>{{ $log->text }}</td>
                    <td>{{ $log->client ? $log->client->telegram_account : '' }}</td>
                    <td>{{ $log->bot ? $log->bot->name : '' }}</td>
                    <td>{{ $log->note }}</td>
                    <td>{{ $log->created_at }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $logs->withQueryString()->links() }}
