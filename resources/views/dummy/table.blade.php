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
                Caption outside/inside
            </li>
        </ul>
    </aside>

    <article class="max-w-3xl mx-auto">
        <x-card title="Table">

            <div class="rounded border border-gray-200 p-4">

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

                <table class="w-full my-4">
                    <thead>
                        <tr class="bg-gray-800">
                            <th class="w-8 py-1 text-center text-left text-xs text-gray-100 font-normal">
                                <input type="checkbox">
                            </th>
                            <th class="px-4 py-1 text-left text-xs text-gray-100 font-normal" colspan="3">
                                Select all
                            </th>
                        </tr>
                    </thead>

                    <tbody class="text-sm">
                        <tr class="border-b border-gray-200">
                            <td class="relative align-top bg-gray-100">
                                <div class="w-8 h-full absolute py-4 flex flex-col items-center justify-between">
                                    <input type="checkbox">
                                    <div class="grid gap-1 cursor-move">
                                        <span class="inline-block bg-gray-400 w-4 h-px shadow-sm rounded-full"></span>
                                        <span class="inline-block bg-gray-400 w-4 h-px shadow-sm rounded-full"></span>
                                        <span class="inline-block bg-gray-400 w-4 h-px shadow-sm rounded-full"></span>
                                    </div>
                                </div>
                            </td>
                            <td class="align-top px-4 py-4">
                                <x-media class="w-16 h-16" src="https://source.unsplash.com/random/400x400" :small="true"/>
                            </td>

                            <td class="w-full align-top px-4 py-4 flex justify-start">
                                <div class="grid gap-1 items-center" style="grid-template-columns: auto 1fr">
                                    <label class="text-gray-500 pr-4">Filename</label>
                                    <input type="text" class="px-3 h-8 text-sm border border-gray-300 rounded-sm shadow-inner" value="Random-file.jpg">

                                    <label class="text-gray-500 pr-4">Taxonomy</label>
                                    <input type="text" class="px-3 h-8 text-sm border border-gray-300 rounded-sm shadow-inner" placeholder="Tags…">
                                </div>
                            </td>

                            <td class="align-top px-4 py-4 text-xs text-gray-500">
                                Size: 1.56Mb <br>
                                Type: PNG <br>
                                <a href="#" class="underline">Download original</a>
                            </td>
                        </tr>
                    <tbody>
                </table>
            </div>


        </x-card>


    </article>
</body>
</html>
