<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Заголовок</th>
        <th style="width: 15%;">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($galleries as $gallery)
        <tr id="{{ $gallery->id }}" data-index="{{ $loop->index }}">
            <td>{{ $gallery->id }}</td>
            <td>{{ $gallery->title }}</td>
            <td>
                <div class='btn-group'>
                    <form action="{{ route('admin.galleries.destroy', $gallery) }}" class="d-inline"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.galleries.edit', $gallery) }}" class='btn btn-outline-info'><i class="fas fa-pen"></i></a>
                        <button type="submit" class="btn btn-outline-danger"  onclick="return confirm('Вы действительно хотите удалить?')">
                            <i class="fas fa-trash fa-fw"></i>
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
