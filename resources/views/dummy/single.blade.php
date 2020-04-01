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
        <x-card title="Single file">
            <x-code>
                class="w-16 h-16"
            </x-code>

            <x-single-file class="my-8">
                <x-media class="w-16 h-16" :loading="false"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="my-8">
                <x-media class="w-16 h-16" :loading="false" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="my-8">
                <x-media class="w-16 h-16" :loading="false" src="https://source.unsplash.com/random/400x400"/>
                <x-message error="File is bigger than 7Mb" />
            </x-single-file>

            <x-single-file class="my-8">
                <x-media class="w-16 h-16" :loading="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-code>
                class="w-64 h-32 rounded"
            </x-code>

            <x-single-file class="my-8">
                <x-media class="w-64 h-32 rounded" :loading="false"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="my-8">
                <x-media class="w-64 h-32 rounded" :loading="false" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="my-8">
                <x-media class="w-64 h-32 rounded" :loading="false" src="https://source.unsplash.com/random/400x400"/>
                <x-message error="File should be PNG" />
            </x-single-file>

            <x-single-file class="my-8">
                <x-media class="w-64 h-32 rounded" :loading="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message success="Upload succeeded" />
            </x-single-file>

            <x-code>
                wrapper: flex items-center
                <br>
                media: mr-4 w-32 h-32 rounded-full shadow-md
            </x-code>

            <x-single-file class="my-8 flex items-center">
                <x-media class="mr-4 w-32 h-32 rounded-full shadow-md" :loading="false"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="my-8 flex items-center">
                <x-media class="mr-4 w-32 h-32 rounded-full shadow-md" :loading="false" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="my-8 flex items-center">
                <x-media class="mr-4 w-32 h-32 rounded-full shadow-md" :loading="false" src="https://source.unsplash.com/random/400x400"/>
                <x-message error="File should be PNG" />
            </x-single-file>

            <x-single-file class="my-8 flex items-center">
                <x-media class="mr-4 w-32 h-32 rounded-full shadow-md" :loading="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message success="Upload succeeded" />
            </x-single-file>
        </x-card>

        <x-card title="Table" class="mt-16">
            …
        </x-card>
    </article>
</body>
</html>
