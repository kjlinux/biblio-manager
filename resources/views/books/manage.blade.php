 @extends('main')
 @section('layout')
     <div class="row">
         <div class="col-sm-4 grid-margin">
             <div class="card">
                 <div class="card-body">
                     <h5>Nombre total de livres en stock</h5>
                     <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                             <div class="d-flex d-sm-block d-md-flex align-items-center">
                                 <h2 class="mb-0">$32123</h2>
                                 <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                             </div>
                             <h6 class="text-muted font-weight-normal">11.38% Since last month</h6>
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                             <i class="icon-lg mdi mdi-codepen text-primary ml-auto"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-sm-4 grid-margin">
             <div class="card">
                 <div class="card-body">
                     <h5>Nombre de livres en prêt</h5>
                     <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                             <div class="d-flex d-sm-block d-md-flex align-items-center">
                                 <h2 class="mb-0">$45850</h2>
                                 <p class="text-success ms-2 mb-0 font-weight-medium">+8.3%</p>
                             </div>
                             <h6 class="text-muted font-weight-normal"> 9.61% Since last month</h6>
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                             <i class="icon-lg mdi mdi-wallet-travel text-danger ml-auto"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="col-sm-4 grid-margin">
             <div class="card">
                 <div class="card-body">
                     <h5>Nombre de livres par catégorie</h5>
                     <div class="row">
                         <div class="col-8 col-sm-12 col-xl-8 my-auto">
                             <div class="d-flex d-sm-block d-md-flex align-items-center">
                                 <h2 class="mb-0">$2039</h2>
                                 <p class="text-danger ms-2 mb-0 font-weight-medium">-2.1% </p>
                             </div>
                             <h6 class="text-muted font-weight-normal">2.27% Since last month</h6>
                         </div>
                         <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                             <i class="icon-lg mdi mdi-monitor text-success ml-auto"></i>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
         <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-9">
                             <div class="d-flex align-items-center align-self-start">
                                 <h3 class="mb-0">$12.34</h3>
                                 <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                             </div>
                         </div>
                         <div class="col-3">
                             <div class="icon icon-box-success ">
                                 <span class="mdi mdi-arrow-top-right icon-item"></span>
                             </div>
                         </div>
                     </div>
                     <h6 class="text-muted font-weight-normal">Valeur totale du stock</h6>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-9">
                             <div class="d-flex align-items-center align-self-start">
                                 <h3 class="mb-0">$17.34</h3>
                                 <p class="text-success ms-2 mb-0 font-weight-medium">+11%</p>
                             </div>
                         </div>
                         <div class="col-3">
                             <div class="icon icon-box-success">
                                 <span class="mdi mdi-arrow-top-right icon-item"></span>
                             </div>
                         </div>
                     </div>
                     <h6 class="text-muted font-weight-normal">Quantité totale de livres par auteur</h6>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-9">
                             <div class="d-flex align-items-center align-self-start">
                                 <h3 class="mb-0">$12.34</h3>
                                 <p class="text-danger ms-2 mb-0 font-weight-medium">-2.4%</p>
                             </div>
                         </div>
                         <div class="col-3">
                             <div class="icon icon-box-danger">
                                 <span class="mdi mdi-arrow-bottom-left icon-item"></span>
                             </div>
                         </div>
                     </div>
                     <h6 class="text-muted font-weight-normal">Liste des livres avec leur quantité en stock</h6>
                 </div>
             </div>
         </div>
         <div class="col-xl-3 col-sm-6 grid-margin stretch-card">
             <div class="card">
                 <div class="card-body">
                     <div class="row">
                         <div class="col-9">
                             <div class="d-flex align-items-center align-self-start">
                                 <h3 class="mb-0">$31.53</h3>
                                 <p class="text-success ms-2 mb-0 font-weight-medium">+3.5%</p>
                             </div>
                         </div>
                         <div class="col-3">
                             <div class="icon icon-box-success ">
                                 <span class="mdi mdi-arrow-top-right icon-item"></span>
                             </div>
                         </div>
                     </div>
                     <h6 class="text-muted font-weight-normal">Nombre de livres non rendus à temps</h6>
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
                         <i class="mdi mdi-account"></i>Ajouter un livre</button>
                     {{-- <p class="card-description"> <button type="button" class="btn btn-success btn-lg btn-block">
                             <i class="mdi mdi-account"></i>Ajouter un livre</button>
                     </p> --}}
                     <div class="table-responsive">
                         <table class="table table-striped" data-toggle="table" data-pagination="true" data-search="true">
                             <thead>
                                 <tr>
                                     <th> User </th>
                                     <th> First name </th>
                                     <th> Progress </th>
                                     <th> Amount </th>
                                     <th> Deadline </th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td class="py-1">
                                         <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                                     </td>
                                     <td> Herman Beck </td>
                                     <td>
                                         <div class="progress">
                                             <div class="progress-bar bg-success" role="progressbar" style="width: 25%"
                                                 aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </td>
                                     <td> $ 77.99 </td>
                                     <td> May 15, 2015 </td>
                                 </tr>
                                 <tr>
                                     <td class="py-1">
                                         <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                                     </td>
                                     <td> Messsy Adam </td>
                                     <td>
                                         <div class="progress">
                                             <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"
                                                 aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </td>
                                     <td> $245.30 </td>
                                     <td> July 1, 2015 </td>
                                 </tr>
                                 <tr>
                                     <td class="py-1">
                                         <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                                     </td>
                                     <td> John Richards </td>
                                     <td>
                                         <div class="progress">
                                             <div class="progress-bar bg-warning" role="progressbar" style="width: 90%"
                                                 aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </td>
                                     <td> $138.00 </td>
                                     <td> Apr 12, 2015 </td>
                                 </tr>
                                 <tr>
                                     <td class="py-1">
                                         <img src="../../assets/images/faces-clipart/pic-4.png" alt="image" />
                                     </td>
                                     <td> Peter Meggik </td>
                                     <td>
                                         <div class="progress">
                                             <div class="progress-bar bg-primary" role="progressbar" style="width: 50%"
                                                 aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </td>
                                     <td> $ 77.99 </td>
                                     <td> May 15, 2015 </td>
                                 </tr>
                                 <tr>
                                     <td class="py-1">
                                         <img src="../../assets/images/faces-clipart/pic-1.png" alt="image" />
                                     </td>
                                     <td> Edward </td>
                                     <td>
                                         <div class="progress">
                                             <div class="progress-bar bg-danger" role="progressbar" style="width: 35%"
                                                 aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </td>
                                     <td> $ 160.25 </td>
                                     <td> May 03, 2015 </td>
                                 </tr>
                                 <tr>
                                     <td class="py-1">
                                         <img src="../../assets/images/faces-clipart/pic-2.png" alt="image" />
                                     </td>
                                     <td> John Doe </td>
                                     <td>
                                         <div class="progress">
                                             <div class="progress-bar bg-info" role="progressbar" style="width: 65%"
                                                 aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </td>
                                     <td> $ 123.21 </td>
                                     <td> April 05, 2015 </td>
                                 </tr>
                                 <tr>
                                     <td class="py-1">
                                         <img src="../../assets/images/faces-clipart/pic-3.png" alt="image" />
                                     </td>
                                     <td> Henry Tom </td>
                                     <td>
                                         <div class="progress">
                                             <div class="progress-bar bg-warning" role="progressbar" style="width: 20%"
                                                 aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
                                         </div>
                                     </td>
                                     <td> $ 150.00 </td>
                                     <td> June 16, 2015 </td>
                                 </tr>
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
                             <form class="form-sample">
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">ISBN</label>
                                             <div class="col-sm-9">
                                                 <input type="text" class="form-control" />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">TITRE</label>
                                             <div class="col-sm-9">
                                                 <input type="text" class="form-control" />
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">PRIX</label>
                                             <div class="col-sm-9">
                                                 <input class="form-control" placeholder="FCFA" />
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">CLASSIFICATION</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-single" name="state"
                                                     style="width:100%">
                                                     <option value="AL">Alabama</option>
                                                     <option value="WY">Wyoming</option>
                                                     <option value="AM">America</option>
                                                     <option value="CA">Canada</option>
                                                     <option value="RU">Russia</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">EDITIONS</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-single" style="width:100%">
                                                     <option value="AL">Alabama</option>
                                                     <option value="WY">Wyoming</option>
                                                     <option value="AM">America</option>
                                                     <option value="CA">Canada</option>
                                                     <option value="RU">Russia</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="form-group row">
                                             <label class="col-sm-3 col-form-label">AUTEURS(S)</label>
                                             <div class="col-sm-9">
                                                 <select class="js-example-basic-multiple" name="states[]"
                                                     multiple="multiple" style="width:100%">
                                                     <option value="AL">Alabama</option>
                                                     <option value="WY">Wyoming</option>
                                                     <option value="AM">America</option>
                                                     <option value="CA">Canada</option>
                                                     <option value="RU">Russia</option>
                                                 </select>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </form>
                         </div>
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-inverse-secondary" data-bs-dismiss="modal">Fermer</button>
                     <button type="button" class="btn btn-inverse-success">Valider</button>
                 </div>
             </div>
         </div>
     </div>
 @endsection
 @push('script')
     <script>
         $(document).ready(function() {
             $('.js-example-basic-single').select2({
                 dropdownParent: $('#staticBackdrop')
             });
             $('.js-example-basic-multiple').select2({
                 dropdownParent: $('#staticBackdrop')
             });
         });
     </script>
 @endpush
