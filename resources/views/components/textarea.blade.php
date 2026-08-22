<div class="mb-4">
    <label for="{{ $name }}">{{ $label ?? '' }}</label>
    <textarea class="border border-slate-500 block w-full p-2 rounded @error($name) !border-red-600 @enderror "
        name="{{ $name }}" id="{{ $name }}" placeholder="{{ $placeholder ?? '' }}" rows="{{ $rows ?? 4 }}"></textarea>
    @error($name)
        <small class="text-red-600">{{ $message }}</small>
    @enderror
</div>
