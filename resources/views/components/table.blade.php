<section class="relative overflow-hidden w-full my-4 border-2 {{ $attributes["not-allowed"] ? 'border-red-200' : 'border-gray-200' }} rounded">

    @isset($head)
    <div class="sticky top-0 w-full py-2 bg-gray-200 text-gray-500 text-xs">
        @if($attributes["not-allowed"])
            <div class="absolute inset-0 bg-red-200 opacity-25"></div>
        @endif
        {{ $head }}
    </div>
    @endisset

    <div class=relative>
    {{ $slot }}
    @if($attributes["not-allowed"])
        <div class="absolute inset-0 bg-red-200 opacity-25"></div>
    @endif
    </div>
</section>
