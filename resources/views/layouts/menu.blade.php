<li class="treeview ">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>UTILISATEUR</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <!--li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li-->
        <!--li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li-->
        <ul class="sidebar-menu tree" data-widget="tree">
                     
            <li class="header">UTILISATEUR</li>
            <li class="{{ Request::is('users*') ? 'active' : '' }}"> <a href="{!! route('users.index') !!}"><i class="fa fa-edit"></i>
                    <span>Users</span>
                    <span class="pull-right-container">
                        <span class="label label-primary pull-right">{{ (Auth::user()->id) }}</span>
                    </span>
                </a>
            </li>
            <li class="{{ Request::is('roles*') ? 'active' : '' }}"><a href="{{ route('roles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roles.plural')</span></a></li>
            <li class="{{ Request::is('permissions*') ? 'active' : '' }}">
            <a href="{{ route('permissions.index') }}"><i class="fa fa-edit"></i><span>@lang('models/permissions.plural')</span></a>
            </li>
            <li class="header"> AUTORISATIONS</li>
            <li class="{{ Request::is('roleUsers*')?'active':'' }}">
                <a href="{{route('roleUsers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/roleUsers.plural')</span></a>
            </li>

            <li class="{{ Request::is('permissionRoles*')?'active':''}}">
                <a href="{{ route('permissionRoles.index')}}"><i class="fa fa-edit"></i><span>@lang('models/permissionRoles.plural')</span></a>
            </li>

            <li class="{{Request::is('permissionUsers*')?'active':''}}">
                <a href="{{route('permissionUsers.index')}}"><i class="fa fa-edit"></i><span>@lang('models/permissionUsers.plural')</span></a>
            </li>

        </ul>
    </ul>
</li>

<li class="treeview {{ Request::is('engin*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>EQUIPEMENTS</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <!--li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li-->
        <!--li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li-->
        <ul class="sidebar-menu tree" data-widget="tree">
           
            <li class="{{ Request::is('enginTypes*') ? 'active' : '' }}">
                <a href="{{ route('enginTypes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/engin_types.plural')</span></a>
            </li>
            <li class="{{ Request::is('enginMarques*') ? 'active' : '' }}">
                <a href="{{ route('enginMarques.index') }}"><i class="fa fa-edit"></i><span>@lang('models/engin_marques.plural')</span></a>
            </li>

            <li class="{{ Request::is('enginModeles*') ? 'active' : '' }}">
                <a href="{{ route('enginModeles.index') }}"><i class="fa fa-edit"></i><span>@lang('models/engin_modeles.plural')</span></a>
            </li>

            <li class="{{ Request::is('engins*') ? 'active' : '' }}">
                <a href="{{ route('engins.index') }}"><i class="fa fa-edit"></i><span>@lang('models/engins.plural')</span></a>
            </li>

            <li class="{{ Request::is('enginKilometrages*') ? 'active' : '' }}">
                <a href="{{ route('enginKilometrages.index') }}"><i class="fa fa-edit"></i><span>@lang('models/engin_kilometrages.plural')</span></a>
            </li>

        </ul>
    </ul>
</li>
<li class="treeview {{ Request::is('entreprises*') ? 'active' : '' }} ">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>ENTREPRISE</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <!--li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li-->
        <!--li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li-->
        <ul class="sidebar-menu tree" data-widget="tree">
                        
            <li class="header">PARAMETRAGE ENTREPRISE</li>
            <li class="{{ Request::is('agences*') ? 'active' : '' }}">
                <a href="{{ route('agences.index') }}"><i class="fa fa-edit"></i><span>@lang('models/agences.plural')</span></a>
            </li>

            <li class="{{ Request::is('entreprises*') ? 'active' : '' }}">
                <a href="{{ route('entreprises.index') }}"><i class="fa fa-edit"></i><span>@lang('models/entreprises.plural')</span></a>
            </li>

        </ul>
    </ul>
