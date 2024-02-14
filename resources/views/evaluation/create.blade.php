@extends('layout.app-agentsped')

@section('title', $title)
@section('description', $description)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                <h4 class="text">Nouvelle évaluation</h4>
            </div>
        </div>
    </div>
    <div class="card mb-50">
        <div class="row justify-content-center">
            <div class="col-sm-5 col-10">
                <div class="mt-40 mb-50">
                    <form action="{{ route('evaluation.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="edit-profile__body">
                            <!-- Ajoutez ici vos champs de formulaire pour la création d'une évaluation -->
                            <div class="form-group mb-25">
                                <label for="date_evaluation" class="color-dark fs-14 fw-500">Date de l'évaluation <span class="text-danger">*</span></label>
                                <input type="date" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="date_evaluation" value="{{ old('date_evaluation') }}" id="date_evaluation" placeholder="Date de l'évaluation">
                                @if ($errors->has('date_evaluation'))
                                <p class="text-danger">{{ $errors->first('date_evaluation') }}</p>
                                @endif
                            </div>

                            <div class="form-group mb-25">
                                <label for="heure_debut" class="color-dark fs-14 fw-500">Heure de début <span class="text-danger">*</span></label>
                                <input type="time" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="heure_debut" value="{{ old('heure_debut') }}" id="heure_debut" placeholder="Heure de debut">
                                @if ($errors->has('heure_debut'))
                                <p class="text-danger">{{ $errors->first('heure_debut') }}</p>
                                @endif
                            </div>

                            <div class="form-group mb-25">
                                <label for="duree" class="color-dark fs-14 fw-500">Durée de l'évaluation (en heures) <span class="text-danger">*</span></label>
                                <input type="number" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="duree" value="{{ old('duree') }}" id="duree" placeholder="Durée de l'évaluation">
                                @if ($errors->has('duree'))
                                <p class="text-danger">{{ $errors->first('duree') }}</p>
                                @endif
                            </div>

                            <div class="form-group mb-25">
                                <label for="libelle" class="color-dark fs-14 fw-500">Libellé de l'évaluation <span class="text-danger">*</span></label>
                                <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="libelle" value="{{ old('libelle') }}" id="libelle" placeholder="Libellé de l'évaluation">
                                @if ($errors->has('libelle'))
                                <p class="text-danger">{{ $errors->first('libelle') }}</p>
                                @endif
                            </div>

                            <div class="form-group mb-25">
                                <label for="id_ue" class="color-dark fs-14 fw-500">Type d'evaluation <span class="text-danger">*</span></label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="type" id="type">
                                    <option value="40">CC</option>
                                    <option value="60">SN</option>
                                </select>
                                @if ($errors->has('type'))
                                <p class="text-danger">{{ $errors->first('type') }}</p>
                                @endif
                            </div>

                            <div class="form-group mb-25">
                                    <label for="niveau" class="color-dark fs-14 fw-500 align-center">Niveau<span
                                        class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="niveau" id="niveau">
                                        @foreach ($niveau as $n)
                                            <option value="{{ $n->id }}">{{ $n->intitule }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('niveau'))
                                        <p class="text-danger">{{ $errors->first('niveau') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="filliere" class="color-dark fs-14 fw-500 align-center">Fillière<span
                                        class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="filliere" id="filliere">
                                        @foreach ($filliere as $f)
                                            <option value="{{ $f->id }}">{{ $f->intitule }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('filliere'))
                                        <p class="text-danger">{{ $errors->first('filliere') }}</p>
                                    @endif
                                </div>
                                
                            <div class="form-group mb-25">
                                <label for="id_ue" class="color-dark fs-14 fw-500">Unité d'Enseignement (UE) <span class="text-danger">*</span></label>
                                <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="id_ue" id="id_ue">
                                    @foreach ($ues as $ue)
                                    <option value="{{ $ue->id }}">{{ $ue->intitule_ue }}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('id_ue'))
                                <p class="text-danger">{{ $errors->first('id_ue') }}</p>
                                @endif
                            </div>

                            <div class="button-group d-flex pt-25 justify-content-md-end justify-content-start">
                                <button type="submit" class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">Enregistrer</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
