<table class="table table-bordered">
    <thead>
    <tr>
        <th style="width: 10px">#</th>
        <th>Заголовок</th>
        <th style="width: 15%;">Действия</th>
    </tr>
    </thead>
    <tbody>
    @foreach($faqs as $faq)
        <tr id="{{ $faq->id }}" data-index="{{ $loop->index }}">
            <td>{{ $faq->id }}</td>
            <td>{{ $faq->question }}</td>
            <td>
                <div class='btn-group'>
                    <form action="{{ route('admin.faqs.destroy', $faq) }}" class="d-inline"
                          method="post">
                        @csrf
                        @method('delete')
                        <a href="{{ route('admin.faqs.edit', $faq) }}" class='btn btn-outline-info'><i class="fas fa-pen"></i></a>
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
