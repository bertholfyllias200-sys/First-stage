@props(['errors'])

@if ($errors->any())
    <div
        class="mb-4 p-4 bg-red-100 text-red-700 border border-red-300 rounded shadow-sm dark:bg-red-900 dark:text-red-200"
        x-data
        x-init="gsap.from($el, { opacity: 0, y: -10, duration: 0.5 })"
    >
        <strong class="block font-semibold mb-2">Oups !</strong>
        <ul class="space-y-1 text-sm list-disc list-inside">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
