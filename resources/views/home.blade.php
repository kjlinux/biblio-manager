@extends('main')
@section('layout')
    <div class="row">
        <div class="col-xl-12 col-sm-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 d-flex align-items-center justify-content-center">
                            <div class="d-flex align-items-center align-self-start">
                                <h1 class="mb-0">DASHBOARD</h1>
                            </div>
                        </div>
                    </div>
                    {{-- <h6 class="text-muted font-weight-normal">2.27% Since last month</h6> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-lg-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Nombre d’emprunteurs actifs</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $activeBorrowersCount }}</h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-account-multiple text-primary ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Nombre de livres non rendus à temps</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $overdueBooksCount }}</h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-book-alert text-danger ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Nombre total de livres empruntés</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $totalBorrowedBooksCount }}</h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-book-multiple text-success ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-3 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Dernière date d'emprunt pour chaque utilisateur</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $lastBorrowDate->max('derniere_date_emprunt') }}</h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-calendar-clock text-primary ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Nombre total de clients inscrits</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $totalCustomersCount }}</h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-account text-info ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-6 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h5>Nombre de livres disponibles en stock</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $availableBooksCount }}</h2>
                            </div>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <i class="icon-lg mdi mdi-book-open-page-variant text-warning ml-auto"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row d-flex align-items-center">
        <!-- Existing cards here -->

        <div class="col-6">
            <canvas id="booksByCategoryChart"></canvas>
        </div>
        <div class="col-6">
            <canvas id="borrowedOverTimeChart"></canvas>
        </div>
        <div class="col-6">
            <canvas id="overdueRateChart"></canvas>
        </div>
        <div class="col-6">
            <canvas id="mostBorrowedBooksChart"></canvas>
        </div>
        <div class="col-6">
            <canvas id="monthlyBookPurchasesChart"></canvas>
        </div>
        <div class="col-6">
            <canvas id="booksByAuthorChart"></canvas>
        </div>
        <!-- Add more canvas elements for other charts -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns"></script>
    <script>
        const booksByCategoryData = @json($booksByCategory);
        const borrowedOverTimeData = @json($borrowedOverTime);
        const overdueRateData = @json($overdueRate);
        const mostBorrowedBooksData = @json($mostBorrowedBooks);
        const monthlyBookPurchasesData = @json($monthlyBookPurchases);
        const booksByAuthorData = @json($booksByAuthor);

        const ctxCategory = document.getElementById('booksByCategoryChart').getContext('2d');
        const booksByCategoryChart = new Chart(ctxCategory, {
            type: 'pie',
            data: {
                labels: booksByCategoryData.map(item => item.categorie),
                datasets: [{
                    label: 'Répartition des livres par catégorie',
                    data: booksByCategoryData.map(item => item.nombre),
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        const ctxBorrowedOverTime = document.getElementById('borrowedOverTimeChart').getContext('2d');
        const borrowedOverTimeChart = new Chart(ctxBorrowedOverTime, {
            type: 'line',
            data: {
                labels: borrowedOverTimeData.map(item => item.date),
                datasets: [{
                    label: 'Évolution des emprunts au fil du temps',
                    data: borrowedOverTimeData.map(item => item.nombre),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        const ctxOverdueRate = document.getElementById('overdueRateChart').getContext('2d');
        const overdueRateChart = new Chart(ctxOverdueRate, {
            type: 'bar',
            data: {
                labels: overdueRateData.map(item => item.date),
                datasets: [{
                    label: 'Taux de retour en retard',
                    data: overdueRateData.map(item => item.nombre),
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'day'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        const ctxMostBorrowedBooks = document.getElementById('mostBorrowedBooksChart').getContext('2d');
        const mostBorrowedBooksChart = new Chart(ctxMostBorrowedBooks, {
            type: 'bar',
            data: {
                labels: mostBorrowedBooksData.map(item => item.titre),
                datasets: [{
                    label: 'Livres les plus empruntés',
                    data: mostBorrowedBooksData.map(item => item.nombre),
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                indexAxis: 'y',
                scales: {
                    x: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        const ctxMonthlyBookPurchases = document.getElementById('monthlyBookPurchasesChart').getContext('2d');
        const monthlyBookPurchasesChart = new Chart(ctxMonthlyBookPurchases, {
            type: 'bar',
            data: {
                labels: monthlyBookPurchasesData.map(item => item.month),
                datasets: [{
                    label: 'Coût des achats mensuels de livres',
                    data: monthlyBookPurchasesData.map(item => item.total_cost),
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        type: 'time',
                        time: {
                            unit: 'month'
                        }
                    },
                    y: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });

        const ctxBooksByAuthor = document.getElementById('booksByAuthorChart').getContext('2d');
        const booksByAuthorChart = new Chart(ctxBooksByAuthor, {
            type: 'bar',
            data: {
                labels: booksByAuthorData.map(item => item.auteur),
                datasets: [{
                    label: 'Disponibilité des livres par auteur',
                    data: booksByAuthorData.map(item => item.nombre),
                    backgroundColor: 'rgba(153, 102, 255, 0.2)',
                    borderColor: 'rgba(153, 102, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    }
                },
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw;
                            }
                        }
                    }
                }
            }
        });
    </script>
@endsection
