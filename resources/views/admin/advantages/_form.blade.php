<div class="card-body">

    <div class="form-group">
        <label for="title">{{ __('Заголовок') }}</label>
        <textarea id="title" name="title"
                  class="form-control">{!! old('title', $advantage->title ?? null) !!}</textarea>

        @error('title')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">{{ __('Описание') }}</label>
        <textarea id="description" name="description"
                  class="form-control">{!! old('description', $advantage->description ?? null) !!}</textarea>

        @error('description')
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
