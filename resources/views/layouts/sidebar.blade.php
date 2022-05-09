    <!--sidebar-->
    <div class="side-menu">
        <div class="logo-container d-flex justify-content-center">
            <a href="{{ url('dashboard')}}">
                <x-logo></x-logo>
            </a>
        </div>
        <div class="list item-1">
            <a href="{{ url('dashboard')}}" class="flex"><x-dashboard-icon></x-dashboard-icon><span>Dashboard</span></a>
        </div>
        <div class="list item-2">
            <a href="{{ url('clientcontacts')}}" class="flex"><x-clients-icon></x-clients-icon><span>Clients</span></a>
        </div>
        <div class="list item-3">
            <a href="{{ url('jurisprudence')}}" class="flex"><x-juris-icon></x-juris-icon><span>Jurisprudence</span></a>
        </div>
        <div class="list item-4">
            <a href="{{ url('documents')}}" class="flex"><x-doc-icon></x-doc-icon><span>Doccuments</span></a>
        </div>
        <div class="list item-5">
            <a href="{{ url('users')}}" class="flex"><x-user-icon></x-user-icon><span>Utilisateurs</span></a>
        </div>
        <div class="list item-6">
            <a href="{{ url('dossier-juridiques')}}" class="flex"><x-jurifolder-icon></x-jurifolder-icon><span>Dossiers juridiques</span></a>
        </div>
        <div class="list item-7">
            <a href="{{ url('calendrier')}}" class="flex"><x-calendar-icon></x-calendar-icon><span>Calendrier</span></a>
        </div>
        <div class="list item-8">
            <a href="{{ url('taches')}}" class="flex"><x-tasks-icon></x-tasks-icon><span>Tâches</span></a>
        </div>
        <div class="list item-9">
            <a href="{{ url('inventaire')}}" class="flex"><x-invent-icon></x-invent-icon><span>Inventaire</span></a>
        </div>
        <div class="list item-10">
            <a href="{{ url('ordre-de-mission')}}" class="flex"><x-missionorder-icon></x-missionorder-icon><span>Ordre de mission</span></a>
        </div>
        <div class="list item-11">
            <a href="{{ url('lois-et-articles')}}" class="flex"><x-lois-icon></x-lois-icon><span>Lois et articles</span></a>
        </div>
        <div class="list item-12">
            <a href="{{ url('tribunals')}}" class="flex"><x-tribunal-icon></x-tribunal-icon><span>Tribunal</span></a>
        </div>
        <div class="list item-13">
            <a href="{{ url('payments')}}" class="flex"><x-paie-icon></x-paie-icon><span>Paiements</span></a>
        </div>
        <div class="list item-14">
            <a href="{{ url('correspondence')}}" class="flex"><x-corres-icon></x-corres-icon><span>Correspondence</span></a>
        </div>
        <div class="list item-15">
            <a href="{{ url('centre-aide')}}" class="flex"><x-aide-icon></x-aide-icon><span>Centre d’aide</span></a>
        </div>
    </div>
</body>