</li>
<li class="treeview {{ Request::is('*lier*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>CARBURANT</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <!--li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li-->
        <!--li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li-->
        <ul class="sidebar-menu tree" data-widget="tree">
                        
            <li class="header"> CONFIG STATION</li>

            <li class="{{ Request::is('petroliers*') ? 'active' : '' }}">
                <a href="{{ route('petroliers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/petroliers.plural')</span></a>
            </li>

            <li class="{{ Request::is('stations*') ? 'active' : '' }}">
                <a href="{{ route('stations.index') }}"><i class="fa fa-edit"></i><span>@lang('models/stations.plural')</span></a>
            </li>

            <li class="{{ Request::is('pompistes*') ? 'active' : '' }}">
                <a href="{{ route('pompistes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/pompistes.plural')</span></a>
            </li>

            <li class="{{ Request::is('categories*') ? 'active' : '' }}">
                <a href="{{ route('categories.index') }}"><i class="fa fa-edit"></i><span>@lang('models/categories.plural')</span></a>
            </li>

            <li class="{{ Request::is('produits*') ? 'active' : '' }}">
                <a href="{{ route('produits.index') }}"><i class="fa fa-edit"></i><span>@lang('models/produits.plural')</span></a>
            </li>
            <li class="{{ Request::is('produitPrixes*') ? 'active' : '' }}">
                <a href="{{ route('produitPrixes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/produit_prixes.plural')</span></a>
            </li>

            <li class="{{ Request::is('cuves*') ? 'active' : '' }}">
                <a href="{{ route('cuves.index') }}"><i class="fa fa-edit"></i><span>@lang('models/cuves.plural')</span></a>
            </li>

            <li class="{{ Request::is('pompes*') ? 'active' : '' }}">
                <a href="{{ route('pompes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/pompes.plural')</span></a>
            </li>

            <li class="header">SORTIE CARBURANT</li><li class="{{ Request::is('ventePetroliers*') ? 'active' : '' }}">
                <li class="{{ Request::is('ventePetroliers*') ? 'active' : '' }}">
                    <a href="{{ route('ventePetroliers.index') }}"><i class="fa fa-edit"></i><span>@lang('models/vente_petroliers.plural')</span></a>
                </li>
        </ul>
    </ul>
</li>
<li class="treeview ">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>LOGISTIQUE</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <!--li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li-->
        <!--li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li-->
        <ul class="sidebar-menu tree" data-widget="tree">
                        
            <li class="header">PARAMETRAGE ACTIVITES</li>
                <li class="{{ Request::is('processes*') ? 'active' : '' }}">
                    <a href="{{ route('processes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/processes.plural')</span></a>
                </li>

                <li class="{{ Request::is('activites*') ? 'active' : '' }}">
                    <a href="{{ route('activites.index') }}"><i class="fa fa-edit"></i><span>@lang('models/activites.plural')</span></a>
                </li>


        </ul>
    </ul>
</li>


<li class="treeview {{ Request::is('chauffeur*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span> CHAUFFEURS</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
       
        <ul class="sidebar-menu tree" data-widget="tree">
            
                <li class="{{ Request::is('chauffeurs*') ? 'active' : '' }}">
                    <a href="{{ route('chauffeurs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/chauffeurs.plural')</span></a>
                </li>
        
                <li class="{{ Request::is('chauffeurPermis*') ? 'active' : '' }}">
                    <a href="{{ route('chauffeurPermis.index') }}"><i class="fa fa-edit"></i><span>@lang('models/chauffeur_permis.plural')</span></a>
                </li>
                
        </ul>
    </ul>
</li>

<li class="treeview {{ Request::is('transporteurs*') ? 'active' : '' }}">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>FOURNISSEURS</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
               <ul class="sidebar-menu tree" data-widget="tree">
           
                <li class="{{ Request::is('transporteurs*') ? 'active' : '' }}">
                    <a href="{{ route('transporteurs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/transporteurs.plural')</span></a>
                </li>
                <li class="{{ Request::is('typeFournisseurs*') ? 'active' : '' }}">
                    <a href="{{ route('typeFournisseurs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/type_fournisseurs.plural')</span></a>
                </li>
                <li class="{{ Request::is('fournisseurs*') ? 'active' : '' }}">
                    <a href="{{ route('fournisseurs.index') }}"><i class="fa fa-edit"></i><span>@lang('models/fournisseurs.plural')</span></a>
                </li>


        </ul>
    </ul>
