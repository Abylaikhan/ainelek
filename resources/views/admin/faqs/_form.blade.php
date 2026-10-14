<div class="card-body">
    <div class="form-group">
        <label for="question">{{ __('Вопрос') }}</label>
        <textarea id="question" name="question"
                  class="form-control">{!! old('question', $faq->question ?? null) !!}</textarea>

        @error('question')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-group">
        <label for="content">{{ __('Ответ') }}</label>
        <textarea name="answer" class="editor tinymce-editor" id="content"
                  placeholder="Кликните, чтобы начать писать...">
                        {!! old('answer', $faq->answer ?? null) !!}
        </textarea>

        @error('answer')
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
