<div class="py-2 text-xs text-gray-500">
    @if($attributes["error"] && $attributes["error"] != '')
        <span class="text-gray-500">
            <span class="mr-1 inline-flex items-center justify-center w-4 h-4 rounded-full shadow bg-red-500 text-red-100 font-semibold">!</span>
           {{ $attributes["error"] }}
        </span>
    @elseif($attributes["success"] && $attributes["success"] != '')
        <span class="text-gray-500">
            <span class="mr-1 inline-flex items-center justify-center w-4 h-4 rounded-full shadow bg-green-500 text-green-100 font-semibold">✓</span>
           {{ $attributes["success"] }}
        </span>
    @endif
        <span class="text-gray-500">
            {{ $attributes["type"] }}

            @if($attributes["maxSize"])
                <span class="text-gray-400">•</span> Max. {{ $attributes["maxSize"] }}
            @endif

            @if($attributes["action"])
                <span class="text-gray-400">•</span> <button class="underline">{{ $attributes["action"] }}</button>
            @endif
        </span>
</div>
