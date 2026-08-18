<div class="mb-4">
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <textarea class="border border-slate-500 block w-full p-2 rounded" name="{{ $name }}" id="{{ $name }}"
        placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows ?? 4 }}"></textarea>
</div>
