@extends('main')
@section('layout')
    <div class="row">
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="d-flex align-items-center align-self-start">
                                <h1 class="mb-0">GESTION DES AUTEURS</h1>
                            </div>
                        </div>
                    </div>
                    {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Liste des auteurs</h4>
                    <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="mdi mdi-plus"></i>Enregistrer un auteur</button>
                    {{-- <p class="card-description"> <button type="button" class="btn btn-success btn-lg btn-block">
                            <i class="mdi mdi-account"></i>Ajouter un livre</button>
                    </p> --}}
                    <div class="table-responsive">
                        <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                            data-search="true" data-detail-formatter="detailFormatter">
                            <thead>
                                <tr>
                                    <th> ID </th>
                                    <th data-sortable="true"> NOM </th>
                                    <th> PRENOM </th>
                                    <th> NATIONALITE </th>
                                    <th> ACTIONS </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($authors as $author)
                                    <tr>
                                        <td>{{ $author['id'] }}</td>
                                        <td>{{ $author['nom_aut'] }}</td>
                                        <td>{{ $author['prenom_aut'] }}</td>
                                        <td>{{ $author['nationalite_aut'] }}</td>
                                        <td> </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <script>
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    </script>
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Enregistrement d'un auteur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample" id="store">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NOM</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nom" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">PRENOM</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="prenom" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NATIONALITE</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single" id="n_p" name="nationalite"
                                                    style="width:100%">
                                                    <option value="">Sélectionnez une nationalité</option>
                                                    <option value="Française">Française</option>
                                                    <option value="Anglaise">Anglaise</option>
                                                    <option value="Américaine">Américaine</option>
                                                    <option value="Russe">Russe</option>
                                                    <option value="Tchèque">Tchèque</option>
                                                    <option value="Canadienne">Canadienne</option>
                                                    <option value="Japonaise">Japonaise</option>
                                                    <option value="Chinoise">Chinoise</option>
                                                    <option value="Allemande">Allemande</option>
                                                    <option value="Espagnole">Espagnole</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="valider_store" class="btn btn-inverse-success">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Enregistrement d'un auteur</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <form class="form-sample" id="edit">
                                @csrf
                                @method('PUT')
                                <input type="hidden" id="id_edit" name="id_edit" />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NOM</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="nom_e" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">PRENOM</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="prenom_e" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">NATIONALITE</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single" id="n_e"
                                                    name="nationalite_e" style="width:100%">
                                                    <option value="">Sélectionnez une nationalité</option>
                                                    <option value="Française">Française</option>
                                                    <option value="Anglaise">Anglaise</option>
                                                    <option value="Américaine">Américaine</option>
                                                    <option value="Russe">Russe</option>
                                                    <option value="Tchèque">Tchèque</option>
                                                    <option value="Canadienne">Canadienne</option>
                                                    <option value="Japonaise">Japonaise</option>
                                                    <option value="Chinoise">Chinoise</option>
                                                    <option value="Allemande">Allemande</option>
                                                    <option value="Espagnole">Espagnole</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" id="valider_edit" class="btn btn-inverse-primary">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#n_p').select2({
                dropdownParent: $('#staticBackdrop')
            });
            $('#n_e').select2({
                dropdownParent: $('#editModal')
            });
        });

        $('#store').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                method: 'POST',
                url: "{{ route('authors.store') }}",
                data: $(this).serialize(),
                success: function(response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Enregistrement effectué."
                    });
                    $('select').val(null).trigger('change');
                    location.reload(true);
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Erreur lors de l'exécution",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 500
                    });
                },
            });
        });

        $('#edit').submit(function(e) {
            e.preventDefault();
            var authorId = $('#id_edit').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                method: 'PUT',
                url: '/authors/' + authorId,
                data: $(this).serialize(),
                success: function(response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 4000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Mise à jour effectuée."
                    });
                    $('select').val(null).trigger('change');
                    location.reload(true);
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Erreur lors de la mise à jour",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        });

        var $table = $('#table')

        function detailFormatter(index, row) {
            var html = []
            $.each(row, function(key, value) {
                html.push('<p><b>' + key + ':</b> ' + value + '</p>')
            })
            return html.join('')
        }

        function operateFormatter(value, row, index) {
            return [
                '<button type="button" id="edit" class="btn btn-inverse-primary btn-icon" style="margin-right: 1em" title="modifier" data-bs-toggle="modal" data-bs-target="#editModal">',
                '<i class="mdi mdi-pencil"></i>',
                '</button>',
                '<button type="button" id="delete" class="btn btn-inverse-danger btn-icon" title="supprimer">',
                '<i class="mdi mdi-trash-can-outline"></i>',
                '</button>',
            ].join('')
        }

        function edit(id) {
            $.ajax({
                method: 'GET',
                url: '/authors/' + id + '/edit',
                success: function(response) {
                    var author = response.author;

                    $('#id_edit').val(author.id);
                    $('#edit input[name="nom_e"]').val(author.nom_aut);
                    $('#edit input[name="prenom_e"]').val(author.prenom_aut);
                    $('#edit select[name="nationalite_e"]').val(author.nationalite_aut).trigger('change');

                    $('#editModal').modal('show');
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Erreur lors de la récupération des données",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }

        function deleteAuthor(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                method: 'DELETE',
                url: '/authors/' + id,
                success: function(response) {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                    });
                    Toast.fire({
                        icon: "success",
                        title: "Suppression effectuée."
                    });
                    location.reload(true);
                },
                error: function(xhr, status, error) {
                    Swal.fire({
                        title: "Erreur lors de la suppression",
                        icon: "error",
                        showConfirmButton: false,
                        timer: 1500
                    });
                }
            });
        }

        window.operateEvents = {
            'click #edit': function(e, value, row, index) {
                e.preventDefault();
                edit(row.id)
            },
            'click #delete': function(e, value, row, index) {
                e.preventDefault();
                deleteAuthor(row.id)
            }
        }

        function initTable() {
            $table.bootstrapTable('destroy').bootstrapTable({
                //  height: 550,
                //  locale: $('#locale').val(),
                columns: [{
                        title: 'ID',
                        field: 'id',
                        align: 'center',
                        valign: 'middle',
                        sortable: true,
                        //  footerFormatter: totalTextFormatter
                    },
                    {
                        title: 'NOM',
                        field: 'nom',
                        align: 'center'
                    },
                    {
                        field: 'prenom',
                        title: 'PRENOM',
                        sortable: true,
                        //  footerFormatter: totalNameFormatter,
                        align: 'center'
                    },
                    {
                        field: 'nationalite',
                        title: 'NATIONALITE',
                        sortable: true,
                        align: 'center',
                        //  footerFormatter: totalPriceFormatter
                    },
                    {
                        field: 'actions',
                        title: 'ACTIONS',
                        align: 'center',
                        clickToSelect: false,
                        events: window.operateEvents,
                        formatter: operateFormatter
                    }
                ]
            })
        }

        $(function() {
            initTable()
        })
    </script>
@endpush
