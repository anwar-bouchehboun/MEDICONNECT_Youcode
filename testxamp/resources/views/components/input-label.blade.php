@props(['value'])

<label {{ $attributes->merge(['class' => 'block  text-sm text-white font-bold']) }}>
    {{ $value ?? $slot }}
</label>
