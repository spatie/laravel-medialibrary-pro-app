<div class="relative inline-block {{ $attributes["class"] ?? 'w-16 h-16' }}">
    <div class="relative overflow-hidden bg-gray-100
        {{ $attributes["class"] ?? 'w-16 h-16' }}
        {{ $attributes["loading"] ? 'cursor-wait' : '' }}
        {{ $attributes["not-allowed"] ? 'cursor-not-allowed' : '' }}
        {{ $attributes["approaching"] ?
            $attributes["not-allowed"] ? 'border-red-200' : 'border-blue-200'
            :
            'border-gray-200' }}
        {{ $attributes["src"] ? '' : 'border-2 border-dashed' }}
        "
    >

        @if($attributes["src"])
            <img class="w-full h-full object-cover" src="{{ $attributes["src"] }}">
        @endif

        <div class="absolute inset-0
        {{ $attributes["hover"] ?
            $attributes["src"] ?
                ($attributes["not-allowed"] ? 'bg-white opacity-50' : 'bg-blue-700 opacity-50') :
                ($attributes["not-allowed"] ? 'bg-red-100' : 'bg-blue-100')
            :
            ($attributes["server-error"]? 'bg-red-700 opacity-50' : '') }}">

        </div>

        <div class="absolute inset-0 flex items-center justify-center">
            @if($attributes["empty"])
                <span class="w-8 h-8 flex items-center justify-center rounded-full shadow bg-white text-gray-400 text-xl font-mono font-semibold leading-none">＋</span>
            @endif

            @if($attributes["approaching"])
                @if($attributes["not-allowed"])
                    <span style="border-width:3px;" class="overflow-hidden w-8 h-8 flex items-center justify-center rounded-full border-red-500">
                       <span style="width:3px; height:200px; transform: skewX(-15deg)" class="bg-red-500"></span>
                    </span>
                @else
                    <span class="w-8 h-8 flex items-center justify-center rounded-full shadow-inner bg-blue-400 text-blue-100 text-xl font-mono font-semibold leading-none">＋</span>
                @endif
            @endif

            @if($attributes["label"])
                <span class="text-xs px-3 truncate underline text-gray-500">{{ $attributes["label"] }}</span>
            @endif
        </div>

        @if($attributes["loading"])
            <div class="absolute inset-0 bg-gray-800 opacity-50"></div>
            <div class="absolute inset-0 px-3 flex items-center justify-center">
                <div class="h-1 w-full bg-white rounded-full shadow-inner overflow-hidden">
                    <div class="h-full bg-blue-500" style="width:66%">
                    </div>
                </div>
            </div>
        @endif

    </div>
</div>
