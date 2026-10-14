<div class="card-body">
    <div class="form-group">
        <label for="title">{{ __('Заголовок') }}</label>
        <input name="title" id="title" type="text"
               class="form-control @error('title') is-invalid @enderror"
               value="{{ old('title', $service->title ?? null) }}">

        @error('title')
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
