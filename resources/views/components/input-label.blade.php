@props(['value'])

<label {{ $attributes->merge(['class' => 'form-type']) }}>
    {{ $value ?? $slot }}
</label>
