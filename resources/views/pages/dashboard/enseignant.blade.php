@section('title',$title)
@section('description',$description)
@extends('layout.app-enseignant')
@section('content')
<div class="crm mb-25">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Bienvenue {{ Auth::user()->name }},</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Tableau de bord</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Enseignant</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection