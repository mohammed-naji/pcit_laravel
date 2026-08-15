<div class="mb-4">
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <input class="border border-slate-500 block w-full p-2 rounded" type="{{ $type ?? 'text' }}" name="{{ $name }}"
        id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}">
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
