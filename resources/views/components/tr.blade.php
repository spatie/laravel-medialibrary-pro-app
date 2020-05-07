<div class="{{ $attributes['last'] ? '' : 'border-b border-gray-200' }} relative w-full grid bg-white" style="grid-template-columns: 3rem auto 1fr 2fr">
    <div class="mr-4 px-2 py-2 bg-gray-100 border-r border-200 flex flex-col items-center justify-between">
        @if(!$attributes['mute'])
            @if($attributes['drag'])
                @if($attributes['select'])
                    <input class="text-xs" type="checkbox">
                    <div class="flex-grow flex items-end cursor-move leading-none text-xl text-gray-400 hover:text-indigo-500">
                        ≡
                    </div>
                @else
                <div class="flex-grow flex items-center cursor-move leading-none text-xl text-gray-400 hover:text-indigo-500">
                    ≡
                </div>
                @endif
            @else
                <div class="text-gray-400 cursor-pointer hover:text-indigo-500">
                    ↑
                </div>
                @if($attributes['select'])
                    <input class="text-xs" type="checkbox">
                @else
                    <div></div>
                @endif
                <div class="text-gray-400 cursor-pointer hover:text-indigo-500">
                    ↓
                </div>
            @endif
        @endif
    </div>

    <div class="mr-4 flex items-center py-6">
        <x-media class="w-16 h-16 block" src="https://source.unsplash.com/random/400x400" :server-error="$attributes['server-error']" :loading="$attributes['loading']" :approaching="$attributes['engage']" :engage="$attributes['engage']" :small="true"/>
    </div>

    <div class="mr-4 flex items-center py-6 text-xs text-gray-500">
        <div>
            @if($attributes['engage'])
                Drop image to replace
            @elseif($attributes['loading'])
                Uploading 6Mb…

                <br><button class="underline hover:opacity-75">Cancel</button>
            @elseif($attributes['server-error'])
                <span class=text-red-600>Couldn't read file</span>
            @else

                Size: 1.56Mb <br>
                Type: PNG <br>
                @if(!$attributes['mute'])
                    <a href="#" class="underline">Download original</a>
                @endif
            @endif
        </div>
    </div>

    <div class="pr-4 w-full align-top py-6 flex justify-start">
        <div class="w-full grid gap-1 items-center text-xs" style="grid-template-columns: auto 1fr">
            <label class="text-gray-500 pr-4">Filename</label>
            <input type="text" class="w-full px-3 h-6 bg-gray-100 rounded-sm border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500" value="Random-file.jpg">

            <label class="text-gray-500 pr-4">Taxonomy</label>
            <input type="text" class="w-full px-3 h-6 bg-gray-100 rounded-sm border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500" placeholder="Tags…">
        </div>
    </div>

    @if(!$attributes['mute'])
    <button class="mr-4 absolute right-0 top-0 text-xs text-gray-500 underline py-1">
        Remove
    </button>
    @endif

</div>
