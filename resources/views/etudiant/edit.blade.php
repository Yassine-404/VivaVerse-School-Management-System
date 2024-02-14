@section('title',$title)
@section('description',$description)
@extends('layout.app-agentsco')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                <h4 class="text-capitalize">Modifier un étudiant</h4>
            </div>
        </div>
    </div>
    <div class="card mb-50">
        <div class="row justify-content-center">
            <div class="col-sm-5 col-10">
                <div class="mt-40 mb-50">
                    @foreach ($find_customer as $etudiants)
                        @php ( $has_profile_picture = ! empty( $etudiants->profile_picture ) )
                        <form action="{{ route('etudiant.update',[$etudiants->id_etudiant]) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            

                            <div class="edit-profile__body">
                                <div class="form-group mb-25">
                                    <label for="name" class="color-dark fs-14 fw-500 align-center">Nom de l'étudiant <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="name" value="{{ $etudiants->user->name }}" id="name" placeholder="Name">
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="first_name" class="color-dark fs-14 fw-500 align-center">Prénom de L'étudiant <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="first_name" value="{{ $etudiants->user->first_name }}" id="name" placeholder="first_name">
                                    @if($errors->has('frist_name'))
                                        <p class="text-danger">{{ $errors->first('frist_name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="email" class="color-dark fs-14 fw-500 align-center">Email Address <span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="email" value="{{ $etudiants->user->email }}" id="name" placeholder="email">    
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="phone" class="color-dark fs-14 fw-500 align-center">N° de Téléphone <span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15" name="phone" value="{{ $etudiants->user->phone }}" id="phone" placeholder="Téléphone">    
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="niveau" class="color-dark fs-14 fw-500 align-center">Niveau de l'étudiant<span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="niveau" id="niveau">
                                        @foreach ($niveau as $n)
                                            <option value="{{ $n->id }}" {{ $etudiants->id_niveau == $n->id ? 'selected' : '' }}>{{ $n->intitule }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('niveau'))
                                        <p class="text-danger">{{ $errors->first('niveau') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="salle" class="color-dark fs-14 fw-500 align-center">Salle de l'étudiant<span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="salle" id="salle">
                                        @foreach ($salle as $n)
                                            <option value="{{ $n->id }}" {{ $etudiants->id_salle == $n->id ? 'selected' : '' }}>{{ $n->intitule }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('salle'))
                                        <p class="text-danger">{{ $errors->first('salle') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="filliere" class="color-dark fs-14 fw-500 align-center">Fillière de l'étudiant<span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="filliere" id="salle">
                                        @foreach ($filliere as $n)
                                            <option value="{{ $n->id }}" {{ $etudiants->id_filliere == $n->id ? 'selected' : '' }}>{{ $n->intitule }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('filliere'))
                                        <p class="text-danger">{{ $errors->first('filliere') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group mb-25">
                                    <label for="date_naiss" class="color-dark fs-14 fw-500 align-center">Date de naissance<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                        name="date_naiss" value="{{ $etudiants->user->date_naiss }}" id="date_naiss" placeholder="">
                                    @if ($errors->has('date_naiss'))
                                        <p class="text-danger">{{ $errors->first('date_naiss') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group mb-25">
                                    <label for="lieu_naiss" class="color-dark fs-14 fw-500 align-center">Lieu de naissance <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                        name="lieu_naiss" value="{{ $etudiants->user->lieu_naiss }}" id="lieu_naiss" placeholder="Ex: Yaoundé I...">
                                </div>
                                
                                <div class="form-group mb-25">
                                    <label for="sexe" class="color-dark fs-14 fw-500 align-center">Sexe de l'étudiant <span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="sexe" id="sexe">
                                        <option value="Masculin" {{ $etudiants->user->sexe == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                        <option value="Feminin" {{ $etudiants->user->sexe == 'Feminin' ? 'selected' : '' }}>Feminin</option>
                                    </select>
                                    @if ($errors->has('sexe'))
                                        <p class="text-danger">{{ $errors->first('sexe') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group mb-25">
                                    <label for="statut" class="color-dark fs-14 fw-500 align-center">Statut<span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="statut" id="statut">
                                        <option value="Actif" {{ $etudiants->statut == 'Actif' ? 'selected' : '' }}>Actif</option>
                                        <option value="Inactif" {{ $etudiants->statut == 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                        <option value="Exclu" {{ $etudiants->statut == 'Exclu' ? 'selected' : '' }}>Exclu</option>
                                        <!-- Ajoutez les autres options ici -->
                                    </select>
                                </div>
                                
                                
                                
                                

                               


                                <div class="button-group d-flex pt-25 justify-content-md-end justify-content-start">
                                    <a href="{{ route('etudiant.list') }}" class="btn btn-light btn-default btn-squared fw-400 text-capitalize m-sm-0 m-1">Annuler</a>
                                    <button type="submit" class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">Modifier</button>
                                </div>

                            </div>
                        </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
