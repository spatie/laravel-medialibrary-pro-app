<section class="bg-white shadow-md rounded-lg {{ $attributes['class'] ?? '' }}">
    <header class="border-b border-gray-200 px-4 py-5 sm:px-6">
        <h2 class="font-black uppercase tracking-widest">{{ $attributes['title'] ?? '' }}</h2>
    </header>
    <main class="px-4 py-5 sm:p-6">
        {{ $slot }}
    </main>
</section>
