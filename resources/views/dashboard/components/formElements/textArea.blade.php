<label for="TextInput" class="form-label mt-3">{{ $label }} {!! $wajib ?? '' !!}</label>
<textarea id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" class="form-control {{ $class ?? '' }}"
    value="{{ $value ?? '' }}" {{ $attribute ?? '' }} placeholder="{{ $placeholder ?? '' }}" autocomplete="off"
    data-label="{{ $label }}">{{ $value ?? '' }}</textarea>
<span class="text-danger error-text {{ $name }}-error"></span>
