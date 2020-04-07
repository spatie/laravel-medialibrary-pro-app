
<div class="flex items-start my-8">
    <div class="w-1/4 text-sm font-semibold mr-8">
        {{ $attributes['title'] }}
    </div>
    <div class="{{ $attributes['class'] }}">
        {{ $slot }}
    </div>
</div>


