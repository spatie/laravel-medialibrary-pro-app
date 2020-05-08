<section class="relative w-full my-4 border-2 {{ $attributes["engage"] ? 'border-blue-200' : ($attributes["not-allowed"] ? 'border-red-200' : 'border-gray-200') }} rounded">


    @isset($head)
    <div class="{{ $attributes['sticky'] ? 'sticky top-0' : 'relative' }} w-full py-2 bg-gray-200 text-gray-600 text-xs">

        @if($attributes['engage'])
            <div class="absolute inset-0 bg-indigo-300 opacity-50"></div>
        @endif

        @if($attributes['not-allowed'])
            <div class="absolute inset-0 bg-red-300 opacity-50"></div>
        @endif

        <div class=relative>
            {{ $head }}
        </div>
    </div>
    @endisset

    @if($attributes["loading"])
    <div>
        <div class="w-full">
            <div style="height: 2px;" class="w-full bg-indigo-200 overflow-hidden">
                <div class="h-full bg-indigo-500" style="width:66%">
                </div>
            </div>
        </div>
    </div>
    @endif

    @if($attributes["errors"])
    <div class="relative grid w-full bg-white border-gray-200 border-b" style="grid-template-columns: 3rem 1fr">
        <div class="relative py-3 mr-4 flex justify-center items-start bg-red-100 border-r border-red-200">
            <div class="absolute inset-0 bg-red-200 opacity-25"></div>
            <div class="z-10"><x-icon type="error" :extra-small="true" /></div>
        </div>
        <div class="py-2">
            <div class="absolute inset-0 bg-red-100 opacity-25"></div>
            <div class="z-10 mb-4 h-6 flex items-center text-xs text-red-600">These 3 files are not PNGs and won't be uploaded</div>

            <div class="z-10 grid gap-2 col-start-2">
                <div class="flex justify-start items-center">
                    <x-media class="mr-2 w-8 h-8 block" src="https://source.unsplash.com/random/200x200" message="biggie-file-451.jpg" :small="true"/>
                </div>
                <div class="flex justify-start items-center">
                    <x-media class="mr-2 w-8 h-8 block" src="https://source.unsplash.com/random/200x250" message="biggie-file-451.jpg" :small="true"/>
                </div>
                <div class="flex justify-start items-center">
                    <x-media class="mr-2 w-8 h-8 block" src="https://source.unsplash.com/random/200x230" message="biggie-file-451.jpg" :small="true"/>
                </div>
            </div>
        </div>
        <div class="relative py-3 mr-4 flex justify-center items-start bg-red-100 border-r border-red-200">
            <div class="absolute inset-0 bg-red-200 opacity-25"></div>
            <div class="z-10"><x-icon type="error" :extra-small="true" /></div>
         </div>
        <div class="py-2">
            <div class="absolute inset-0 bg-red-100 opacity-25"></div>
            <div class="z-10 mb-4 h-6 flex items-center text-xs text-red-600">This file is bigger than 7Mb. and won't be uploaded</div>

            <div class="z-10 grid gap-2 col-start-2">
                <div class="flex justify-start items-center">
                    <x-media class="mr-2 w-8 h-8 block" src="https://source.unsplash.com/random/200x202" message="biggie-file-451.png" :small="true"/>
                </div>
            </div>
        </div>


        <button class="mr-4 absolute right-0 top-0 mt-2 text-xs text-red-400 underline py-1">
            Clear errors
        </button>

    </div>

@endif

    <div class=relative>
    {{ $slot }}
    @if($attributes["not-allowed"])
        <div class="absolute inset-0 bg-red-200 opacity-25"></div>
    @endif
    @if($attributes["engage"])
        <div class="absolute inset-0 bg-indigo-200 opacity-25"></div>
    @endif
    </div>

    @if($attributes["footer"])
    <div>
        <div class="w-full text-center py-1 text-xs text-gray-600  bg-gray-200 border-t border-gray-300">
            13 files • 21 Mb total
        </div>
    </div>
    @endif
</section>
