@extends('main')
@section('layout')
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des emprunteurs et des livres à rendre</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> NOM </th>
                                    <th data-sortable="true" data-align="center"> PRENOM </th>
                                    <th data-sortable="true" data-align="center"> ADRESSE </th>
                                    <th data-sortable="true" data-align="center"> TELEPHONE </th>
                                    <th data-sortable="true" data-align="center"> LIVRES A RENDRE </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($borrowers as $borrower)
                                <tr>
                                    <td>{{ $borrower['nom'] }}</td>
                                    <td>{{ $borrower['prenom'] }}</td>
                                    <td>{{ $borrower['adresse'] }}</td>
                                    <td>{{ $borrower['telephone'] }}</td>
                                    <td>{{ implode(', ', $borrower['livres']) }}</td>
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
                    <h4 class="card-title">La liste des livres actuellement en prêt</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> TITRE </th>
                                    <th data-sortable="true" data-align="center"> DATE D'EMPRUNT </th>
                                    <th data-sortable="true" data-align="center"> DATE DE RETOUR </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($booksOnLoan as $book)
                                <tr>
                                    <td>{{ $book->titre }}</td>
                                    <td>{{ $book->date_emprunt }}</td>
                                    <td>{{ $book->date_depot }}</td>
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
                    <h4 class="card-title">Liste des inscrits n’ayant jamais emprunté un livre</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> NOM </th>
                                    <th data-sortable="true" data-align="center"> PRENOM </th>
                                    <th data-sortable="true" data-align="center"> ADRESSE </th>
                                    <th data-sortable="true" data-align="center"> TELEPHONE </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($neverBorrowed as $customer)
                                <tr>
                                    <td>{{ $customer->nom_cl }}</td>
                                    <td>{{ $customer->prenom_cl }}</td>
                                    <td>{{ $customer->adresse_cl }}</td>
                                    <td>{{ $customer->telephone_cl }}</td>
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
                    <h4 class="card-title">Nombre de livres empruntés dans chaque catégorie</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> CATEGORIE </th>
                                    <th data-sortable="true" data-align="center"> NOMBRE </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($borrowedByCategory as $category)
                                <tr>
                                    <td>{{ $category->categorie }}</td>
                                    <td>{{ $category->nombre }}</td>
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
                    <h4 class="card-title">Dernière date d’emprunt pour chaque utilisateur</h4>
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-align="center"> NOM </th>
                                    <th data-sortable="true" data-align="center"> PRENOM </th>
                                    <th data-sortable="true" data-align="center"> DERNIERE DATE D'EMPRUNT </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lastBorrowDate as $borrow)
                                <tr>
                                    <td>{{ $borrow->nom_cl }}</td>
                                    <td>{{ $borrow->prenom_cl }}</td>
                                    <td>{{ $borrow->derniere_date_emprunt }}</td>
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
