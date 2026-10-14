<div class="card-body">
    <div class="form-group">
        <label for="title">{{ __('Заголовок') }}</label>
        <input name="title" id="title" type="text"
               class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $blog->title ?? null) }}">

        @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">{{ __('Описание') }}</label>
        <textarea id="description" name="description"
                  class="form-control">{!! old('description', $blog->description ?? null) !!}</textarea>

        @error('description')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="keywords">{{ __('Ключевые слова') }}</label>
        <textarea id="keywords" name="keywords"
                  class="form-control">{!! old('keywords', $blog->keywords ?? null) !!}</textarea>

        @error('keywords')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">{{ __('Контент') }}</label>
        <textarea name="content" class="editor tinymce-editor" id="content"
                  placeholder="Кликните, чтобы начать писать...">
                        {!! old('content', $blog->content ?? null) !!}
        </textarea>

        @error('content')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="is_interesting">{{ __('Интересное') }}</label>
        @if (isset($blog) && $blog->is_interesting === 1)
            <input type="checkbox" name="is_interesting" checked="" value="1">
        @else
            <input type="checkbox" name="is_interesting" {{ old('is_interesting') ? 'checked' : '' }} value="1">
        @endif

        @if($errors->has('is_interesting'))
            <div class="invalid-feedback">
                <strong>{{ $message }}</strong>
            </div>
        @endif
    </div>

    <div class="form-group">
        <label for="image">{{ __('Изображение') }}</label>
        @if(isset($blog) && $blog->image)
            <br>
            <img src="{{ $blog->image_path }}" width="300" style="outline: 1px solid #CCC;">
            <br><br>
        @endif
        <input type="file" name="image" id="image"
               class="form-control @error('image') is-invalid @enderror"
               accept="image/png, image/jpeg, image/webp, image/gif">

        @error('image')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

</div>
<div class="card-footer">
    <button type="submit" class="btn btn-success font-weight-bold float-right">
        <i class="fas fa-check-circle fa-fw"></i>
        {{ __('Сохранить') }}
    </button>
</div>
@include('admin.partials.editor')
