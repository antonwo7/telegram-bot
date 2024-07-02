@include('include.add', [
    'modalId' => 'add_bot_modal',
    'buttonLabel' => 'Добавить бота'
])

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Токен</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($bots))
            @foreach($bots as $bot)
                <tr @if(!$bot->active){{ "class=table-danger" }}@endif>
                    <td>
                        <a href="{{ url("bot/{$bot->id}") }}">{{ $bot->name }}</a>
                    </td>
                    <td>{{ $bot->token }}</td>
                    <td class="min">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-secondary rounded" data-modal="edit_bot_modal" data-values="{{ json_encode($bot) }}">
                                Изменить
                            </button>
                            <form action="{{ url("/bot/{$bot->id}") }}" data-confirmation method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-sm btn-secondary rounded">Удалить</button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{ $bots->links() }}

@include('include.modals.forms.create-bot')
@include('include.modals.forms.edit-bot')
