<div class="card-body">

    <div class="form-group">
        <label for="title">{{ __('Заголовок') }}</label>
        <textarea id="title" name="title"
                  class="form-control">{!! old('title', $gallery->title ?? null) !!}</textarea>

        @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">{{ __('Изображение') }}</label>
        @if(isset($gallery) && $gallery->image)
            <br>
            <img src="{{ $gallery->image_path }}" width="200" style="outline: 1px solid #CCC;">
            <br><br>
        @endif
        <input type="file" name="image" id="image"
               class="form-control @error('image') is-invalid @enderror"
               accept="image/*">

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
