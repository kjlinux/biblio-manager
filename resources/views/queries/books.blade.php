@extends('main')
@section('layout')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nombre et coût des livres par type</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> TYPE </th>
                                    <th data-sortable="true" data-align="center"> NOMBRE </th>
                                    <th data-sortable="true" data-align="center"> COÛT </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booksByType as $book)
                                    <tr>
                                        <td>{{ $book->type }}</td>
                                        <td>{{ $book->nombre }}</td>
                                        <td>{{ $book->cout }} Fcfa</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Nombre de livres par auteur avec titre et quantité en stock</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> AUTEUR </th>
                                    <th data-sortable="true" data-align="center"> TITRE </th>
                                    <th data-sortable="true" data-align="center"> NOMBRE </th>
                                    <th data-sortable="true" data-align="center"> QUANTITE EN STOCK </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booksByAuthor as $book)
                                    <tr>
                                        <td>{{ $book->auteur }}</td>
                                        <td>{{ $book->titre }}</td>
                                        <td>{{ $book->nombre }}</td>
                                        <td>{{ $book->quantite }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste complète des livres avec leur quantité en stock</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> TITRE </th>
                                    <th data-sortable="true" data-align="center"> QUANTITE EN STOCK </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($booksWithStock as $book)
                                    <tr>
                                        <td>{{ $book->titre }}</td>
                                        <td>{{ $book->quantite }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Statut actuel du stock</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> TITRE </th>
                                    <th data-sortable="true" data-align="center"> QUANTITE </th>
                                    <th data-sortable="true" data-align="center"> STATUT </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stockStatus as $book)
                                    <tr>
                                        <td>{{ $book->titre }}</td>
                                        <td>{{ $book->quantite }}</td>
                                        @if ($book->statut == 'Rupture de stock')
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar"
                                                        style="width: {{ $book->quantite }}%" aria-valuenow={{ $book->quantite }}
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        @elseif ($book->statut == 'Faible stock')
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar"
                                                        style="width: {{ $book->quantite }}%" aria-valuenow={{ $book->quantite }}
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        @else
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar"
                                                        style="width: {{ $book->quantite }}%" aria-valuenow={{ $book->quantite }}
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
