<div class="card-body">
    <div class="form-group">
        <label for="title">{{ __('Заголовок') }}</label>
        <input name="title" id="title" type="text"
               class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $slider->title ?? null) }}">

        @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">{{ __('Описание') }}</label>
        <textarea id="description" name="description"
                  class="form-control">{!! old('description', $slider->description ?? null) !!}</textarea>

        @error('description')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="link">{{ __('Ссылка') }}</label>
        <input name="link" id="link" type="text"
               class="form-control @error('link') is-invalid @enderror"
               value="{{ old('link', $slider->link ?? null) }}">

        @error('link')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="image">{{ __('Изображение') }}</label>
        @if(isset($slider) && $slider->image)
            <br>
            <img src="{{ $slider->image_path }}" width="300" style="outline: 1px solid #CCC;">
            <br><br>
        @endif
        <input type="file" name="image" id="image"
               class="form-control @error('image') is-invalid @enderror"
               accept="image/png, image/jpeg, image/webp, image/gif, image/svg+xml">

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
