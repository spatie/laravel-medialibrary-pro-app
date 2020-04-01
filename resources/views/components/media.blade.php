<div class="relative overflow-hidden bg-gray-100
    {{ $attributes["class"] ?? 'w-16 h-16' }}
    {{ $attributes["loading"] ? 'cursor-wait' : '' }}
    "
>

    @if($attributes["src"])
        <img class="w-full h-full object-cover" src="{{ $attributes["src"] }}">
    @else
        <div class="w-full h-full bg-gray-100 border-2 border-dashed border-gray-300" style="border-radius: inherit;" src="{{ $attributes["src"] }}">
        </div>
    @endif

    @if($attributes["loading"])
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 px-3 flex items-center justify-center">
            <div class="h-1 w-full bg-white rounded-full shadow-inner overflow-hidden">
                <div class="h-full bg-blue-500" style="width:66%">
                </div>
            </div>
        </div>
    @else
        <button style="border-radius: inherit;" class="absolute inset-0 flex items-center justify-center opacity-0 | hover:opacity-100 | transition duration-300 transition-opacity">
            <div style="border-radius: inherit;" class="absolute inset-0 bg-blue-200 opacity-25"></div>
            <span class="z-10 flex-none w-8 h-8 inline-flex items-center justify-center text-white bg-blue-500 rounded-full shadow text-xl font-mono font-black leading-none">＋</span>
        </button>
    @endif
</div>
