<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Заголовок</th>
        <th style="width: 15%;">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($pages as $page)
        <tr id="{{ $page->id }}" data-index="{{ $loop->index }}">
            <td>{{ $page->id }}</td>
            <td>{{ $page->title }}</td>
            <td>
                <div class='btn-group'>
                    <form action="{{ route('admin.pages.destroy', $page) }}" class="d-inline"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.pages.edit', $page) }}" class='btn btn-outline-info'><i class="fas fa-pen"></i></a>
{{--                        <button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Вы действительно хотите удалить?')">--}}
{{--                            <i class="fas fa-trash fa-fw"></i>--}}
{{--                        </button>--}}
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
