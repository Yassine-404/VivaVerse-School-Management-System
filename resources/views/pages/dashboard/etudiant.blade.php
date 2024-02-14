@section('title',$title)
@section('description',$description)
@extends('layout.app-etudiant')
@section('content')
<div class="demo4">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Bienvenue {{ Auth::user()->name }},</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Etudiant</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Tableau de bord</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @include('components.dashboard.etudiant.congrats')
            @include('components.dashboard.etudiant.todo')
            
                        
        </div>
    </div>
</div>
@endsection