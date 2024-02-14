@extends('layout.app-agentsped')

@section('title', $title)
@section('description', $description)

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-breadcrumb">
                    <div class="breadcrumb-main add-contact justify-content-sm-between">
                        <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center add-contact__title justify-content-center me-sm-25">
                                <h4 class="text fw-500 breadcrumb-title">Évaluations Programmées</h4>
                                <span class="sub-title ms-sm-25 ps-sm-25"></span>
                            </div>
                            <div class="action-btn mt-sm-0 mt-15">
                                <a href="{{ route('evaluation.create', app()->getLocale()) }}" class="btn px-20 btn-primary">
                                    <i class="las la-plus fs-16"></i>Programmer une Évaluation
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
                                    <h4>Liste des Évaluations Programmées</h4>
                                </div>
                                <div id="filter-form-container"></div>

                                <table class="table mb-0 table-borderless adv-table" data-sorting="true" data-filter-container="#filter-form-container" data-paging-current="1" data-paging-position="right" data-paging-size="10">
                                    <thead>
                                        <tr class="userDatatable-header">
                                            
                                            <th>
                                                <span class="userDatatable-title">UE</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Date</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Heure de Début</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Type Examen</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title">Durée (en heures)</span>
                                            </th>
                                            <th>
                                                <span class="userDatatable-title float-right">Actions</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($evaluation as $evaluation)
                                            <tr>
                                                <td>{{ $evaluation->ue->intitule_ue }}</td>
                                                <td>{{ $evaluation->date_evaluation }}</td>
                                                <td>{{ $evaluation->heure_debut }}</td>
                                                <td>
                                                    @if ($evaluation->pourcentage == 40)
                                                        CC
                                                    @elseif ($evaluation->pourcentage == 60)
                                                        SN
                                                    @endif
                                                </td>
                                                <td>{{ $evaluation->duree }}</td>
                                                <td>
                                                    <ul class="orderDatatable_actions mb-0 d-flex flex-wrap">
                                                        <li>
                                                            <a href="{{ route('evaluation.edit', $evaluation->id) }}"
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
                                                                    if ( confirm('Etes-vous sur de vouloir supprimer cette évaluation ?') ) {
                                                                        document.getElementById( 'delete-{{ $evaluation->id }}' ).submit();
                                                                    }
                                                                "
                                                            >
                                                            <i class="uil uil-trash-alt"></i>
                                                        </a>

                                                            <form style="display:none;" id="delete-{{ $evaluation->id}}"
                                                                action="{{ route('evaluation.delete', [ $evaluation->id]) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
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
