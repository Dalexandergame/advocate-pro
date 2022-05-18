    <!--sidebar-->
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

