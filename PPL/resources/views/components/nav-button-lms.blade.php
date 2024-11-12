@props(['route', 'id', 'label'])

<a href="{{ route($route, $id) }}"
   class="px-6 py-2 border border-black font-semibold text-gray-700 rounded-lg
          @if(request()->routeIs($route)) bg-gray-100 @endif hover:bg-gray-100">
    {{ $label }}
</a>
