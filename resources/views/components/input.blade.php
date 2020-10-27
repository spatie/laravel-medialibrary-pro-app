<input class="h-10 px-3 border-gray-200 text-gray-700 placeholder-gray-300 border-2 focus:outline-none focus:border-yellow-500 shadow-inner" {{ $attributes }} />
@error($attributes['name'])
    <div class="rounded-sm text-xs mb-8 px-4 py-2 bg-red-100 text-red-500">{{ $message }}</div>
@enderror
