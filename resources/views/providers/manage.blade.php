@extends('main')
@section('layout')
    <div class="row">
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="d-flex align-items-center align-self-start">
                                <h1 class="mb-0">GESTION DES FOURNISSEURS</h1>
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
                    <h4 class="card-title">Liste des fournisseurs</h4>
                    <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        <i class="mdi mdi-plus"></i>Enregistrer un fournisseur</button>
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
                                    <th> ADRESSE </th>
                                    <th> TELEPHONE </th>
                                    <th> ACTIONS </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($providers as $provider)
                                    <tr>
                                        <td>{{ $provider['id'] }}</td>
                                        <td>{{ $provider['nom_four'] }}</td>
                                        <td>{{ $provider['adresse_four'] }}</td>
                                        <td>{{ $provider['telephone_four'] }} </td>
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Enregistrement d'un fournisseur</h1>
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
                                            <label class="col-sm-3 col-form-label">ADRESSE</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="adresse" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">TELEPHONE</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="telephone" />
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
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Enregistrement d'un fournisseur</h1>
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
                                            <label class="col-sm-3 col-form-label">ADRESSE</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="adresse_e" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label">TELEPHONE</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="telephone_e" />
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
        $('#store').submit(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });
            $.ajax({
                method: 'POST',
                url: "{{ route('providers.store') }}",
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
            var providerId = $('#id_edit').val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                method: 'PUT',
                url: '/providers/' + providerId,
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

        function edit(id) {
            $.ajax({
                method: 'GET',
                url: '/providers/' + id + '/edit',
                success: function(response) {
                    var provider = response.provider;

                    $('#id_edit').val(provider.id);
                    $('#edit input[name="nom_e"]').val(provider.nom_four);
                    $('#edit input[name="adresse_e"]').val(provider.adresse_four);
                    $('#edit input[name="telephone_e"]').val(provider.telephone_four);

                    $('#editModal').modal('show');
                    //  console.log($('#id_edit').val());
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

        function deleteProvider(id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                }
            });

            $.ajax({
                method: 'DELETE',
                url: '/providers/' + id,
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

        window.operateEvents = {
            'click #edit': function(e, value, row, index) {
                e.preventDefault();
                edit(row.id)
            },
            'click #delete': function(e, value, row, index) {
                e.preventDefault();
                deleteProvider(row.id)
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
                        visible: false,
                        //  footerFormatter: totalTextFormatter
                    },
                    {
                        title: 'NOM',
                        field: 'nom',
                        align: 'center'
                    },
                    {
                        field: 'adresse',
                        title: 'ADRESSE',
                        sortable: true,
                        align: 'center',
                        //  footerFormatter: totalPriceFormatter
                    },
                    {
                        field: 'telephone',
                        title: 'TELEPHONE',
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
