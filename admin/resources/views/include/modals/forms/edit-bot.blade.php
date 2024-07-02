<div class="modal fade bd-example-modal" id="edit_bot_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Редактирование бота
                </h5>
                <button type="button" class="close" data-action="form-close">
                    <span>x</span>
                </button>
            </div>
            <form action="" data-action="{{ url('/bot') . '/' }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required placeholder="Название">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="token" required placeholder="Токен">
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="greeting" rows="3" placeholder="Приветствие"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control-file" name="image" accept="image/*" placeholder="Картинка">
                        <a href="" target="_blank" data-file="image" data-dir="{{ url('/files') . '/' }}" class="d-none">Ссылка на картинку</a>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="bot_active_field" class="form-check-input" name="active" value="1">
                        <label for="bot_active_field">Вкл/Выкл</label>
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
