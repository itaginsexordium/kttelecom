<x-filament-widgets::widget wire:poll.keep-alive="getData">
    <x-filament::grid :default="$grid['default'] ?? 4" :sm="$grid['sm'] ?? null" :md="$grid['md'] ?? null" :lg="$grid['lg'] ?? null" :xl="$grid['xl'] ?? null"
        class="gap-3">
        @foreach ($data as $resource)
            <x-filament::grid.column>
                <x-filament::section icon="heroicon-o-lock-{{ $resource->status === 'занято' ? 'closed' : 'open' }}"
                    collapsible collapsed icon-color="info"
                    style="{{ $resource->status === 'занято' ? 'background-color: rgba(var(--warning-800), var(--tw-text-opacity)); color:black' : '' }}"
                    class="overlook-card rounded-xl dark:red overflow-hidden relative h-24 bg-gradient-to-tr from-gray-100 via-white to-white dark:from-gray-950 dark:to-gray-900">

                    <x-slot name="heading">
                        <span style="{{ $resource->status === 'занято' ? 'color:black' : '' }}"
                            class="overlook-name">{{ $resource->name }}</span>
                    </x-slot>

                    <x-slot name="description">
                        <span class="overlook-name">мест
                            @empty(!$resource?->active_reservation)
                                {{ $resource?->active_reservation?->registrationUser->count() }}/
                                @endempty{{ $resource->capacity }}</span>

                            @if ($resource->status === 'занято')
                                <span class="overlook-name flex items-center ">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                        <path d="M12 12l3 2" />
                                        <path d="M12 7v5" />
                                    </svg>
                                    <span class="flex-1 ms-3 whitespace-nowrap">
                                        {{ $resource?->active_reservation?->time_duration }}</span>
                            @endif
                            </a>


                            <br>

                        </x-slot>

                        @if ($resource->status === 'занято')
                            <ul class=" space-y-3">
                                <li>
                                    <a href="#"
                                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                        <svg class="fi-dropdown-header-icon h-5 w-5 text-gray-400 dark:text-gray-300"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true" data-slot="icon">
                                            <path fill-rule="evenodd"
                                                d="M18 10a8 8 0 1 1-16 0 8 8 0 0 1 16 0Zm-5.5-2.5a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0ZM10 12a5.99 5.99 0 0 0-4.793 2.39A6.483 6.483 0 0 0 10 16.5a6.483 6.483 0 0 0 4.793-2.11A5.99 5.99 0 0 0 10 12Z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <span
                                            class="flex-1 ms-3 whitespace-nowrap">{{ $resource?->active_reservation?->visitor->name }}</span>
                                        <span
                                            class="inline-flex items-center justify-center px-2 py-0.5 ms-3 text-xs font-medium text-gray-500 bg-gray-200 rounded dark:bg-gray-700 dark:text-gray-400"></span>
                                    </a>
                                </li>

                                <li
                                    class="flex justify-center items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    {{ $resource?->active_reservation?->name }}
                                </li>
                                <li>
                                    <a href="#"
                                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-phone">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                        </svg>
                                        <span
                                            class="flex-1 ms-3 whitespace-nowrap">{{ $resource?->active_reservation?->visitor->phone }}</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="#"
                                        class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="icon icon-tabler icons-tabler-outline icon-tabler-clock-hour-4">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                                            <path d="M12 12l3 2" />
                                            <path d="M12 7v5" />
                                        </svg>
                                        <span
                                            class="flex-1 ms-3 whitespace-nowrap">{{ $resource?->active_reservation?->time_duration }}</span>
                                    </a>
                                </li>

                                <li class="flex items-center justify-center	">
                                    {{ $resource->qr }}
                                </li>
                            </ul>
                        @else
                            свободно для бронирования
                        @endif

                    </x-filament::section>
                </x-filament::grid.column>
            @endforeach

        </x-filament::grid>
    </x-filament-widgets::widget>
