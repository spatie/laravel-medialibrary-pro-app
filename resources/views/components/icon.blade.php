@php
    $size = $attributes["extra-small"] ? 'w-4 h-4' : ( $attributes["small"] ? 'w-6 h-6' : 'w-8 h-8');
    $style = "";
    $glyph = "";
    
    if($attributes["type"] === 'add'){
        $glyph = '<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64">
                        <path class="fill-current" d="M46.12,30.07h-12v-12c0-1.1-0.9-2-2-2s-2,0.9-2,2v12h-12c-1.1,0-2,0.9-2,2c0,1.1,0.9,2,2,2h12v12c0,1.1,0.9,2,2,2
                            s2-0.9,2-2v-12h12c1.1,0,2-0.9,2-2C48.12,30.97,47.22,30.07,46.12,30.07z"/>
                    </svg>';
        
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
        $glyph = '<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64">
                    <path class="fill-current" d="M32.12,8.07c-13.25,0-24,10.75-24,24c0,13.25,10.75,24,24,24s24-10.75,24-24C56.12,18.82,45.37,8.07,32.12,8.07z
	 M32.12,12.07c4.8,0,9.2,1.7,12.65,4.52L16.64,44.72c-2.82-3.45-4.52-7.85-4.52-12.65C12.12,21.04,21.09,12.07,32.12,12.07z
	 M32.12,52.07c-4.8,0-9.2-1.7-12.65-4.52l28.13-28.13c2.82,3.45,4.52,7.85,4.52,12.65C52.12,43.1,43.14,52.07,32.12,52.07z"/>
                </svg>';
        

        $style = 'shadow bg-white text-red-500';
    }

    if($attributes["type"] === 'success'){
        $glyph = '<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64">
                    <path class="fill-current" d="M28.6,45.71c-0.82,0-1.61-0.34-2.18-0.93l-9.87-10.39c-1.14-1.2-1.09-3.1,0.11-4.24c1.2-1.14,3.1-1.09,4.24,0.11l7.47,7.86
		L42.9,19.45c1.02-1.31,2.9-1.54,4.21-0.53c1.31,1.02,1.54,2.9,0.53,4.21L30.97,44.55c-0.54,0.69-1.35,1.11-2.22,1.15
		C28.7,45.71,28.65,45.71,28.6,45.71z"/>
                </svg>';
        $style = 'shadow bg-green-500 text-green-100';
    }

    if($attributes["type"] === 'error'){
        $glyph = '<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64">
                    <path class="fill-current" d="M32.12,16.07c-1.66,0-3,1.34-3,3v16c0,1.66,1.34,3,3,3s3-1.34,3-3v-16C35.12,17.41,33.77,16.07,32.12,16.07z"/>
	                <circle class="fill-current" cx="32.12" cy="45.07" r="3"/>
                </svg>';
        $style = 'shadow bg-red-500 text-red-100';
    }

    if($attributes["type"] === 'replace'){
        $glyph = '<svg class="w-full h-full" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 64 64">
                    <path class="fill-current" d="M40.12,39.28H20.77l2.17-2.17c0.78-0.78,0.78-2.05,0-2.83c-0.78-0.78-2.05-0.78-2.83,0l-5.59,5.59
                        c-0.38,0.38-0.59,0.88-0.59,1.41s0.21,1.04,0.59,1.41l5.59,5.59c0.39,0.39,0.9,0.59,1.41,0.59s1.02-0.2,1.41-0.59
                        c0.78-0.78,0.78-2.05,0-2.83l-2.18-2.18h19.35c1.1,0,2-0.9,2-2S41.22,39.28,40.12,39.28z"/>
                    <path class="fill-current" d="M49.71,23.86l-8-8c-0.78-0.78-2.05-0.78-2.83,0c-0.78,0.78-0.78,2.05,0,2.83l4.59,4.59H15.94c-1.1,0-2,0.9-2,2s0.9,2,2,2
                        h27.53l-4.59,4.59c-0.78,0.78-0.78,2.05,0,2.83c0.39,0.39,0.9,0.59,1.41,0.59s1.02-0.2,1.41-0.59l8-8
                        C50.49,25.91,50.49,24.64,49.71,23.86z"/>
                </svg>';
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
