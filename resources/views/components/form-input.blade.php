@props([
    'name',
    'label' => null,
    'type' => 'text',
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'error' => null
])

<div>
    @if($label)
        <label for="{{ $name }}" class="form-label-campaign">
            {{ $label }}
            @if($required)
                <span class="text-red-500">*</span>
            @endif
        </label>
    @endif

    <input
        type="{{ $type }}"
        id="{{ $name }}"
        name="{{ $name }}"
        value="{{ $value }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'form-input-campaign'
        ]) }}
    >

    @error($name)
        <p class="form-error-campaign">{{ $message }}</p>
    @enderror
</div>
