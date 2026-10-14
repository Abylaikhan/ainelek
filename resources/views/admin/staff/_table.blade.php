<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>ФИО</th>
        <th>Должность</th>
        <th style="width: 15%;">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($staffs as $staff)
        <tr id="{{ $staff->id }}" data-index="{{ $loop->index }}">
            <td>{{ $staff->id }}</td>
            <td>{{ $staff->full_name }}</td>
            <td>{{ $staff->position }}</td>
            <td>
                <div class='btn-group'>
                    <form action="{{ route('admin.staff.destroy', $staff) }}" class="d-inline"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.staff.edit', $staff) }}" class='btn btn-outline-info'><i class="fas fa-pen"></i></a>
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
