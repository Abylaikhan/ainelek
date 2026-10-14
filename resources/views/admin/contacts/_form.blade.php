<div class="card-body">
    <div class="form-group">
        <label for="type_id">{{ __('Тип') }}</label>
        <select name="type_id" id="type_id"
                class="form-control @error('form') is-invalid @enderror">
            <option value>{{ __('Выберите Тип') }}</option>

            @foreach ($types as $key => $value)
                <option
                    value="{{ $key }}"
                    @if(old('type_id') == $key || isset($contact) && $contact->type_id == $key) selected="selected" @endif
                >
                    {{ $value }}
                </option>
            @endforeach
        </select>

        @error('type_id')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">{{ __('Описание') }}</label>
        <textarea id="content" name="content"
                  class="form-control">{!! old('content', $contact->content ?? null) !!}</textarea>

        @error('content')
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
