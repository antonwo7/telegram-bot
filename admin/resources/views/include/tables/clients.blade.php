@include('include.add', [
    'modalId' => 'add_client_modal',
    'buttonLabel' => 'Добавить клиента'
])

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Telegram</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($clients))
            @foreach($clients as $client)
                <tr>
                    <td class="text-center min">{{ $client->id }}</td>
                    <td>{{ $client->telegram_account }}</td>
                    <td class="min">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-secondary rounded"
                                    data-modal="edit_client_modal"
                                    data-values="{{ json_encode($client) }}"
                            >
                                Изменить
                            </button>
                            <form action="{{ url("/client/{$client->id}") }}" data-confirmation method="post">
                                @csrf
                                @method('delete')
                                <input type="hidden" class="form-control" name="bot_id" value="{{ $currentBotId }}">
                                <button type="submit" class="btn btn-sm btn-secondary rounded">Удалить</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $clients->links() }}

@include('include.modals.forms.create-client')
@include('include.modals.forms.edit-client')
