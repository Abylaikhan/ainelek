<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Заголовок</th>
        <th style="width: 15%;">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($blogs as $blog)
        <tr id="{{ $blog->id }}" data-index="{{ $loop->index }}">
            <td>{{ $blog->id }}</td>
            <td>{{ $blog->title }}</td>
            <td>
                <div class='btn-group'>
                    <form action="{{ route('admin.blogs.destroy', $blog) }}" class="d-inline"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class='btn btn-outline-info'><i class="fas fa-pen"></i></a>
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
