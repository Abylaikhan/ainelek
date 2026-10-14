<button {{ $attributes->merge(['type' => 'submit', 'class' => 'form-btn']) }}>
    {{ $slot }}
</button>
