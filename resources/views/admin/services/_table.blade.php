<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Заголовок</th>
        <th style="width: 15%;">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($services as $service)
        <tr id="{{ $service->id }}" data-index="{{ $loop->index }}">
            <td>{{ $service->id }}</td>
            <td>{{ $service->title }}</td>
            <td>
                <div class='btn-group'>
                    <form action="{{ route('admin.services.destroy', $service) }}" class="d-inline"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.services.edit', $service) }}" class='btn btn-outline-info'><i class="fas fa-pen"></i></a>
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
