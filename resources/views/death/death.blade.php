<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEATH CERTIFICATE</title>
    <!-- Lucide Icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @include('healthCard.style')

    <style>
        .data-table th,
        .data-table td {
            white-space: nowrap;
            text-align: center;
        }

        /* .data-table tbody tr:nth-child(even) {
            background-color: #f9f9f9;
            padding: 10px;
        } */

        .table-container {
            max-height: 78vh;
            height: 100vh;
            /* overflow-y: auto; */
            /* overflow-x: auto; */
            display: block;
            /* white-space: nowrap; */
        }

        .scrollable-container {
            width: 100%;
            overflow-x: auto;
            overflow-y: hidden;
            white-space: nowrap;
            position: relative;
            padding-bottom: 10px;
            /* Space for the scrollbar */
        }

        .scrollable-table {
            width: 100%;
            border-collapse: collapse;
        }

        .scrollable-table thead {
            background: white;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        td:hover .tooltip-text {
            display: inline;
        }

        thead {
            position: sticky;
            top: 0;
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content" >
                <div class="logo-section">
                    <div class="logos">
                        <img src="images/concepcion tarlac logo.png" alt="Concepcion Tarlac Logo" class="logo">
                        <img src="images/Official Logo - MHO.png" alt="MHO Logo" class="logo">

                    </div>
                    <h1 class="title">DEATH CERTIFICATE</h1>
                </div>

                <!-- Authentication Section -->
                <div class="auth text-end mt-3">
                    <div class="links">
                        <a href="{{ url('health-card') }}"
                            class="{{ Request::is('health-card') ? 'active' : '' }}">Health Card</a>
                        <a href="{{ url('dashboard?renewal_year=2025') }}"
                            class="{{ Request::is('dashboard?renewal_year=2025') ? 'active' : '' }}">Permit</a>
                    </div>
                    @auth
                        <span class="me-3"><strong>{{ Auth::user()->name }}</strong></span>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-danger">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    @else
                        @if(Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-outline-primary">Login</a>
                        @endif
                    @endauth
                </div>

            </div>
        </div>
    </header>




    <!-- Main Content -->
    <main class="container">
        <div class="tabs-container" >
            <!-- <div class="tabs-header d-flex justify-content-between align-items-center">
                <div class="tabs-list">
                    <button class="tab-btn active" data-tab="all">All </button>
                    <button class="tab-btn" data-tab="non_food">Non Food</button>
                    <button class="tab-btn" data-tab="food">Food </button>
                    <button class="tab-btn" data-tab="others">Others </button>
                    <button class="tab-btn" data-tab="printed">Printed </button>
                </div> -->

            <!-- Generate PDF Form (Moved Outside the Table) -->
            <div class="tabs-header d-flex justify-content-center align-items-center">
                <!-- <div class="d-flex align-items-center gap-2">
                    <div class="search-section">
                        <form method="GET" class="container mt-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-8 d-flex align-items-center">
                                    <div class="input-group"
                                        style="width: 1000px; margin-right: 50px; border: 1px solid;">
                                        <input type="search" name="search" placeholder="Search..." class="form-control"
                                            value="{{ request('search') }}">
                                        <span class="input-group-text"><i class="fa-solid fa-search"></i></span>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
                <div class="d-flex align-items-center gap-2">
                    <div class="search-section flex-grow-1">
                        <form method="GET" class="container mt-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-8 d-flex align-items-center">
                                    <div class="input-group w-1000" style="width: 1000px; margin-right: 10px;">
                                        <input type="search" name="search" placeholder="Search..." class="form-control"
                                            value="{{ request('search') }}" style="border: 1px solid;">
                                        <span class="input-group-text" style="border: 1px solid;"><i class="fa-solid fa-search"></i></span>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-secondary w-100 p-2">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <form id="generatePdfForm" method="POST" action="{{ route('deaths.generatePdf') }}">
                    @csrf
                    <button type="submit" class="btn btn-danger">Generate PDF</button>
                </form>

                <!-- Create New Permit Button -->
                <button type="button" class="btn btn-primary newp" data-bs-toggle="modal"
                    data-bs-target="#newDeathModal">
                    <i class="fa-solid fa-plus"></i> &nbsp;
                    Create New Death Certificate
                </button>
            </div>
        </div>


        @include('death.addDeathModal')





        <!-- All Tab Content -->
        <!-- <div class="tabs-contents active" id="all-tab"> -->
        <div class="card">
            <div class="table-container">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>id</th>
                            <th>Full Name</th>
                            <th>GENDER</th>
                            <th>date of death</th>
                            <th>date of birth</th>
                            <!-- <th>age</th> -->
                            <th>place of death</th>
                            <th>civil status</th>
                            <th>religion</th>
                            <th>citizenship</th>
                            <th>Residence</th>
                            <th>name of father</th>
                            <th>name of mother</th>
                            <th>informant name</th>
                            <th>informant address</th>
                            <th>informant relationship</th>
                            <th>A</th>
                            <th>B</th>
                            <th>C</th>
                            <th>Doctor</th>
                            <th>Reviewed by</th>
                            <th>Addres s</th>
                            <th>prepared by</th>
                            <th>Date</th>
                            <th>remarks</th>
                            <th>Update</th>


                        </tr>
                    </thead>
                    <tbody>
                        @forelse($deaths as $death)
                            <tr>
                                <td>
                                    <input type="checkbox" class="select-checkbox" name="selected_deaths[]"
                                        value="{{ $death->id }}" form="generatePdfForm">
                                </td>
                                <td>{{ $death->id }}</td>
                                <td>{{ $death->first_name }} {{ $death->middle_name }} {{ $death->last_name }}</td>
                                <td>{{ $death->sex }}</td>
                                <td>{{ \Carbon\Carbon::parse($death->date_of_death)->format('F d, Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($death->birthdate)->format('F d, Y') }}</td>
                                <!-- <td>{{ $death->age }}</td> -->
                                <td>{{ $death->place_of_death }}</td>
                                <td>{{ $death->civil_status }}</td>
                                <td>{{ $death->religion }}</td>
                                <td>{{ $death->citizenship}}</td>
                                <td>{{ $death->residence }}</td>
                                <td>{{ $death->name_of_father }}</td>
                                <td>{{ $death->name_of_mother }}</td>
                                <td>{{ $death->informant_name }}</td>
                                <td>{{ $death->informant_address }}</td>
                                <td>{{ $death->relationship}}</td>
                                <td>{{ $death->cause_of_death_a}}</td>
                                <td>{{ $death->cause_of_death_b}}</td>
                                <td>{{ $death->cause_of_death_c}}</td>
                                <td>{{ $death->doctor }} ({{ $death->doctor_position }})</td>
                                <td>{{ $death->reviewed_by }} ({{ $death->reviewed_position }})</td>
                                <td>{{ $death->address}}</td>
                                <td>{{ $death->prepared_by_name }} ({{ $death->prepared_by_position }})</td>
                                <td>{{ \Carbon\Carbon::parse($death->date)->format('F d, Y') }}</td>
                                <td>{{ $death->remarks }}</td>
                                <td>
                                    <button class="btn btn-warning" data-bs-toggle="modal"
                                        data-bs-target="#updateModal{{ $death->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i> &nbsp;Update
                                    </button>

                                    @include ('death.updateDeath')
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="15" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>




        </div>


        </div>

    </main>

    <script>
        document.getElementById('select-all').addEventListener('change', function () {
            let checkboxes = document.querySelectorAll('.select-checkbox');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>

    @if(session('success'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
            <div class="alert alert-success alert-dismissible fade show shadow-lg" role="alert" id="session-alert">
                <i class="bi bi-check-circle"></i> <!-- Bootstrap Icon -->
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    @if(session('warning'))
        <div class="position-fixed top-0 end-0 p-3" style="z-index: 1050">
            <div class="alert alert-warning alert-dismissible fade show shadow-lg" role="alert" id="session-alert">
                <i class="bi bi-exclamation-triangle"></i> <!-- Bootstrap Warning Icon -->
                {{ session('warning') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

    @include('healthCard.script')


</body>

</html>