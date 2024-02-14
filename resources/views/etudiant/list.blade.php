@section('title',$title)
@section('description',$description)
@extends('layout.app-agentsco')
@section('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="contact-breadcrumb">
                <div class="breadcrumb-main add-contact justify-content-sm-between ">
                    <div class=" d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                        <div class="d-flex align-items-center add-contact__title justify-content-center me-sm-25">
                            <h4 class="text fw-500 breadcrumb-title">Etudiants inscrit 2023/2024    
                            </h4>
                            <span class="sub-title ms-sm-25 ps-sm-25"></span>
                        </div>
                        <div class="action-btn mt-sm-0 mt-15">
                            <a href="{{ route('etudiant.create', app()->getLocale()) }}" class="btn px-20 btn-primary ">
                                <i class="las la-plus fs-16"></i>Ajouter étudiant
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-30">
            <div class="card mt-30">
                <div class="card-body">
                    <div class="userDatatable adv-table-table global-shadow border-0 bg-white w-100 adv-table">
                        <div class="table-responsive">
                            <div class="adv-table-table__header">
                                <h4>Liste des étudiants</h4>
                                <div class="adv-table-table__button">
                                    <div class="dropdown">
                                        <a class="btn btn-primary dropdown-toggle dm-select" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Exporter
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                            <a class="dropdown-item" href="#">copy</a>
                                            <a class="dropdown-item" href="#">csv</a>
                                            <a class="dropdown-item" href="#">print</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="filter-form-container"></div>
                            
                            <table class="table mb-0 table-borderless adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                <thead>
                                    <tr class="userDatatable-header">
                                        <th>
                                            <span class="userDatatable-title">Matricule</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Nom & Prénom</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Email & Tel</span>
                                        </th>
                                        
                                        <th>
                                            <span class="userDatatable-title">Sexe</span>
                                        </th>
                                        
                                        <th>
                                            <span class="userDatatable-title">Niveau</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Salle</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title">Filière</span>
                                        </th>
                                        <th data-type="html" data-name='status'>
                                            <span class="userDatatable-title">Statut</span>
                                        </th>
                                        <th>
                                            <span class="userDatatable-title float-right">Actions</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etudiants as $etudiants)
                                    
                                    <tr>
                                        <td>
                                            <a href="#" class="text-dark">
                                                {{ $etudiants->matriculeE == null ? '' : $etudiants->matriculeE}}
                                            </a>    
                                            
                                        </td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="userDatatable-inline-title">
                                                    <a href="#" class="text-dark fw-500">
                                                        <h6>{{ $etudiants->user->name }} {{ $etudiants->user->first_name }}</h6>
                                                    </a>
                                                    <p class="d-block mb-0">
                                                        Née le {{ date_create($etudiants->user->date_naiss)->format('d/m/Y') }} à {{ $etudiants->user->lieu_naiss }}
                                                    </p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-inline-title">
                                                {{ $etudiants->user->email ? $etudiants->user->email: 'Email non disponible' }}
                                            
                                            <p class="d-block mb-0">
                                                Tel {{ $etudiants->user->phone}}
                                            </p>
                                        </div>
                                        </td>
                                        
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $etudiants->user->sexe }}
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $etudiants->niveau->intitule }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $etudiants->salle->intitule }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content">
                                                {{ $etudiants->filliere->intitule }}
                                            </div>
                                        </td>
                                        <td>
                                            <div class="userDatatable-content d-inline-block">
                                                <span
                                                    class="bg-opacity-{{ get_status_class( $etudiants->user->statut ) }}  color-{{ get_status_class( $etudiants->user->statut ) }} rounded-pill userDatatable-content-status active">
                                                    {{ get_status_label( $etudiants->user->statut ) }}
                                                </span>
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                <li>
                                                    <a href="{{ route('etudiant.edit', [ $etudiants->id_etudiant]) }}"
                                                        class="edit">
                                                        <i class="uil uil-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a
                                                        href="#"
                                                        class="remove"
                                                        onclick="
                                                            event.preventDefault();
                                                            if ( confirm('Etes-vous sur de vouloir supprimer cet étudiant ?') ) {
                                                                document.getElementById( 'delete-{{ $etudiants->id_etudiant }}' ).submit();
                                                            }
                                                        "
                                                    >
                                                        <i class="uil uil-trash-alt"></i>
                                                    </a>

                                                    <form style="display:none;" id="delete-{{ $etudiants->user->id}}"
                                                        action="{{ route('etudiant.delete', [ $etudiants->user->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('post')
                                                    </form>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection