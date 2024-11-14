@props(['breadcrumbs'])
<nav class="flex" aria-label="Breadcrumb">
    <ol class="flex px-3 space-x-2">
        @foreach ($breadcrumbs as $breadcrumb)
            @if ($loop->last)
                <li class="flex">
                    <span class="text-gray-800">{{ $breadcrumb['label'] }}</span>
                </li>
                @break
            @endif
            <li class="flex">
                <a href="{{ $breadcrumb['route'] }}" class="text-gray-400 hover:text-gray-700">
                    <span>{{ $breadcrumb['label'] }}</span>
                </a>
            </li>
            @if (!$loop->last)
                <div class="flex justify-center py-1">
                    <svg class="flex w-4 h-4 text-gray-800" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                        width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m9 5 7 7-7 7" />
                    </svg>
                </div>
            @endif
        @endforeach
    </ol>
</nav>
