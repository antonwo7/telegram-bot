<div class="modal fade bd-example-modal" id="add_client_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Добавление клиента в бот
                </h5>
                <button type="button" class="close" data-action="form-close">
                    <span>x</span>
                </button>
            </div>
            <form action="{{ url('/client') }}" method="post">
                @csrf
                <input type="hidden" class="form-control" name="bot_id" value="{{ $currentBotId }}">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="telegram_account" required placeholder="Телеграм">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="telegram_account_id" required placeholder="Телеграм ID">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="msp_key" placeholder="MSP KEY">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-action="form-close">Закрыть</button>
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>
