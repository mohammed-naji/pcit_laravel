<div class="mb-4">
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <input class="border border-slate-500 block w-full p-2 rounded @error($name) !border-red-600 @enderror "
        type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder ?? '' }}" autocomplete="new-password" value="{{ old($name) }}">
    @error($name)
        <small class="text-red-600">{{ $message }}</small>
    @enderror
    {{-- @if ($errors->has($name))
        <small class="text-red-600">{{ $errors->first($name) }}</small>
    @endif --}}
</div>

{{-- Ternary Operator
if(condition) {
    true
}else {
    false
}
(condition) ? true : false

Nullesh Operator
$type ?? '' --}}
