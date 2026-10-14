<div class="card-body">
    <div class="form-group">
        <label for="full_name">{{ __('ФИО') }}</label>
        <input name="full_name" id="full_name" type="text"
               class="form-control @error('full_name') is-invalid @enderror"
               value="{{ old('full_name', $staff->full_name ?? null) }}">

        @error('full_name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="position">{{ __('Должность') }}</label>
        <textarea id="position" name="position"
                  class="form-control">{!! old('position', $staff->position ?? null) !!}</textarea>

        @error('position')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>


    <div class="form-group">
        <label for="image">{{ __('Изображение') }}</label>
        @if(isset($staff) && $staff->image)
            <br>
            <img src="{{ $staff->image_path }}" width="300" style="outline: 1px solid #CCC;">
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
