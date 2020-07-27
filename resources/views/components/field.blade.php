<div class="grid gap-2 w-full max-w-lg">
    @if( $attributes['label'] )
    <label class="font-bold text-xs text-gray-500 uppercase tracking-widest">{{ $attributes['label'] }}</label>
    @endif
    {{ $slot }}
</div>