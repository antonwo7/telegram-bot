<div class="modal fade bd-example-modal" id="edit_logtype_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Новый тип логов
                </h5>
                <button type="button" class="close" data-action="form-close">
                    <span>x</span>
                </button>
            </div>
            <form action="" data-action="{{ url('/logtype') . '/' }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required placeholder="Название">
                        <input type="number" class="form-control" name="number" required placeholder="Номер">
                        <input type="text" class="form-control" name="color" required placeholder="Bootstrap цвет">
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
