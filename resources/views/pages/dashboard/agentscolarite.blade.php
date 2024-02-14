@section('title',$title)
@section('description',$description)
@extends('layout.app-agentsco')
@section('content')
<div class="demo3 mb-25 t-thead-bg">
    <div class="container-fluid">
        <div class="row ">
            <div class="col-lg-12">
                <div class="breadcrumb-main">
                    <h4 class="text-capitalize breadcrumb-title">Bienvenue {{ Auth::user()->name }},</h4>
                    <div class="breadcrumb-action justify-content-center flex-wrap">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="uil uil-estate"></i>Tableau de bord - Agent de scolarité</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            @include('components.dashboard.agentscolarite.sale_overview')
                  
        </div>
    </div>
</div>
@endsection