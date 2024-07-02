<form method="get" class="mb-4">
    <input type="hidden" value="{{ $activeLogTypeId }}" name="log_type_id">
    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="filter_bot_label">Бот</span>
                </div>
                <input value="{{ request()->bot }}" type="text" name="bot" id="filter_bot" class="form-control" aria-describedby="filter_bot_label">
            </div>
        </div>
        <div class="col-md-5">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="filter_client_label">Клиент</span>
                </div>
                <input value="{{ request()->client }}" type="text" name="client" id="filter_client" class="form-control" aria-describedby="filter_client_label">
            </div>
        </div>
        <div class="col-md-1">
            <button class="btn btn-secondary" type="submit">Найти</button>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="filter_date_from_label">Дата (от)</span>
                </div>
                <input value="{{ request()->date_from ?? null }}" type="date" name="date_from" id="filter_date_from" class="form-control">
            </div>
        </div>
        <div class="col-md-5">
            <div class="input-group mb-2">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="filter_date_to_label">Дата (до)</span>
                </div>
                <input value="{{ request()->date_to ?? null }}" type="date" name="date_to" id="filter_date_to" class="form-control">
            </div>
        </div>
        <div class="col-md-1">
        </div>
    </div>
</form>
