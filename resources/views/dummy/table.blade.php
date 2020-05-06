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
            Medialibrary.pro <br>Table <br>Component
        </p>

        <ul class="mt-4 list-disc leading-loose">
            <li>
                Drag or click to sort
            </li>
            <li>
                Questions
                <ul class="pl-8 text-sm">
                    <li>Checkboxes?</li>
                    <li>List actions met check? Download? of: remove all</li>
                </ul>
            </li>
        </ul>
    </aside>

    <article class="max-w-3xl mx-auto">
        <x-card title="Table">

            <div class="rounded bg-gray-100 border border-gray-200 p-4">
                <div class="relative overflow-hidden bg-gray-100 w-full h-32 rounded cursor-pointer">
                    <div class="absolute flex justify-center w-full bottom-0 px-2 pb-3">
                        <div class="relative text-xs text-center">
                            <div style="-webkit-mix-blend-mode: multiply; mix-blend-mode: multiply; opacity: .075" class="absolute rounded-full inset-0 shadow-inner bg-gray-700 "></div>
                            <div class="relative px-3 py-1  text-gray-700 opacity-75">
                                Pick or drag images &lt; 7Mb each
                            </div>
                        </div>
                    </div>

                    <div style="border-radius: inherit" class="absolute inset-0 opacity-25 border-2 border-gray-500 border-dashed"></div>

                    <div class="z-10 absolute inset-0 flex items-center justify-center">
                        <span class="w-8 h-8 flex items-center justify-center rounded-full shadow bg-white text-indigo-500 text-lg font-mono leading-none">＋</span>
                    </div>
                </div>

                <section class="w-full my-4">
                    <div class="relative w-full grid gap-4 items-center py-2 bg-gray-200 text-gray-500 text-xs" style="grid-template-columns: auto 1fr">
                        <div class="flex items-center justify-between">
                            <div style="margin-left: 1px;" class="px-2"><input type="checkbox"></div>
                            <span>
                                Select all
                            </span>
                        </div>

                        <div>
                            <a class="underline" href="#">Remove (3)</a>
                        </div>
                    </div>

                    <x-tr :drag="true">
                    </x-tr>
                    <x-tr>
                    </x-tr>
                </section>

                <section class="w-full my-4">
                    <div class="relative w-full grid px-4 gap-4 items-center justify-end py-2 bg-gray-200 text-gray-500 text-xs" style="grid-template-columns: auto auto">
                        <div>
                            <a class="underline" href="#">Download all</a>
                        </div>
                        <div>
                            <a class="underline" href="#">Remove all</a>
                        </div>
                    </div>

                    <x-tr :drag="true">
                    </x-tr>
                    <x-tr>
                    </x-tr>
                </section>

                <section class="w-full my-4">
                    <div class="relative w-full grid px-4 gap-4 items-center justify-end py-2 bg-gray-200 text-gray-500 text-xs" style="grid-template-columns: auto auto auto">
                        <div>
                            <a class="underline" href="#">Download all</a>
                        </div>
                        <div>
                            <a class="underline" href="#">Remove all</a>
                        </div>
                        <div>
                            <input placeholder="Filter…" class="rounded-full text-gray-800 text-xs px-3 py-1 w-32 bg-gray-100 border border-transparent | focus:outline-none focus:bg-indigo-100 focus:border-indigo-500">
                        </div>
                    </div>

                    <x-tr :drag="true">
                    </x-tr>
                    <x-tr>
                    </x-tr>
                </section>
            </div>


        </x-card>


    </article>
</body>
</html>
