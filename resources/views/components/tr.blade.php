<div class="mt-1 relative w-full grid bg-white" style="grid-template-columns: auto auto 1fr 2fr">
    <div class="mr-4 px-2 py-2 bg-gray-200 flex flex-col items-center justify-between">
        @if($attributes['drag'])
            <input class="text-xs" type="checkbox">
            <div class="flex-grow flex items-end cursor-move text-xl text-gray-400 hover:text-indigo-500">
                ≡
            </div>
        @else
            <div class="text-gray-400 cursor-pointer hover:text-indigo-500">
                ↑
            </div>
            <input type="checkbox">
            <div class="text-gray-400 cursor-pointer hover:text-indigo-500">
                ↓
            </div>
        @endif
    </div>

    <div class="mr-4 flex items-center py-6">
        <x-media class="w-16 h-16 block" src="https://source.unsplash.com/random/400x400" :approaching="true" :small="true"/>
    </div>

    <div class="mr-4 flex items-center py-6 text-xs text-gray-500">
        <div>
            Size: 1.56Mb <br>
            Type: PNG <br>
            <a href="#" class="underline">Download original</a>
        </div>
    </div>

    <div class="pr-4 w-full align-top py-6 flex justify-start">
        <div class="w-full grid gap-1 items-center text-xs" style="grid-template-columns: auto 1fr">
            <label class="text-gray-500 pr-4">Filename</label>
            <input type="text" class="w-full px-3 h-6 bg-gray-100 rounded-sm border border-transparent | focus:outline-none focus:bg-indigo-100 focus:border-indigo-500" value="Random-file.jpg">

            <label class="text-gray-500 pr-4">Taxonomy</label>
            <input type="text" class="w-full px-3 h-6 bg-gray-100 rounded-sm border border-transparent | focus:outline-none focus:bg-indigo-100 focus:border-indigo-500" placeholder="Tags…">
        </div>
    </div>

    <button class="mr-4 absolute right-0 top-0 text-xs text-gray-500 underline py-1">
        Remove
    </button>
</div>
