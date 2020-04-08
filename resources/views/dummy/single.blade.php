<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medialibrary Dummy Design</title>

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
    <meta name="msapplication-TileColor" content="#c42543">
    <meta name="theme-color" content="#ffffff">

    <link href="https://unpkg.com/tailwindcss@^1.2/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="px-8 py-16 text-gray-800 bg-gray-100">
    <aside class="max-w-3xl mx-auto mb-16 px-4 sm:px-6">
        <p class="text-2xl leading-snug font-bold">
            Static <br>Medialibrary.pro <br>Components
        </p>
    </aside>

    <article class="max-w-3xl mx-auto">
        <x-card title="Small square">
            <x-single-file class="" title="Empty">
                <x-media class="w-16 h-16" :empty="true" :small="true" message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-16 h-16" :approaching="true"  :small="true" message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside or hover">
                <x-media class="w-16 h-16" :approaching="true" :hover="true"  :small="true" message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside, not allowed">
                <x-media class="w-16 h-16" :not-allowed="true" :approaching="true" :small="true" message="Accepts PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside, not allowed">
                <x-media class="w-16 h-16" :not-allowed="true" :hover="true" :approaching="true" :small="true" message="Accepts 7Mb max."/>
            </x-single-file>

            <x-single-file class="" title="Progress">
                <x-media class="w-16 h-16" :loading="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Uploading 6Mb…" action="Cancel"/>
            </x-single-file>

            <x-single-file class="" title="Server error">
                <x-media class="w-16 h-16" :server-error="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Uploaded file is bigger than 7Mb" action="Clear"/>
            </x-single-file>

            <x-single-file class="" title="Upload succeeded">
                <x-media class="w-16 h-16" :success="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Upload complete"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Idle">
                <x-media class="w-16 h-16" src="https://source.unsplash.com/random/400x400" :small="true" message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-16 h-16" :approaching="true" src="https://source.unsplash.com/random/400x400" :small="true" message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside or hover">
                <x-media class="w-16 h-16" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400" :small="true" message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-16 h-16" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Accepts PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-16 h-16" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Accepts PNG, JPG or GIF"/>
            </x-single-file>
        </x-card>

        <x-card class="mt-16" title="Small rounded, shadow (Parent has flex)">
             <x-single-file class="flex items-center" title="Empty">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :empty="true"   message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Drag outside">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :approaching="true"    message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Drag inside or hover">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :approaching="true" :hover="true"    message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Drag outside, not allowed">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :not-allowed="true" :approaching="true"   message="Accepts PNG, JPG or GIF"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Drag inside, not allowed">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :not-allowed="true" :hover="true" :approaching="true"   message="Accepts 7Mb max."/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Progress">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :loading="true" src="https://source.unsplash.com/random/400x400"   message="Uploading 6Mb…" action="Cancel"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Server error">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :server-error="true" src="https://source.unsplash.com/random/400x400"   message="Uploaded file is bigger than 7Mb" action="Clear"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Upload succeeded">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :success="true" src="https://source.unsplash.com/random/400x400"   message="Upload complete"  action="Remove"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Idle">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" src="https://source.unsplash.com/random/400x400"   message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Drag outside">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :approaching="true" src="https://source.unsplash.com/random/400x400"   message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Drag inside or hover">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400"   message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Not allowed">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400"   message="Accepts PNG, JPG or GIF"/>
            </x-single-file>

             <x-single-file class="flex items-center" title="Not allowed & hover">
                <x-media class="w-24 h-24 mr-4 rounded-full shadow-lg" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400"   message="Accepts PNG, JPG or GIF"/>
            </x-single-file>
        </x-card>

        <x-card class="mt-16" title="Large rectangle, rounded, shadow">
            <x-single-file class="" title="Empty">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :empty="true" message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :approaching="true"  message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside or hover">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :approaching="true" :hover="true"  message="PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside, not allowed">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :not-allowed="true" :approaching="true" message="Accepts PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside, not allowed">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :not-allowed="true" :hover="true" :approaching="true" message="Accepts 7Mb max."/>
            </x-single-file>

            <x-single-file class="" title="Progress">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :loading="true" src="https://source.unsplash.com/random/400x400" message="Uploading 6Mb…" action="Cancel"/>
            </x-single-file>

            <x-single-file class="" title="Server error">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :server-error="true" src="https://source.unsplash.com/random/400x400" message="Uploaded file is bigger than 7Mb" action="Clear"/>
            </x-single-file>

            <x-single-file class="" title="Upload succeeded">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :success="true" src="https://source.unsplash.com/random/400x400" message="Upload complete"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Idle">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" src="https://source.unsplash.com/random/400x400" message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :approaching="true" src="https://source.unsplash.com/random/400x400" message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside or hover">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400" message="PNG, JPG or GIF" maxSize="7Mb"  action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" message="Accepts PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-64 h-32 rounded shadow" :inset="true" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" message="Accepts PNG, JPG or GIF"/>
            </x-single-file>
        </x-card>

    </article>
</body>
</html>
