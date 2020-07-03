<div class="grid gap-1">
    @if( $attributes['name'] )
    <label class="font-bold text-xs text-gray-500 uppercase tracking-widest">{{ $attributes['name'] }}</label>
    @endif
    <input class="h-10 px-3 border-gray-200 text-gray-700 placeholder-gray-300 border-2 focus:outline-none focus:border-yellow-500 shadow-inner" {{ $attributes }} />
</div>