</li>
<li class="treeview">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>TRANSPORTS</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        
        <ul class="sidebar-menu tree" data-widget="tree">
            <!--li class="{{-- Request::is('bascules*')?'active':'' --}}">
                <a href="{{-- route('bascules.index') --}}"><i class="fa fa-edit"></i><span>@lang('models/bascules.plural')</span></a>
            </li-->
            
            <li class="{{ Request::is('typeZones*') ? 'active' : '' }}">
                <a href="{{ route('typeZones.index') }}"><i class="fa fa-edit"></i><span>@lang('models/type_zones.plural')</span></a>
            </li>
            
            <li class="{{ Request::is('zoneCollectes*') ? 'active' : '' }}">
                <a href="{{ route('zoneCollectes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/zone_collectes.plural')</span></a>
            </li>
            
                     
            
            <li class="{{ Request::is('baremeTransports*') ? 'active' : '' }}">
                <a href="{{ route('baremeTransports.index') }}"><i class="fa fa-edit"></i><span>@lang('models/bareme_transports.plural')</span></a>
            </li>
            
            <li class="{{ Request::is('basculeDatas*') ? 'active' : '' }}">
                <a href="{{ route('basculeDatas.index') }}"><i class="fa fa-edit"></i><span>@lang('models/bascule_datas.plural')</span></a>
            </li>

            <li class="{{ Request::is('baremePenaliteTransports*') ? 'active' : '' }}">
                <a href="{{ route('baremePenaliteTransports.index') }}"><i class="fa fa-edit"></i><span>@lang('models/bareme_Penalite_Transports.plural')</span></a>
            </li>
            

        </ul>
    </ul>
</li>

<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>ACCOMPTE</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <!--li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li-->
        <!--li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li-->
        <ul class="sidebar-menu tree" data-widget="tree">
                        
            <!--li class="header">PARAMETRAGE</li-->
                                
                <li class="{{ Request::is('typeAccomptes*') ? 'active' : '' }}">
                    <a href="{{ route('typeAccomptes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/type_accomptes.plural')</span></a>
                </li>
                <li class="{{ Request::is('accomptes*') ? 'active' : '' }}">
                    <a href="{{ route('accomptes.index') }}"><i class="fa fa-edit"></i><span>@lang('models/accomptes.plural')</span></a>
                </li>


        </ul>
    </ul>
</li>



<!--li class="treeview ">
    <a href="#">
    <i class="fa fa-dashboard"></i> <span>STATION</span>
    <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
    </span>
    </a>
    <ul class="treeview-menu">
        <!li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
        <li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
        <ul class="sidebar-menu tree" data-widget="tree">
            model menu

        </ul>
    </ul>
</li-->


<li class="treeview">
    <a href="#">
        <i class="fa fa-dashboard"></i> <span>FACTURIER</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
    </a>
    <ul class="treeview-menu">
        <!--li class=""><a href="{{-- route('ventePetroliers.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v1</a></li-->
        <!--li class=""><a href="{{-- route('chauffeurs.index') --}}"><i class="fa fa-circle-o"></i> Dashboard v2</a></li-->
        <ul class="sidebar-menu tree" data-widget="tree">
                        
            <!--li class="header">PARAMETRAGE</li-->
                                
            <li class="{{ Request::is('factures*') ? 'active' : '' }}">
                <a href="{{ route('factures.index') }}"><i class="fa fa-edit"></i><span>@lang('models/factures.plural')</span></a>
            </li>
            
            <li class="{{ Request::is('carburantFactures*') ? 'active' : '' }}">
                <a href="{{ route('carburantFactures.index') }}"><i class="fa fa-edit"></i><span>@lang('models/carburant_factures.plural')</span></a>
            </li>
            
            <li class="{{ Request::is('factureTickets*') ? 'active' : '' }}">
                <a href="{{ route('factureTickets.index') }}"><i class="fa fa-edit"></i><span>@lang('models/facture_tickets.plural')</span></a>
            </li>
            
            <li class="{{ Request::is('accompteFactures*') ? 'active' : '' }}">
                <a href="{{ route('accompteFactures.index') }}"><i class="fa fa-edit"></i><span>@lang('models/accompte_factures.plural')</span></a>
            </li>


        </ul>
    </ul>
</li>