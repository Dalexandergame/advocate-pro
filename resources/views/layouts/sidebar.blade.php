    <!--sidebar-->
{{--
    <div class="side-menu">
        <div class="logo-container d-flex justify-content-center">
            <a href="{{ url('dashboard')}}">
                <x-logo></x-logo>
            </a>
        </div>
        <a href="{{ url('dashboard')}}" class="flex">
            <div class="list item-1">
                <x-dashboard-icon></x-dashboard-icon><span>Dashboard</span>
            </div>
        </a>
        <a href="{{ url('clientcontacts')}}" class="flex">
            <div class="list item-2">
                <x-clients-icon></x-clients-icon><span>Clients</span>
            </div>
        </a>
        <a href="{{ url('jurisprudence')}}" class="flex">
            <div class="list item-3">
                <x-juris-icon></x-juris-icon><span>Jurisprudence</span>
            </div>
        </a>
        <a href="{{ url('documents')}}" class="flex">
            <div class="list item-4">
                <x-doc-icon></x-doc-icon><span>Documents</span>
            </div>
        </a>
        <a href="{{ url('users')}}" class="flex">
            <div class="list item-5">
                <x-user-icon></x-user-icon><span>Utilisateurs</span>
            </div>
        </a>
        <a href="{{ url('dossier-juridiques')}}" class="flex">
            <div class="list item-6">
                <x-jurifolder-icon></x-jurifolder-icon><span>Dossiers Juridiques</span>
            </div>
        </a>
        <a href="{{ url('calendrier')}}" class="flex">
            <div class="list item-7">
                <x-calendar-icon></x-calendar-icon><span>Calendrier</span>
            </div>
        </a>
        <a href="{{ url('taches')}}" class="flex">
            <div class="list item-8">
                <x-tasks-icon></x-tasks-icon><span>Tâches</span>
            </div>
        </a>
        <a href="{{ url('inventaire')}}" class="flex">
            <div class="list item-9">
                <x-invent-icon></x-invent-icon><span>Inventaire</span>
            </div>
        </a>
        <a href="{{ url('ordre-de-mission')}}" class="flex">
            <div class="list item-10">
                <x-missionorder-icon></x-missionorder-icon><span>Ordre de Mission</span>
            </div>
        </a>
        <a href="{{ url('lois-et-articles')}}" class="flex">
            <div class="list item-11">
                <x-lois-icon></x-lois-icon><span>Lois et Articles</span>
            </div>
        </a>
        <a href="{{ url('tribunals')}}" class="flex">
            <div class="list item-12">
                <x-tribunal-icon></x-tribunal-icon><span>Tribunal</span>
            </div>
        </a>
        <a href="{{ url('payments')}}" class="flex">
            <div class="list item-13">
                <x-paie-icon></x-paie-icon><span>Paiements</span>
            </div>
        </a>
        <a href="{{ url('correspondence')}}" class="flex">
            <div class="list item-14">
                <x-corres-icon></x-corres-icon><span>Correspondance</span>
            </div>
        </a>
        <a href="{{ url('centre-aide')}}" class="flex">
            <div class="list item-15">
                <x-aide-icon></x-aide-icon><span>Centre d’Aide</span>
            </div>
        </a>
    </div>
--}}
    <!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
    <div class="relative z-40 md:hidden" role="dialog" aria-modal="true">
        <!--
          Off-canvas menu backdrop, show/hide based on off-canvas menu state.

          Entering: "transition-opacity ease-linear duration-300"
            From: "opacity-0"
            To: "opacity-100"
          Leaving: "transition-opacity ease-linear duration-300"
            From: "opacity-100"
            To: "opacity-0"
        -->
        <div class="fixed inset-0 bg-gray-600 bg-opacity-75"></div>

        <div class="fixed inset-0 z-40 flex">
            <!--
              Off-canvas menu, show/hide based on off-canvas menu state.

              Entering: "transition ease-in-out duration-300 transform"
                From: "-translate-x-full"
                To: "translate-x-0"
              Leaving: "transition ease-in-out duration-300 transform"
                From: "translate-x-0"
                To: "-translate-x-full"
            -->
            <div class="relative flex w-full max-w-xs flex-1 flex-col bg-gray-800 pt-5 pb-4">
                <!--
                  Close button, show/hide based on off-canvas menu state.

                  Entering: "ease-in-out duration-300"
                    From: "opacity-0"
                    To: "opacity-100"
                  Leaving: "ease-in-out duration-300"
                    From: "opacity-100"
                    To: "opacity-0"
                -->
                <div class="absolute top-0 right-0 -mr-12 pt-2">
                    <button type="button" class="ml-1 flex h-10 w-10 items-center justify-center rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
                        <span class="sr-only">Close sidebar</span>
                        <!-- Heroicon name: outline/x-mark -->
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>

                <div class="flex flex-shrink-0 items-center px-4">
                    <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
                </div>
                <div class="mt-5 h-0 flex-1 overflow-y-auto">
                    <nav class="space-y-1 px-2">
                        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                        <a href="{{ url('dashboard')}}" class="bg-gray-900 text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!--
                              Heroicon name: outline/home

                              Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300"
                            -->
                            <x-dashboard-icon></x-dashboard-icon><span>Dashboard</span>
                        </a>

                        <a href="{{ url('clientcontacts')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/users -->
                            <x-clients-icon></x-clients-icon><span class="p-2">Clients</span>
                        </a>
                        <a  class="flex">
                            <div class="list item-2">

                            </div>
                        </a>

                        <a href="{{ url('jurisprudence')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/folder -->
                            <x-juris-icon></x-juris-icon><span>Jurisprudence</span>
                        </a>

                        <a href="{{ url('documents')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/folder -->
                            <x-doc-icon></x-doc-icon><span>Documents</span>
                        </a>

                        <a href="{{ url('users')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/folder -->
                            <x-user-icon></x-user-icon><span>Utilisateurs</span>
                        </a>

                        <a href="{{ url('dossier-juridiques')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/folder -->
                            <x-jurifolder-icon></x-jurifolder-icon><span>Dossiers Juridiques</span>
                        </a>

                        <a href="{{ url('calendrier')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/calendar -->
                            <x-calendar-icon></x-calendar-icon><span>Calendrier</span>
                        </a>

                        <a href="{{ url('taches')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/calendar -->
                            <x-tasks-icon></x-tasks-icon><span>Tâches</span>
                        </a>

                        <a href="{{ url('inventaire')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/calendar -->
                            <x-invent-icon></x-invent-icon><span>Inventaire</span>
                        </a>

                        <a href="{{ url('ordre-de-mission')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/calendar -->
                            <x-missionorder-icon></x-missionorder-icon><span>Ordre de Mission</span>
                        </a>

                        <a href="{{ url('lois-et-articles')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/folder -->
                            <x-lois-icon></x-lois-icon><span>Lois et Articles</span>
                        </a>

                        <a href="{{ url('tribunals')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/folder -->
                            <x-tribunal-icon></x-tribunal-icon><span>Tribunal</span>
                        </a>

                        <a href="{{ url('payments')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/calendar -->
                            <x-paie-icon></x-paie-icon><span>Paiements</span>
                        </a>

                        <a href="{{ url('correspondence')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/inbox -->
                            <x-corres-icon></x-corres-icon><span class="p-2">Correspondance</span>
                        </a>

                        <a href="{{ url('centre-aide')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-2 text-base font-medium rounded-md">
                            <!-- Heroicon name: outline/chart-bar -->
                            <x-aide-icon></x-aide-icon><span class="p-2">Centre d’Aide</span>
                        </a>
                    </nav>
                </div>
            </div>

            <div class="w-14 flex-shrink-0" aria-hidden="true">
                <!-- Dummy element to force sidebar to shrink to fit close icon -->
            </div>
        </div>
    </div>

    <!-- Static sidebar for desktop -->
    <div class="hidden md:fixed md:inset-y-0 md:flex md:w-80 md:flex-col">
        <!-- Sidebar component, swap this element with another sidebar if you like -->
        <div class="flex min-h-0 flex-1 flex-col bg-black">
            {{--<div class="flex h-16 flex-shrink-0 items-center bg-black px-4">
                <img class="h-8 w-auto" src="https://tailwindui.com/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company">
            </div>--}}
            <div class="logo-container flex justify-center">
                <a href="{{ url('dashboard')}}">
                    <x-logo></x-logo>
                </a>
            </div>
            <div class="flex justify-center">
                <span class="text-white text-sm text-gray-700">
                    {{config('app.version')}}
                </span>
            </div>
            <div class="flex flex-1 flex-col overflow-y-auto">
                <nav class="flex-1 space-y-1 px-2 py-2">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="{{ url('dashboard')}}" class="bg-gray-900 text-white group flex items-center px-2 py-2 text-sm font-medium rounded-md">
                        <!--
                          Heroicon name: outline/home

                          Current: "text-gray-300", Default: "text-gray-400 group-hover:text-gray-300"
                        -->
                        {{--<svg class="text-gray-300 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>--}}
                        <x-dashboard-icon></x-dashboard-icon><span class="p-2">Dashboard</span>
                    </a>

                    <a href="{{ url('clientcontacts')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/users -->
                        <x-clients-icon></x-clients-icon><span class="p-2">Clients</span>
                    </a>

                    <a href="{{ url('jurisprudence')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/users -->
                        <x-juris-icon></x-juris-icon><span class="p-2">Jurisprudence</span>
                    </a>

                    <a href="{{ url('documents')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/folder -->
                        <x-doc-icon></x-doc-icon><span class="p-2">Documents</span>
                    </a>

                    <a href="{{ url('users')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/folder -->
                        <x-user-icon></x-user-icon><span class="p-2">Utilisateurs</span>
                    </a>

                    <a href="{{ url('dossier-juridiques')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/folder -->
                        <x-jurifolder-icon></x-jurifolder-icon><span class="p-2">Dossiers Juridiques</span>
                    </a>

                    <a href="{{ url('calendrier')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/calendar -->
                        <x-calendar-icon></x-calendar-icon><span class="p-2">Calendrier</span>
                    </a>

                    <a href="{{ url('taches')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/calendar -->
                        <x-tasks-icon></x-tasks-icon><span class="p-2">Tâches</span>
                    </a>

                    <a href="{{ url('inventaire')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/calendar -->
                        <x-invent-icon></x-invent-icon><span class="p-2">Inventaire</span>
                    </a>

                    <a href="{{ url('ordre-de-mission')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/calendar -->
                        <x-missionorder-icon></x-missionorder-icon><span class="p-2">Ordre de Mission</span>
                    </a>

                    <a href="{{ url('lois-et-articles')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/calendar -->
                        <x-lois-icon></x-lois-icon><span class="p-2">Lois et Articles</span>
                    </a>

                    <a href="{{ url('tribunals')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/inbox -->
                        <x-tribunal-icon></x-tribunal-icon><span class="p-2">Tribunal</span>
                    </a>

                    <a href="{{ url('payments')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/inbox -->
                        <x-paie-icon></x-paie-icon><span class="p-2">Paiements</span>
                    </a>

                    <a href="{{ url('correspondence')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/inbox -->
                        <x-corres-icon></x-corres-icon><span class="p-2">Correspondance</span>
                    </a>

                    <a href="{{ url('centre-aide')}}" class="text-gray-300 hover:bg-gray-700 hover:text-white group flex items-center px-2 py-1 text-sm font-medium rounded-md">
                        <!-- Heroicon name: outline/chart-bar -->
                        <x-aide-icon></x-aide-icon><span class="p-2">Centre d’Aide</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
