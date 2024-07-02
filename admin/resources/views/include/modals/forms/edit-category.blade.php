<div class="modal fade bd-example-modal" id="edit_category_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Редактирование категории
                </h5>
                <button type="button" class="close" data-action="form-close">
                    <span>x</span>
                </button>
            </div>
            <form action="" data-action="{{ url('/category') . '/' }}" method="post">
                @csrf
                @method('patch')
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" required value="" placeholder="Название">
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
