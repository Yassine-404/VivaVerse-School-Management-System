<!-- resources/views/evaluation/notes.blade.php -->

@extends('layout.app-enseignant')

@section('title', 'Gestion des notes')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="contact-breadcrumb">
                    <div class="breadcrumb-main add-contact justify-content-sm-between">
                        <div class="d-flex flex-wrap justify-content-center breadcrumb-main__wrapper">
                            <div class="d-flex align-items-center add-contact__title justify-content-center me-sm-25">
                                <h4 class="text fw-500 breadcrumb-title">Gestion des notes</h4>
                                <span class="sub-title ms-sm-25 ps-sm-25"></span>
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
                        <form action="{{ route('notes.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="evaluation">Sélectionnez une évaluation :</label>
                                <select name="evaluation" id="evaluation" class="form-control">
                                    @foreach ($evaluations as $evaluation)
                                        <option value="{{ $evaluation->id }}">{{ $evaluation->libelle }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <table class="table mb-0 table-borderless">
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Nom & Prénom</th>
                                        <th>Note</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($etudiants as $etudiant)
                                        <tr>
                                            <td>{{ $etudiant->matriculeE }}</td>
                                            <td>{{ $etudiant->user->name }} {{ $etudiant->user->first_name }}</td>
                                            <td>
                                                <input type="text" name="notes[{{ $etudiant->id }}]" class="form-control" value="{{ old('notes.' . $etudiant->id) }}">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <button type="submit" class="btn btn-primary mt-3">Enregistrer les notes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
