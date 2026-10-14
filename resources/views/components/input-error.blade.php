@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'error-block']) }}>
        @foreach ((array) $messages as $message)
            <li class="error-message">{{ $message }}</li>
        @endforeach
    </ul>
@endif
