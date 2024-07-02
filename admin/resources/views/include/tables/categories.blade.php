@include('include.add', [
    'modalId' => 'add_category_modal',
    'buttonLabel' => 'Добавить категорию'
])

<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Название</th>
            <th scope="col"></th>
        </tr>
    </thead>
    <tbody>
        @if(!empty($categories))
            @foreach($categories as $category)
                <tr>
                    <td class="text-center min">{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td class="min">
                        <div class="btn-group">
                            <button type="button"
                                    class="btn btn-sm btn-secondary rounded"
                                    data-modal="edit_category_modal"
                                    data-values="{{ json_encode($category) }}"
                            >
                                Изменить
                            </button>
                            <form action="{{ url("/category/{$category->id}") }}" data-confirmation method="post">
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
{{ $categories->links() }}

@include('include.modals.forms.create-category')
@include('include.modals.forms.edit-category')
