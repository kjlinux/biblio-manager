 @extends('main')
 @section('layout')
     <div class="row">
         <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-12 d-flex align-items-center justify-content-center">
                             <div class="d-flex align-items-center align-self-start">
                                 <h1 class="mb-0">GESTION DES LIVRES</h1>
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
                     <h4 class="card-title">Liste des livres</h4>
                     <button type="button" class="btn btn-success btn-lg btn-block" data-bs-toggle="modal"
                         data-bs-target="#staticBackdrop">
                         <i class="mdi mdi-plus"></i>Ajouter un livre</button>
                     {{-- <p class="card-description"> <button type="button" class="btn btn-success btn-lg btn-block">
                             <i class="mdi mdi-account"></i>Ajouter un livre</button>
                     </p> --}}
                     <div class="table-responsive">
                         <table id="table" class="table table-striped" data-toggle="table" data-pagination="true"
                             data-search="true" data-detail-formatter="detailFormatter">
                             <thead>
                                 <tr>
                                     <th> ID </th>
                                     <th> ISBN </th>
                                     <th> TITRE </th>
                                     <th> PRIX </th>
                                     <th> CLASSIFICATION </th>
                                     <th> EDITION </th>
                                     <th> AUTEURS </th>
                                     <th> ACTIONS </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 @foreach ($books as $book)
                                     <tr>
                                         <td>{{ $book['id'] }}</td>
                                         <td>{{ $book['isbn'] }}</td>
                                         <td>{{ $book['titre'] }}</td>
                                         <td>{{ $book['prix'] }} </td>
                                         <td>{{ $book['classification'] }}</td>
                                         <td>{{ $book['edition'] }}</td>
                                         <td>
                                             @if (empty($book['authors']))
                                                 Aucun auteur
                                             @else
                                                 {{ implode(', ', $book['authors']) }}
                                             @endif
                                         </td>
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
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Ajout de livre</h1>
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
                                             <label class="col-sm-3 col-form-label">ISBN</label>
                                             <div class="col-sm-9">
                                                 <input type="text" name="isbn" class="form-control" />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">TITRE</label>
                                             <div class="col-sm-9">
                                                 <input type="text" name="titre" class="form-control" />
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">PRIX</label>
                                             <div class="col-sm-9">
                                                 <input class="form-control" name="prix" type="number"
                                                     placeholder="FCFA" />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">CLASSIFICATION</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-single" id="p_c"
                                                     name="classification" style="width:100%">
                                                     @foreach ($classifications as $classification)
                                                         <option value="{{ $classification->id }}">
                                                             {{ $classification->nom_class }}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">EDITION</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-single" id="p_e" name="edition"
                                                     style="width:100%">
                                                     @foreach ($editions as $edition)
                                                         <option value="{{ $edition->id }}">
                                                             {{ $edition->titre_ed }}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">AUTEURS(S)</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-multiple" id="p_a" name="auteurs[]"
                                                     multiple="multiple" style="width:100%">
                                                     @foreach ($authors as $author)
                                                         <option value="{{ $author['id'] }}">{{ $author['nom'] }}
                                                         </option>
                                                     @endforeach
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
                     <h1 class="modal-title fs-5" id="staticBackdropLabel">Modification de livre</h1>
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
                                             <label class="col-sm-3 col-form-label">ISBN</label>
                                             <div class="col-sm-9">
                                                 <input type="text" name="isbn_e" class="form-control" />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">TITRE</label>
                                             <div class="col-sm-9">
                                                 <input type="text" name="titre_e" class="form-control" />
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">PRIX</label>
                                             <div class="col-sm-9">
                                                 <input class="form-control" name="prix_e" type="number"
                                                     placeholder="FCFA" />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">CLASSIFICATION</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-single" id="e_c"
                                                     name="classification_e" style="width:100%">
                                                     @foreach ($classifications as $classification)
                                                         <option value="{{ $classification->id }}">
                                                             {{ $classification->nom_class }}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">EDITION</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-single" id="e_e" name="edition_e"
                                                     style="width:100%">
                                                     @foreach ($editions as $edition)
                                                         <option value="{{ $edition->id }}">
                                                             {{ $edition->titre_ed }}</option>
                                                     @endforeach
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">AUTEURS(S)</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-multiple" id="e_a"
                                                     name="auteurs_e[]" multiple="multiple" style="width:100%">
                                                     @foreach ($authors as $author)
                                                         <option value="{{ $author['id'] }}">{{ $author['nom'] }}
                                                         </option>
                                                     @endforeach
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
             $('#p_c').select2({
                 dropdownParent: $('#staticBackdrop')
             });
             $('#p_e').select2({
                 dropdownParent: $('#staticBackdrop')
             });
             $('#p_a').select2({
                 dropdownParent: $('#staticBackdrop')
             });
             $('#e_c').select2({
                 dropdownParent: $('#editModal')
             });
             $('#e_e').select2({
                 dropdownParent: $('#editModal')
             });
             $('#e_a').select2({
                 dropdownParent: $('#editModal')
             });
         });

         //  $('#valider_store').click(function() {
         $('#store').submit(function(e) {
             e.preventDefault();
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                 }
             });
             $.ajax({
                 method: 'POST',
                 url: "{{ route('books.store') }}",
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
         //  });

         $('#edit').submit(function(e) {
             e.preventDefault();
             var bookId = $('#id_edit').val();

             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                 }
             });

             $.ajax({
                 method: 'PUT',
                 url: '/books/' + bookId,
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
                 url: '/books/' + id + '/edit',
                 success: function(response) {
                     var book = response.book;

                     $('#id_edit').val(book.id);
                     $('#edit input[name="isbn_e"]').val(book.isbn);
                     $('#edit input[name="titre_e"]').val(book.titre);
                     $('#edit input[name="prix_e"]').val(book.prix);
                     $('#edit select[name="classification_e"]').val(book.classification_id).trigger('change');
                     $('#edit select[name="edition_e"]').val(book.edition_id).trigger('change');

                     var authorIds = book.authors.map(function(author) {
                         return author.id;
                     });
                     $('#edit select[name="auteurs_e[]"]').val(authorIds).trigger('change');

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

         function deleteBook(id) {
             $.ajaxSetup({
                 headers: {
                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                 }
             });

             $.ajax({
                 method: 'DELETE',
                 url: '/books/' + id,
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
                 deleteBook(row.id)
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
                         visible: false
                     },
                     {
                         title: 'ISBN',
                         field: 'isbn',
                         align: 'center',
                         valign: 'middle',
                         sortable: true,
                         //  footerFormatter: totalTextFormatter
                     },
                     {
                         title: 'TITRE',
                         field: 'titre',
                         align: 'center',
                     },
                     {
                         field: 'prix',
                         title: 'PRIX',
                         sortable: true,
                         //  footerFormatter: totalNameFormatter,
                         align: 'center'
                     },
                     {
                         field: 'classification',
                         title: 'CLASSIFICATION',
                         sortable: true,
                         align: 'center',
                         //  footerFormatter: totalPriceFormatter
                     },
                     {
                         field: 'edition',
                         title: 'EDITION',
                         sortable: true,
                         align: 'center',
                         //  footerFormatter: totalPriceFormatter
                     },
                     {
                         field: 'auteurs',
                         title: 'AUTEURS',
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
