@php
    use App\Helpers\MenuHelper;
@endphp
@foreach ($menuData as $menu)
    <ul role="list" class="-mx-2 space-y-1 list-none">
        <li>
            @if (!empty($menu['submenus']))
                <button type="button"
                    class="flex justify-between w-full p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                    <span class="flex gap-x-3">
                        {!! MenuHelper::getIcon($menu['icon']) !!}
                        {{ $menu['title'] }}
                    </span>
                    <svg class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 9l6 6 6-6"></path>
                    </svg>

                </button>
                <ul role="list"
                    class="relative left-0 hidden mt-1 space-y-1 bg-white border border-gray-200 rounded-md shadow-lg">
                    @foreach ($menu['submenus'] as $submenu)
                        <li>
                            <a href="{{ $submenu['url'] }}"
                                class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                                <span
                                    class="flex h-6 w-6 shrink-0 items-center justify-center rounded-lg border border-gray-200 bg-white text-[0.625rem] font-medium text-gray-400 group-hover:border-indigo-600 group-hover:text-indigo-600">{{ substr($submenu['title'], 0, 1) }}</span>
                                <span class="truncate">{{ $submenu['title'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <a href="{{ $menu['url'] }}"
                    class="group flex gap-x-3 rounded-md p-2 text-sm font-semibold leading-6 text-gray-700 hover:bg-gray-50 hover:text-indigo-600">
                    {!! MenuHelper::getIcon($menu['icon']) !!}
                    {{ $menu['title'] }}
                </a>
            @endif
        </li>
    </ul>
@endforeach


<script>
    document.querySelectorAll('button').forEach(button => {
        button.addEventListener('click', () => {
            const submenu = button.nextElementSibling;
            submenu.classList.toggle('hidden');
        });
    });
</script>
