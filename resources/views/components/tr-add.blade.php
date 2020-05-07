<div class="{{ $attributes['last'] ? '' : 'border-b border-gray-200' }} relative overflow-hidden w-full rounded cursor-pointer grid" style="grid-template-columns: auto auto 1fr 2fr">

    @if($attributes['chrome'])
    <div class="w-8 mr-4 px-2 py-2 bg-gray-100 border-r border-200 flex flex-col items-center justify-between"></div>
    @else
    <div class="w-4"></div>
    @endif

    @if($attributes['engage'])
    <div class="absolute inset-0 bg-indigo-300 opacity-50"></div>
    @endif

    <div class="relative mr-4 py-2 flex items-center">
        <div class="absolute overflow-hidden {{ $attributes['engage'] ? 'bg-indigo-100' : 'bg-gray-300' }} mt-1 ml-1 w-16 h-16">
            <div class="absolute inset-0"></div>
            <div style="border-radius: inherit" class="absolute inset-0 opacity-25 border-2 border-gray-500"></div>
        </div>
        <div class="relative overflow-hidden {{ $attributes['engage'] ? 'bg-white' : 'bg-gray-200' }} w-16 h-16">
            <div class="absolute inset-0"></div>
            <div style="border-radius: inherit" class="absolute inset-0 opacity-25 border-2 border-gray-500"></div>
            <div class="z-10 absolute inset-0 flex items-center justify-center">
                <span class="w-6 h-6 flex items-center justify-center rounded-full {{ $attributes["engage"] ? 'shadow-inside text-white bg-indigo-500' : 'shadow bg-white text-indigo-500' }} text-lg font-mono leading-none">＋</span>
            </div>
        </div>
    </div>

    <div class="mr-4 flex items-center text-xs text-gray-600">
        <div>
            @if($attributes['engage'])
            Drop images to add
            @else
            Maximum size: 1.56Mb <br>
            Allowed type: PNG
            @endif
        </div>
    </div>


</div>
