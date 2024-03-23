@extends('Layouts.App_layout')

@section('content')
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                        <div class="page-title-icon">
                            <i class="pe-7s-car icon-gradient bg-mean-fruit"></i>
                        </div>
                        <div>
                            CASHONE - Nature comptable
                            {{-- <div class="page-title-subheading">Enregistrement,modification,suppression des profiles.</div> --}}
                        </div>
                    </div>
                    {{-- <div class="page-title-actions">

                        <div class="d-inline-block dropdown">
                            <button type="button" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-secondary">
                                <span class="btn-icon-wrapper pe-2 opacity-7">
                                    <i class="fa fa-business-time fa-w-20"></i>
                                </span>
                                Actions
                            </button>
                            <div tabindex="-1" role="menu" aria-hidden="true"
                                class="dropdown-menu dropdown-menu-right">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" class="nav-link">
                                            <i class="nav-link-icon pe-7s-plus"></i>
                                            <span> Ajouter</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon lnr-book"></i>
                                            <span>Affiche Liste</span>
                                            <div class="ms-auto badge rounded-pill bg-danger">{{$profile->count()}}</div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link">
                                            <i class="nav-link-icon pe-7s-download"></i>
                                            <span> Exporter vers Excel</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="" class="nav-link">
                                            <i class="nav-link-icon pe-7s-download"></i>
                                            <span> Exporter</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <ul class="body-tabs body-tabs-layout tabs-animated body-tabs-animated nav">
                <li class="nav-item">
                    
                    <button data-bs-toggle="modal" data-bs-target=".nouveau" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-plus"></i> Ajouter nouveau
                    </button>
                </li>
                <li class="nav-item">
                    <button onclick="actualiser()"  class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-refresh-2"></i> Actualiser
                    </button>
                </li>
                <li class="nav-item">
                    <button id="btn-modif-profile" data-bs-toggle="modal" data-bs-target=".modifier" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-note"></i> Modifier
                    </button>
                </li>
                {{-- <li class="nav-item">
                    <form id="del-profile">
                        @csrf
                        <button type="submit" id="btn-del-profile" class="mb-2 me-2 btn-icon btn btn-secondary" >
                            <i class="nav-link-icon pe-7s-trash"></i> Supprimer
                        </button>
                    </form>
                </li>
                <li class="nav-item">
                    <button id="download-xlsx" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers Xsls
                    </button>
                </li>
                <li class="nav-item">
                    <button id="download-pdf" class="mb-2 me-2 btn-icon btn btn-secondary" >
                        <i class="nav-link-icon pe-7s-download"></i> Exporter vers pdf
                    </button>
                </li> --}}
            </ul>
            <div class="main-card mb-3 card">
                <div class="card-body">
                    <h5 class="card-title">Table striped</h5>
                    <table class="mb-0 table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Code</th>
                                <th>Libellé</th>
                                {{-- <th>Username</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listeNatures as $listeNature)
                                <tr>
                                    <th scope="row">
                                        <div class="position-relative form-check">
                                            <label class="form-label form-check-label">
                                                <input type="checkbox" class="form-check-input">
                                               
                                            </label>
                                        </div>
                                    </th>
                                    <td>{{ $listeNature->code_cn }}</td>
                                    <td>{{ $listeNature->libelle }}</td>
                                    {{-- <td>@mdo</td> --}}
                                </tr>
                            @endforeach
                          
                           
                        </tbody>
                    </table>
                    <br>
                    <nav class="pagination-rounded" aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link" aria-label="Previous">
                                    <span aria-hidden="true">«</span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">1</a>
                            </li>
                            <li class="page-item active">
                                <a href="javascript:void(0);" class="page-link">2</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">3</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">4</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link">5</a>
                            </li>
                            <li class="page-item">
                                <a href="javascript:void(0);" class="page-link" aria-label="Next">
                                    <span aria-hidden="true">»</span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            
            {{-- <div id="profile-table"></div> --}}
        </div>

    </div>
            

@endsection



            




    
    