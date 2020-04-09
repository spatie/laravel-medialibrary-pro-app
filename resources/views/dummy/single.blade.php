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
            Single <br>Medialibrary.pro <br>Component
        </p>

        <ul class="mt-4 list-disc leading-loose">
            <li>
                Caption outside/inside
            </li>
            <li>
                Heavy caption assist ~ status
            </li>
            <li>
                Custom file type shortcuts for readability eg:
                <ul class="pl-8 text-sm">
                    <li>'jpg' : 'JPG, JPEG'</li>
                    <li>'image' : 'PNG, GIF, JPG, JPEG'</li>
                    <li>'vector' : 'SVG, PDF'</li>
                    <li>'Word file' : 'DOC, DOCX'</li>
                    <li>'Office file' : '…'</li>
                </ul>
            </li>
            </li>
            <li>
                Custom thumbnail stylesustom container styles
            </li>
            <li>
               Container can layout thumb + outside caption
            </li>
            <li>
                Small/large icons
             </li>
             <li>
                Questions
                <ul class="pl-8 text-sm">
                    <li>Upload complete? </li>
                    <li>Remove icon: rounded thumb, double hover action</li>
                </ul>
            </li>
        </ul>
    </aside>

    <article class="max-w-3xl mx-auto">
        <x-card title="Small square">
            <x-single-file class="" title="Empty">
                <x-media class="w-16 h-16" :empty="true" :small="true" message="Pick or drag image" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-16 h-16" :approaching="true"  :small="true" message="Pick PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-16 h-16" :approaching="true"  :small="true" message="Drag image here"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside">
                <x-media class="w-16 h-16" :approaching="true" :hover="true"  :small="true" message="Drop image to upload"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside, not allowed">
                <x-media class="w-16 h-16" :not-allowed="true" :approaching="true" :small="true" message="Requires PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside, not allowed">
                <x-media class="w-16 h-16" :not-allowed="true" :hover="true" :approaching="true" :small="true" message="Requires < 7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Progress">
                <x-media class="w-16 h-16" :loading="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Uploading 6Mb…" action="Cancel"/>
            </x-single-file>

            <x-single-file class="" title="Server error">
                <x-media class="w-16 h-16" :server-error="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Couldn't read uploaded image" action="Clear"/>
            </x-single-file>

            <x-single-file class="" title="Upload complete?">
                <x-media class="w-16 h-16" :success="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Uploaded!" action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Idle">
                <x-media class="w-16 h-16" src="https://source.unsplash.com/random/400x400" :small="true" action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Idle alt">
                <x-media class="w-16 h-16" src="https://source.unsplash.com/random/400x400" :delete="true" :small="true" message="Pick or drag image" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-16 h-16" :approaching="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Pick PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-16 h-16" :approaching="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Drag image here to replace"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside or click">
                <x-media class="w-16 h-16" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Drop image to replace" />
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-16 h-16" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Requires PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-16 h-16" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :small="true" message="Requires < 7Mb"/>
            </x-single-file>
        </x-card>

        <x-card class="mt-16" title="Small rounded, shadow — parent flex">
            <x-single-file class="flex items-center" title="Empty">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :empty="true" :small="false" message="Pick or drag image" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Hover">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true"  :small="false" message="Pick PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Drag outside">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true"  :small="false" message="Drag image here"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Drag inside">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true" :hover="true"  :small="false" message="Drop image to upload"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Drag outside, not allowed">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :not-allowed="true" :approaching="true" :small="false" message="Requires PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Drag inside, not allowed">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :not-allowed="true" :hover="true" :approaching="true" :small="false" message="Requires < 7Mb"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Progress">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :loading="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Uploading 6Mb…" action="Cancel"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Server error">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :server-error="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Couldn't read uploaded image" action="Clear"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Upload complete?">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :success="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Uploaded!" action="Remove"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Idle">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" src="https://source.unsplash.com/random/400x400" :small="false" action="Remove"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Idle alt">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :delete="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Pick or drag image" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Hover">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Pick PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Drag outside">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Drag image here to replace"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Drag inside or click">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Drop image to replace" />
            </x-single-file>

            <x-single-file class="flex items-center" title="Not allowed">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Requires PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="flex items-center" title="Not allowed & hover">
                <x-media class="mr-4 w-24 h-24 rounded-full shadow-md" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :small="false" message="Requires < 7Mb"/>
            </x-single-file>
        </x-card>

        <x-card class="mt-16" title="Large rectangle, rounded, shadow - Inset text">
            <x-single-file class="" title="Empty">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :empty="true" :inset="true" :small="false" message="Pick or drag image" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true"  :inset="true" :small="false" message="Pick PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true"  :inset="true" :small="false" message="Drag image here"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true" :hover="true"  :inset="true" :small="false" message="Drop image to upload"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside, not allowed">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :not-allowed="true" :approaching="true" :inset="true" :small="false" message="Requires PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside, not allowed">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :not-allowed="true" :hover="true" :approaching="true" :inset="true" :small="false" message="Requires < 7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Progress">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :loading="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Uploading 6Mb…" action="Cancel"/>
            </x-single-file>

            <x-single-file class="" title="Server error">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :server-error="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Couldn't read uploaded image" action="Clear"/>
            </x-single-file>

            <x-single-file class="" title="Upload complete?">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :success="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Uploaded!" action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Idle">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" action="Remove"/>
            </x-single-file>

            <x-single-file class="" title="Idle alt">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :delete="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Pick or drag image" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Pick PNG, JPG or GIF" maxSize="7Mb"/>
            </x-single-file>

            <x-single-file class="" title="Drag outside">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Drag image here to replace"/>
            </x-single-file>

            <x-single-file class="" title="Drag inside or click">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Drop image to replace" />
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Requires PNG, JPG or GIF"/>
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-64 h-32 rounded-lg shadow-xl" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400" :inset="true" :small="false" message="Requires < 7Mb"/>
            </x-single-file>
        </x-card>

    </article>
</body>
</html>
