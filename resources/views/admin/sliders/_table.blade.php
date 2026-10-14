<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Заголовок</th>
        <th style="width: 15%;">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sliders as $slider)
        <tr id="{{ $slider->id }}" data-index="{{ $loop->index }}">
            <td>{{ $slider->id }}</td>
            <td>{{ $slider->title }}</td>
            <td>
                <div class='btn-group'>
                    <form action="{{ route('admin.sliders.destroy', $slider) }}" class="d-inline"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.sliders.edit', $slider) }}" class='btn btn-outline-info'><i class="fas fa-pen"></i></a>
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
