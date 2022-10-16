<div class="form-check form-check-inline ">
    <label class="form-check-label" for="{{ $id ?? '' }}">{{ $label ?? '' }}</label>
    <input class="form-check-input {{ $class ?? '' }} w-100" type="radio" id="{{ $id ?? '' }}" style="width: 100px;"
        name="{{ $name ?? '' }}" data-parsley-multiple="radio" value="{{ $value ?? '' }}" data-label={{ $label }}
        autocomplete="off">
</div>
