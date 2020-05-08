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
                    <li>Max number of files?</li>
                    <li>Filter?</li>
                    <li>Checkboxes?</li>
                    <li>List actions with checkbox? Download? Or only 'remove all'</li>
                    <li>Uploading + other actions at the same time?</li>
                </ul>
            </li>
        </ul>
    </aside>

    <article class="max-w-3xl mx-auto">
        <x-card title="Empty">
            <div class="relative overflow-hidden bg-gray-100 w-full rounded cursor-pointer">
                <div style="border-radius: inherit" class="absolute inset-0 opacity-25 border-2 border-gray-500 border-dashed"></div>

                <x-tr-add :last="true">
                </x-tr-add>
            </div>

            <div class="mt-8 relative overflow-hidden bg-gray-100 w-full rounded cursor-pointer">

                <x-tr-add :last="true" :engage="true">
                </x-tr-add>

                <div style="border-radius: inherit" class="absolute inset-0 opacity-25 border-2 border-blue-500 border-dashed"></div>
            </div>
        </x-card>

        <x-card class="mt-8" title="Row">
            <x-table>
                <x-tr :select="false" :drag="true" :last="true">
                </x-tr>
            </x-table>
        </x-card>

        <x-card class="mt-8" title="Drag vs. move">
            <x-table>
                <x-tr :drag="true" :select="true">
                </x-tr>
                <x-tr :select="true" :last="true">
                </x-tr>
            </x-table>
        </x-card>

        <x-card class="mt-8" title="Selection">
            <x-table>
                <x-slot name="head">
                    <div class="relative w-full grid gap-4 items-center justify-start grid-flow-col">
                        <div class="flex items-center justify-between">
                            <div class="w-8 flex justify-center"><input type="checkbox"></div>
                            <span>
                                Select all
                            </span>
                        </div>

                        <div>
                            <a class="underline" href="#">Remove (3)</a>
                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="true">
                </x-tr>

                <x-tr :drag="true" :select="true" :last="true">
                </x-tr>
            </x-table>

            <x-table>
                <x-slot name="head">
                    <div class="w-full px-4 grid gap-4 items-center justify-end grid-flow-col">
                        <div>
                            <a class="underline" href="#">Download all</a>
                        </div>
                        <div>
                            <a class="underline" href="#">Remove all</a>
                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
            </x-table>

            <x-table>
                <x-slot name="head">
                    <div class="w-full px-3 grid gap-4 items-center justify-end grid-flow-col">
                        <div>
                            <a class="underline" href="#">Download (2)</a>
                        </div>
                        <div>
                            <a class="underline" href="#">Remove (2)</a>
                        </div>
                        <div>
                            <input placeholder="Filter…" class="rounded-full text-gray-800 text-xs px-3 h-6 w-32 bg-gray-100 border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500">
                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
            </x-table>

        </x-card>

        <x-card class="mt-8" title="Add row">
            <x-table>
                <x-slot name="head">
                    <div class="w-full px-3 grid gap-4 items-center justify-end grid-flow-col">
                        <div>
                            <a class="underline" href="#">Download all</a>
                        </div>
                        <div>
                            <a class="underline" href="#">Remove all</a>
                        </div>
                        <div>
                            <input placeholder="Filter…" class="rounded-full text-gray-800 text-xs px-3 h-6 w-32 bg-gray-100 border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500">
                        </div>
                    </div>
                </x-slot>

                <x-tr-add :chrome="true">
                </x-tr-add>
                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
            </x-table>

            <x-table>
                <x-slot name="head">
                    <div class="w-full px-3 grid gap-4 items-center justify-end grid-flow-col">
                        <div>
                            <a class="underline" href="#">Download all</a>
                        </div>
                        <div>
                            <a class="underline" href="#">Remove all</a>
                        </div>
                        <div>
                            <input placeholder="Filter…" class="rounded-full text-gray-800 text-xs px-3 h-6 w-32 bg-gray-100 border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500">
                        </div>
                    </div>
                </x-slot>

                <x-tr-add :chrome="true" :engage="true">
                </x-tr-add>
                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
            </x-table>
        </x-card>

        <x-card class="mt-8" title="Add row compact">
            <x-table>
                <x-slot name="head">
                    <div class="w-full pr-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            <a class="flex items-center" href="#">
                                <span class="w-8 flex justify-center mr-2"><x-icon type="add" :small="true"/></span>
                                <span class="underline">Pick or drag images < 7Mb</span>
                            </a>
                        </div>
                        <div class="grid gap-4 items-center justify-end grid-flow-col">
                            <div>
                                <a class="underline" href="#">Download all</a>
                            </div>
                            <div>
                                <a class="underline" href="#">Remove all</a>
                            </div>
                            <div>
                                <input placeholder="Filter…" class="rounded-full text-gray-800 text-xs px-3 h-6 w-32 bg-gray-100 border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500">
                            </div>
                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
            </x-table>

            <x-table :not-allowed=true>
                <x-slot name="head">
                    <div class="w-full pr-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            <a class="flex items-center" href="#">
                                <span class="w-8 flex justify-center mr-2"><x-icon type="not-allowed" :small="true"/></span>
                                <span class="">Pick or drag images < 7Mb</span>
                            </a>
                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false" :mute="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :mute="true">
                </x-tr>
            </x-table>

            <x-table :engage=true>
                <x-slot name="head">
                    <div class="w-full pr-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            <a class="flex items-center" href="#">
                                <span class="w-8 flex justify-center mr-2"><x-icon type="add" :small="true" :engage="true"/></span>
                                <span class="">Drop images to add</span>
                            </a>
                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false" :mute="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :mute="true">
                </x-tr>
            </x-table>

            <x-table>
                <x-slot name="head">
                    <div>&nbsp;</div>
                </x-slot>

                <x-tr :drag="true" :select="false" mute="true" :engage="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :mute="true">
                </x-tr>
            </x-table>
        </x-card>

        <x-card class="mt-8" title="Sticky header or scroll content">
            <x-table :sticky="true">
                <x-slot name="head">
                    <div class="w-full pr-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            <a class="flex items-center" href="#">
                                <span class="w-8 flex justify-center mr-2">
                                    <x-icon type="add" :small=true />
                                </span>
                                <span class=underline>Pick or drag images < 7Mb</span>
                            </a>
                        </div>
                        <div class="grid gap-4 items-center justify-end grid-flow-col">
                            <div>
                                <a class="underline" href="#">Download all</a>
                            </div>
                            <div>
                                <a class="underline" href="#">Remove all</a>
                            </div>
                            <div>
                                <input placeholder="Filter…" class="rounded-full text-gray-800 text-xs px-3 h-6 w-32 bg-gray-100 border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500">
                            </div>
                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true">
                </x-tr>
            </x-table>

            <x-table :footer="true">
                <x-slot name="head">
                    <div class="w-full pr-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            <a class="flex items-center" href="#">
                                <span class="w-8 flex justify-center mr-2">
                                    <x-icon type="add" :small=true />
                                </span>
                                <span class=underline>Pick or drag images < 7Mb</span>
                            </a>
                        </div>
                        <div class="grid gap-4 items-center justify-end grid-flow-col">
                            <div>
                                <a class="underline" href="#">Download all</a>
                            </div>
                            <div>
                                <a class="underline" href="#">Remove all</a>
                            </div>
                            <div>
                                <input placeholder="Filter…" class="rounded-full text-gray-800 text-xs px-3 h-6 w-32 bg-gray-100 border border-transparent | focus:outline-none focus:bg-white focus:border-indigo-500">
                            </div>
                        </div>
                    </div>
                </x-slot>

                <div style="height: 20rem" class="overflow-x-scroll">
                    <x-tr :drag="true" :select="false">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                    <x-tr :drag="true" :select="false" :last="true">
                    </x-tr>
                </div>
            </x-table>
        </x-card>

        <x-card class="mt-8" title="Progress">
            <x-table :loading="true">
                <x-slot name="head">
                    <div class="w-full px-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            Uploading 2 files (12 Mb)…
                        </div>
                        <div class="grid gap-4 items-center justify-end grid-flow-col">

                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :loading="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :loading="true">
                </x-tr>
            </x-table>
        </x-card>

        <x-card class="mt-8" title="Errors">
            <x-table :loading="true" :errors="true">
                <x-slot name="head">
                    <div class="w-full px-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            Uploading 2 files (12 Mb)…
                        </div>
                        <div class="grid gap-4 items-center justify-end grid-flow-col">

                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :loading="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :loading="true">
                </x-tr>
            </x-table>

            <x-table :loading="true">
                <x-slot name="head">
                    <div class="w-full px-4 flex gap-4 items-center justify-between grid-flow-col">
                        <div>
                            Uploading 2 files (12 Mb)…
                        </div>
                        <div class="grid gap-4 items-center justify-end grid-flow-col">

                        </div>
                    </div>
                </x-slot>

                <x-tr :drag="true" :select="false" :server-error="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :loading="true">
                </x-tr>
                <x-tr :drag="true" :select="false" :last="true" :loading="true">
                </x-tr>
            </x-table>
        </x-card>
    </article>
</body>
</html>
