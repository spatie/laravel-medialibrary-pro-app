<div class="relative overflow-hidden bg-gray-100
    {{ $attributes["class"] ?? 'w-16 h-16' }}
    {{ $attributes["loading"] ? 'cursor-wait' : 'cursor-pointer' }}
    {{ $attributes["not-allowed"] ? 'cursor-not-allowed' : 'cursor-pointer' }}
">

    {{-- actual image --}}
    @if($attributes["src"])
        <img class="w-full h-full object-cover" src="{{ $attributes["src"] }}">
    @endif

    {{-- colored layer image --}}
    <div class="absolute inset-0
        {{ $attributes["hover"] ? ($attributes["not-allowed"] ? 'bg-red-400 opacity-50' : 'bg-blue-400 opacity-50') : '' }}
        {{ $attributes["approaching"] ? ($attributes["not-allowed"] ? 'bg-red-400 opacity-25' : 'bg-blue-400 opacity-25') : '' }}
        {{ $attributes["server-error"] ? 'bg-red-400 opacity-50' : '' }}
    "></div>

    @if($attributes["loading"])
        <div class="absolute inset-0 bg-black opacity-25"></div>
        <div class="absolute inset-0 px-3 flex items-center justify-center">
            <div class="rounded-full w-full shadow">
                <div class="h-1 w-full bg-white rounded-full shadow-inner overflow-hidden">
                    <div class="h-full bg-blue-500" style="width:66%">
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- inset help --}}
    @if($attributes["inset"])
    <div class="absolute flex justify-center w-full bottom-0 px-2 pb-3">
        <div class="relative text-xs text-center">
            <div style="opacity: {{ $attributes["src"] ? '.5' : '.075' }}" class="absolute rounded-full inset-0 shadow-inner bg-black"></div>
            <div class="relative px-3 py-1  {{ $attributes["src"] ? 'text-white' : 'text-gray-900 opacity-50' }}">

                @if(!$attributes["src"]  && !$attributes["not-allowed"])
                    Pick or drag
                @endif

                {{ $attributes["message"] }}

                @if($attributes["maxSize"])
                    <span class="opacity-50">•</span> < {{ $attributes["maxSize"] }}
                @endif

                @if($attributes["action"])
                    <span class="opacity-50">•</span> <button class="underline">{{ $attributes["action"] }}</button>
                @endif
            </div>
        </div>
    </div>
    @endif

    {{-- border --}}
    <div style="border-radius: inherit" class="absolute inset-0 opacity-25 border-2
        {{ $attributes["server-error"] ? 'border-red-600' : '' }}
        {{ $attributes["approaching"] ? ($attributes["not-allowed"] ? 'border-red-600' : 'border-blue-600') : 'border-gray-500' }}
        {{ $attributes["src"] ? '' : 'border-dashed' }}
    "></div>

    {{-- icons --}}
    <div class="z-10 absolute inset-0 flex items-center justify-center">
        @if($attributes["empty"])
            <span class="{{ $attributes["small"] ? 'w-6 h-6' : 'w-8 h-8' }} flex items-center justify-center rounded-full shadow bg-white text-gray-500 text-lg font-mono leading-none">＋</span>
        @endif

        @if($attributes["approaching"])
            @if($attributes["not-allowed"])
                <span class="overflow-hidden relative {{ $attributes["small"] ? 'w-6 h-6' : 'w-8 h-8' }} rounded-full flex items-center justify-center shadow-md bg-red-500">
                    <span class="{{ $attributes["small"] ? 'w-4 h-4' : 'w-5 h-5' }} overflow-hidden flex items-center justify-center inset-0 rounded-full border-2 border-white">
                        <span style="width:2px; transform: skewX(-15deg)" class="h-full bg-white"></span>
                    </span>
                </span>
            @else
                <span class="{{ $attributes["small"] ? 'w-6 h-6' : 'w-8 h-8 text-xl' }} flex items-center justify-center rounded-full {{ $attributes["hover"] ? 'shadow-inner' : 'shadow' }} bg-blue-500 text-blue-100 font-mono leading-none">
                    {{ $attributes["src"] ? '⥂' : '＋'  }}
                </span>
            @endif
        @endif

        @if($attributes["server-error"])
        <span class="{{ $attributes["small"] ? 'w-6 h-6' : 'w-8 h-8 text-xl' }} flex items-center justify-center rounded-full shadow-md bg-red-500 text-red-100 font-mono leading-none">!</span>
        @endif

        @if($attributes["success"])
        <span class="{{ $attributes["small"] ? 'w-6 h-6' : 'w-8 h-8 text-xl' }} flex items-center justify-center rounded-full shadow-md bg-green-500 text-green-100 font-mono leading-none">✓</span>
        @endif


    </div>

</div>

@if(! $attributes["inset"])
<div class="py-2 text-xs text-center">
    <span class="{{ $attributes["server-error"] ? 'text-red-600' : 'text-gray-600' }}">

        @if(!$attributes["src"]  && !$attributes["not-allowed"])
            Pick or drag
        @endif

        {{ $attributes["message"] }}


        @if($attributes["maxSize"])
            <span class="opacity-50">•</span> < {{ $attributes["maxSize"] }}
        @endif

        @if($attributes["action"])
            <span class="opacity-50">•</span> <button class="underline">{{ $attributes["action"] }}</button>
        @endif
    </span>
</div>
@endif
