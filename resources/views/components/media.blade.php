<div class="relative overflow-hidden bg-gray-100
    {{-- default size --}}
    {{ $attributes["class"] ?? 'w-16 h-16' }}
    {{-- cursors --}}
    {{ $attributes["loading"] ? 'cursor-wait' : ($attributes["not-allowed"] ? 'cursor-not-allowed' : 'cursor-pointer') }}
">
    {{-- actual image --}}
    @if($attributes["src"])
        <img class="w-full h-full object-cover" src="{{ $attributes["src"] }}">
    @endif

    {{-- colored layer image --}}
    <div class="absolute inset-0
        {{ $attributes["engage"] ? ($attributes["not-allowed"] ? 'bg-red-300 opacity-50' : 'bg-indigo-300 opacity-50') : '' }}
        {{ $attributes["approaching"] ? ($attributes["not-allowed"] ? 'bg-red-300 opacity-25' : 'bg-indigo-300 opacity-25') : '' }}
        {{ $attributes["server-error"] ? 'bg-red-300 opacity-50' : '' }}
    "></div>

     {{-- load bar --}}
    @if($attributes["loading"])
        <div class="absolute inset-0 bg-black opacity-25"></div>
        <div class="absolute inset-0 px-3 flex items-center justify-center">
            <div class="rounded-full w-full shadow">
                <div class="h-1 w-full bg-white rounded-full shadow-inner overflow-hidden">
                    <div class="h-full bg-indigo-500" style="width:66%">
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- inset caption --}}
    @if($attributes["inset"])
    <div class="absolute flex justify-center w-full bottom-0 px-2 pb-3">
        <div class="relative text-xs text-center">
            <div style="-webkit-mix-blend-mode: multiply; mix-blend-mode: multiply; opacity: {{ ( $attributes["src"] || $attributes["error"] ) ? '.7' : '.075' }}" 
                class="absolute rounded-full inset-0 shadow-inner {{ ($attributes["server-error"] || $attributes["error"]) ? 'bg-red-600' : 'bg-gray-700' }} 
            "></div>
            <div class="relative px-3 py-1  {{ ( $attributes["src"] || $attributes["error"] ) ? 'text-gray-100' : 'text-gray-700 opacity-75' }}">

                    {{ $attributes["message"] }}

                    @if($attributes["action"])
                        @if($attributes["message"])<span class="opacity-50">•</span> @endif<button class="underline hover:opacity-75">{{ $attributes["action"] }}</button>
                    @endif
            </div>
        </div>
    </div>
    @endif

    {{-- border layer --}}
    <div style="border-radius: inherit" class="absolute inset-0 border-2
        {{ $attributes["server-error"] ? 'border-red-600' : '' }}
        {{ $attributes["approaching"] ? ($attributes["not-allowed"] ? 'border-red-600' : 'border-indigo-600') : 'border-gray-600' }}
        {{ $attributes["src"] ? 'opacity-50 ' : 'opacity-25 border-dashed' }}
    "></div>

    {{-- icons --}}
    <div class="z-10 absolute inset-0 flex items-center justify-center">
        @if($attributes["not-allowed"])
            <x-icon type="not-allowed" :small="$attributes['small']" :approaching="$attributes['approaching']" :engage="$attributes['engage']"/>
        @elseif($attributes["server-error"])
            <x-icon type="error" :small="$attributes['small']" />  
        @elseif($attributes["success"])
            <x-icon type="success" :small="$attributes['small']" />
        @elseif($attributes["src"] && $attributes["approaching"])
            <x-icon type="replace" :small="$attributes['small']" :approaching="$attributes['approaching']" :engage="$attributes['engage']"/>        
        @elseif(!$attributes["src"] && !$attributes["loading"])
            <x-icon type="add" :small="$attributes['small']" :approaching="$attributes['approaching']" :engage="$attributes['engage']"/>
        @endif

    </div>
</div>



@if(! $attributes["inset"] && ($attributes["message"] || $attributes["action"]))
<div class="py-1 text-xs text-center">
    <span class="{{ ($attributes["server-error"] || $attributes["error"]) ? 'text-red-600' : 'text-gray-600' }}">

        {{ $attributes["message"] }}

        @if($attributes["action"])
            @if($attributes["message"])<span class="opacity-50">•</span> @endif<button class="underline hover:opacity-75">{{ $attributes["action"] }}</button>
        @endif
    </span>
</div>
@endif
