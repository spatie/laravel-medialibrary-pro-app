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
        <x-card title="Small square, no label">
            <x-single-file class="" title="Empty">
                <x-media class="w-16 h-16" :empty="true"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="" title="Approaching">
                <x-media class="w-16 h-16" :approaching="true"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-16 h-16" :approaching="true" :hover="true"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-16 h-16" :not-allowed="true" :approaching="true"/>
                <x-message type="Only PNG, JPG or GIF" />
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-16 h-16" :not-allowed="true" :hover="true" :approaching="true"/>
                <x-message type="Only PNG, JPG or GIF" />
            </x-single-file>

            <x-single-file class="" title="Progress">
                <x-media class="w-16 h-16" :loading="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="Uploading 6Mb…" action="Cancel" />
            </x-single-file>

            <x-single-file class="" title="Server error">
                <x-media class="w-16 h-16" :server-error="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message error="Uploaded file is bigger than 7Mb" />
            </x-single-file>

            <x-single-file class="" title="Upload succeeded">
                <x-media class="w-16 h-16" src="https://source.unsplash.com/random/400x400"/>
                <x-message success="Upload succeeded" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Idle">
                <x-media class="w-16 h-16" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Approaching">
                <x-media class="w-16 h-16" :approaching="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-16 h-16" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-16 h-16" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="Only PNG, JPG or GIF" />
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-16 h-16" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="Only PNG, JPG or GIF" />
            </x-single-file>

        </x-card>

        <x-card class="mt-16" title="Large rectangle, rounded">

            <x-single-file class="" title="Empty">
                <x-media class="w-64 h-32 rounded-md" :empty="true" label="Pick or drop file…"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="" title="Approaching">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :approaching="true"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :approaching="true" :hover="true"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" />
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :not-allowed="true" :approaching="true"/>
                <x-message error="Dragged file is not a PNG, JPG or GIF" />
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :not-allowed="true" :hover="true" :approaching="true"/>
                <x-message error="Dragged file is not a PNG, JPG or GIF" />
            </x-single-file>

            <x-single-file class="" title="Progress">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :loading="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="Uploading 6Mb…" action="Cancel" />
            </x-single-file>

            <x-single-file class="" title="Server error">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :server-error="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message error="Uploaded file is bigger than 7Mb" />
            </x-single-file>

            <x-single-file class="" title="Upload succeeded">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" src="https://source.unsplash.com/random/400x400"/>
                <x-message success="Upload succeeded" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Idle">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Approaching">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :approaching="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Hover">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :approaching="true" :hover="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message type="PNG, JPG or GIF" maxSize="7Mb" action="Remove" />
            </x-single-file>

            <x-single-file class="" title="Not allowed">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :approaching="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message error="Dragged file is not a PNG, JPG or GIF" />
            </x-single-file>

            <x-single-file class="" title="Not allowed & hover">
                <x-media class="w-64 h-32 rounded-md" label="Pick or drop file…" :approaching="true" :hover="true" :not-allowed="true" src="https://source.unsplash.com/random/400x400"/>
                <x-message error="Dragged file is not a PNG, JPG or GIF" />
            </x-single-file>
        </x-card>

    </article>
</body>
</html>
