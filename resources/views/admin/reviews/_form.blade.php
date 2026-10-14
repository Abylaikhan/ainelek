<div class="card-body">
    <div class="form-group">
        <label for="full_name">{{ __('ФИО') }}</label>
        <input name="full_name" id="full_name" type="text"
               class="form-control @error('full_name') is-invalid @enderror"
               value="{{ old('full_name', $review->full_name ?? null) }}">

        @error('full_name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="text">{{ __('Отзыв') }}</label>
        <textarea id="text" name="text"
                  class="form-control">{!! old('text', $review->text ?? null) !!}</textarea>

        @error('text')
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
