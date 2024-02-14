@section('title', $title)
@section('description', $description)
@extends('layout.app-agentsco')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="d-flex align-items-center user-member__title mb-30 mt-30">
                    <h4 class="text">Nouvel étudiant</h4>
                </div>
            </div>
        </div>
        <div class="card mb-50">
            <div class="row justify-content-center">
                <div class="col-sm-5 col-10">
                    <div class="mt-40 mb-50">
                        <form action="{{ route('etudiant.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="edit-profile__body">
                                <div class="form-group mb-25">
                                    <label for="name" class="color-dark fs-14 fw-500 align-center">Nom de L'étudiant <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                        name="name" value="{{ old('name') }}" id="name" placeholder="Nom">
                                    @if ($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="first_name" class="color-dark fs-14 fw-500 align-center">Prenom de L'étudiant <span
                                            class="text-danger">*</span></label>
                                    <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                        name="first_name" value="{{ old('Prénom') }}" id="" placeholder="Prénom">
                                    @if ($errors->has('first_name'))
                                        <p class="text-danger">{{ $errors->first('frist_name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="email" class="color-dark fs-14 fw-500 align-center">Email Address <span
                                            class="text-danger">*</span></label>
                                    <input type="email" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                        name="email" id="email" value="{{ old('email') }}"
                                        placeholder="Email Address">
                                    @if ($errors->has('email'))
                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="phone" class="color-dark fs-14 fw-500 align-center">N° de Téléphone <span
                                            class="text-danger">*</span></label>
                                    <input type="number" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                        name="phone" value="{{ old('phone') }}" id="phone" placeholder="Phone">
                                    @if ($errors->has('phone'))
                                        <p class="text-danger">{{ $errors->first('phone') }}</p>
                                    @endif
                                </div>
                                
                                <div class="form-group mb-25">
                                    <label for="niveau" class="color-dark fs-14 fw-500 align-center">Niveau de l'étudiant<span
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
                                    <label for="filliere" class="color-dark fs-14 fw-500 align-center">Fillière de l'étudiant<span
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
                                    <label for="salle" class="color-dark fs-14 fw-500 align-center">Salle de l'étudiant<span class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="salle" id="salle">
                                        @foreach ($salle as $s)
                                            <option value="{{ $s->id }}">{{ $s->intitule }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('salle'))
                                        <p class="text-danger">{{ $errors->first('salle') }}</p>
                                    @endif
                                </div>

                                <script>
                                    $('#niveau, #filliere').change(function() {
                                        const selectedNiveau = $('#niveau').val();
                                        const selectedFilliere = $('#filliere').val();
                                        
                                        // Faites une requête AJAX pour obtenir les salles correspondantes
                                        $.ajax({
                                            url: `/getSalles/${selectedNiveau}/${selectedFilliere}`,
                                            type: 'GET',
                                            success: function(data) {
                                                // Effacez d'abord les options actuelles
                                                $('#salle').empty();
                                                
                                                // Ajoutez les nouvelles options
                                                data.forEach(function(salle) {
                                                    $('#salle').append(new Option(salle.intitule, salle.id));
                                                });
                                            }
                                        });
                                    });
                                </script>

                                <div class="form-group mb-25">
                                    <label for="date_naiss" class="color-dark fs-14 fw-500 align-center">Date de naissance<span
                                            class="text-danger">*</span></label>
                                    <input type="date" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                        name="date_naiss" value="{{ old('date_naiss') }}" id="name" placeholder="">
                                    @if ($errors->has('date_naiss'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>

                                <div class="form-group mb-25">
                                    <label for="lieu_naiss" class="color-dark fs-14 fw-500 align-center">Lieu de naissance <span
                                            class="text-danger">*</span></label>
                                            <input type="text" class="form-control ih-medium ip-gray radius-xs b-light px-15"
                                            name="lieu_naiss" id="lieu_naiss" value="{{ old('lieu_naiss') }}" placeholder="Ex: Yaoundé I...">
                                    
                                </div>

                            


                                <div class="form-group mb-25">
                                    <label for="sexe" class="color-dark fs-14 fw-500 align-center">Sexe de l'étudiant <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="sexe"
                                        id="lieu_naiss">
                                        
                                        <option value="Masculin" {{ old('gender') == 'Masculin' ? 'selected' : '' }}>Masculin</option>
                                        <option value="Feminin" {{ old('gender') == 'Feminin' ? 'selected' : '' }}>Feminin
                                        </option>
                                    </select>
                                    @if ($errors->has('sexe'))
                                        <p class="text-danger">{{ $errors->first('gender') }}</p>
                                    @endif
                                </div>
                                
                               
                                <div class="form-group mb-25">
                                    <label for="lieu_naiss" class="color-dark fs-14 fw-500 align-center">Lieu de naissance <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control ih-medium ip-gray radius-xs b-light px-15" name="statut"
                                        id="lieu_naiss">
                                        <option> Actif </option>
                                        <option> Inactif </option>
                                        <option> Exclu </option>
                                        
                                    </select>
                                    
                                </div>
                                
                                <div class="button-group d-flex pt-25 justify-content-md-end justify-content-start">
                                    <button type="Enregistrer"
                                        class="btn btn-primary btn-default btn-squared radius-md shadow2 btn-sm">Enregistrer</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection