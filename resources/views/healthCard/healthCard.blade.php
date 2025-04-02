<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HEALTH CARD</title>
    <!-- Lucide Icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @include('healthCard.style')
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logos">
                        <img src="images/concepcion tarlac logo.png" alt="Concepcion Tarlac Logo" class="logo">
                        <img src="images/Official Logo - MHO.png" alt="MHO Logo" class="logo">

                    </div>
                    <h1 class="title">HEALTH CARD</h1>
                </div>
                <!-- Authentication Section -->
                <div class="auth text-end mt-3">
                    <div class="links">
                        <div class="links">
                            <a href="{{ url('dashboard?renewal_year=2025') }}"
                                class="{{ Request::is('dashboard?renewal_year=2025') ? 'active' : '' }}">Permit</a>
                            <a href="{{ url('death-certificate') }}"
                                class="{{ Request::is('death-certificate') ? 'active' : '' }}">Death Certificate</a>
                        </div>
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
        <div class="tabs-container">
            <div class="tabs-header d-flex justify-content-between align-items-center">
                <div class="tabs-list">
                    <button class="tab-btn active" data-tab="all">All ({{ $healthCard->count() }})</button>
                    <button class="tab-btn" data-tab="non_food">Non Food ({{ $nonFood->count() }})</button>
                    <button class="tab-btn" data-tab="food">Food ({{ $food->count() }})</button>
                    <button class="tab-btn" data-tab="others">Others ({{ $others->count() }})</button>
                    <button class="tab-btn" data-tab="printed">Printed ({{ $printed->count() }}) </button>
                    <button class="tab-btn" data-tab="notprinted">Not Printed ({{ $notprinted->count() }}) </button>
                </div>

                <!-- Generate PDF Form (Moved Outside the Table) -->
                <div class="d-flex align-items-center gap-2">
                    <div class="search-section">
                        <form method="GET" action="{{ route('healthCard') }}" class="container mt-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-8">
                                    <input type="search" name="search" placeholder="Search..." class="form-control"
                                        value="{{ request('search') }}" style="width: 400px; margin-right: 100px;">
                                </div>
                                <!-- <div class="col-md-2">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fas fa-search"></i> Search
                                </button>
                            </div> -->
                                <div class="col-md-2">
                                    <!-- Button to trigger modal -->
                                    <button type="button" class="btn btn-secondary w-200 p-2" data-bs-toggle="modal"
                                        data-bs-target="#advancedSearchModal">
                                        <i class="fas fa-filter"></i> Advanced
                                    </button>
                                    <!-- 
                                <button type="button" class="btn btn-secondary w-200 p-2" data-bs-toggle="modal"
                                    data-bs-target="#advancedSearchModal">
                                    <i class="fas fa-filter"></i> Advanced
                                </button> -->
                                </div>
                            </div>
                        </form>
                    </div>

                    <form id="generatePdfForm" method="POST" action="{{ route('generate.pdf') }}">
                        @csrf
                        <button type="submit" class="btn btn-danger">Generate PDF</button>
                    </form>
                    <!-- Create New Permit Button -->
                    <button type="button" class="btn btn-primary newp" data-bs-toggle="modal"
                        data-bs-target="#newPermitModal">
                        <i class="fa-solid fa-plus"></i> &nbsp;
                        Create New Health Card
                    </button>
                </div>
            </div>

            <div class="modal fade" id="advancedSearchModal" tabindex="-1" aria-labelledby="advancedSearchLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="advancedSearchLabel"><i class="fas fa-search"></i> Advanced
                                Search</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form method="GET" action="{{ route('healthCard') }}">
                                <div class="mb-3">
                                    <label for="owner_name" class="form-label">Name:</label>
                                    <input type="text" name="owner_name" value="{{ request('full_name') }}"
                                        class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="barangay" class="form-label">Place of Employment</label>
                                    <input type="text" name="barangay" value="{{ request('place_of_employment') }}"
                                        class="form-control">
                                </div>




                                <div class="text-end">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Apply
                                        Filters</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="newPermitModal" tabindex="-1" aria-labelledby="newPermitModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newPermitModalLabel">New Health Card</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('new.healthCard') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="health_card_type" class="form-label">Health Card Type</label>
                                    <select class="form-control" id="health_card_type" name="health_card_type" required>
                                        <option value="" disabled selected>Select Health Card Type</option>
                                        <option value="non_food">Non Food</option>
                                        <option value="food">Food</option>
                                        <option value="others">others</option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="full_name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name">
                                </div>

                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="text" class="form-control" id="age" name="age">
                                </div>

                                <div class="mb-3">
                                    <label for="gender" class="form-label">Gender</label>
                                    <input type="text" class="form-control" id="gender" name="gender">
                                </div>

                                <div class="mb-3">
                                    <label for="place_of_employment" class="form-label">Place of Employment</label>
                                    <input type="text" class="form-control" id="place_of_employment"
                                        name="place_of_employment">
                                </div>

                                <div class="mb-3">
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" class="form-control" id="designation" name="designation">
                                </div>

                                <div class="mb-3">
                                    <label for="date_of_issuance" class="form-label">Date of Issuance</label>
                                    <input type="date" class="form-control" id="date_of_issuance"
                                        name="date_of_issuance" required>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>



            <!-- All Tab Content -->
            <div class="tabs-contents active" id="all-tab">
                <div class="card">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" id="selectAll"></th>
                                    <th>Serial CODE</th>
                                    <th>FULL NAME</th>
                                    <th>AGE</th>
                                    <th>GENDER</th>
                                    <th>PLACE OF EMPLOYMENT</th>
                                    <th>DESIGNATION</th>
                                    <th>DATE OF ISSUANCE</th>
                                    <th>DATE OF EXPIRATION</th>
                                    <th>UPDATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($healthCard as $health)
                                    <tr>
                                        <td>
                                            <input type="checkbox" class="selected" form="generatePdfForm"
                                                name="selected_health_cards[]" value="{{ $health->id }}">
                                        </td>
                                        <td>{{$health->print_code}}</td>
                                        <td>{{$health->full_name}}</td>
                                        <td>{{$health->age}}</td>
                                        <td>{{$health->gender}}</td>
                                        <td>{{$health->place_of_employment}}</td>
                                        <td>{{$health->designation}}</td>
                                        <td>{{ Carbon\Carbon::parse($health->date_of_issuance)->format('F d, Y') }}</td>
                                        <td>{{ Carbon\Carbon::parse($health->date_of_expiration)->format('F d, Y') }}
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#updateModalHealth{{ $health->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i> &nbsp;Update
                                            </button>

                                            @include('healthCard.updateModal')
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">No records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>

                        <script>
                            document.getElementById('selectAll').addEventListener('click', function (event) {
                                let checkboxes = document.querySelectorAll('input[name="selected_health_cards[]"]');
                                checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
                            });
                        </script>

                    </div>

                </div>


                <div class="d-flex justify-content-center mt-3">
                    {{ $healthCard->links() }}
                </div>

            </div>

            @include('healthCard.nonFood')
            @include('healthCard.food')
            @include('healthCard.others')
            @include('healthCard.printedHealth')
            @include('healthCard.notPrinted')

        </div>

    </main>

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