@props([
    'name',
    'label' => null,
    'value' => null,
    'placeholder' => null,
    'required' => false,
    'rows' => 4
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

    <textarea
        id="{{ $name }}"
        name="{{ $name }}"
        rows="{{ $rows }}"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
        {{ $attributes->merge([
            'class' => 'form-textarea-campaign'
        ]) }}
    >{{ $value }}</textarea>

    @error($name)
        <p class="form-error-campaign">{{ $message }}</p>
    @enderror
</div>
