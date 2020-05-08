@php
    $size = $attributes["extra-small"] ? 'w-4 h-4' : ( $attributes["small"] ? 'w-6 h-6' : 'w-8 h-8');
    $style = "";
    $glyph = "";
    
    if($attributes["type"] === 'add'){
        $glyph = '<svg class="w-full h-full"><use xlink:href="#icon-add" /></svg>';
        
        if($attributes["engage"]){
            $style = 'shadow-inside text-white bg-indigo-500';
        }
        elseif($attributes["approaching"]){
            $style = 'shadow-xl bg-white text-indigo-500';
        }
        else{
            $style = 'shadow bg-white text-indigo-500';
        }
    }

    if($attributes["type"] === 'not-allowed'){
        $glyph = '<svg class="w-full h-full"><use xlink:href="#icon-not-allowed" /></svg>';

        $style = 'shadow bg-white text-red-500';
    }

    if($attributes["type"] === 'success'){
        $glyph = '<svg class="w-full h-full"><use xlink:href="#icon-success" /></svg>';
        $style = 'shadow bg-green-500 text-green-100';
    }

    if($attributes["type"] === 'error'){
        $glyph = '<svg class="w-full h-full"><use xlink:href="#icon-error" /></svg>';
        $style = 'shadow bg-red-500 text-red-100';
    }

    if($attributes["type"] === 'replace'){
        $glyph = '<svg class="w-full h-full"><use xlink:href="#icon-replace" /></svg>';
        if($attributes["engage"]){
            $style = 'shadow-inside text-white bg-indigo-500';
        }
        elseif($attributes["approaching"]){
            $style = 'shadow-xl bg-white text-indigo-500';
        }
        else{
            $style = 'shadow bg-white text-indigo-500';
        }
    }

@endphp

<span class="{{ $size }} {{ $style }} flex items-center justify-center rounded-full font-mono leading-none">
    {!! $glyph !!}
</span>
