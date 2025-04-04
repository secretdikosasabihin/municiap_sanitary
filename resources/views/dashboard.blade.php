<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Business Sanitary Permit</title>
    <!-- Lucide Icons -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href=" https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

    @include('style')
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
                    <h1 class="title">Business Sanitary Permit</h1>
                </div>




                <!-- Authentication Section -->
                <div class="auth text-end mt-3">
                    <div class="links">
                        <a href="{{ url('health-card') }}"
                            class="{{ Request::is('health-card') ? 'active' : '' }}">Health Card</a>
                        <a href="{{ url('death-certificate') }}"
                            class="{{ Request::is('death-certificate') ? 'active' : '' }}">Death Certificate</a>
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

    <!-- Bootstrap Modal for Advanced Search -->
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
                    <form method="GET" action="{{ route('dashboard') }}">
                        <div class="mb-3">
                            <label for="owner_name" class="form-label">Owner Name:</label>
                            <input type="text" name="owner_name" value="{{ request('owner_name') }}"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="barangay" class="form-label">Barangay:</label>
                            <input type="text" name="barangay" value="{{ request('barangay') }}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="line_of_business" class="form-label">Line of Business:</label>
                            <input type="text" name="line_of_business" value="{{ request('line_of_business') }}"
                                class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="renewal_year" class="form-label">Renewal Year:</label>
                            <select name="renewal_year" class="form-select">
                                @for ($year = date('Y'); $year >= date('Y') - 10; $year--)
                                    <option value="{{ $year }}" {{ request('renewal_year') == $year ? 'selected' : '' }}>
                                        {{ $year }}</option>
                                @endfor
                            </select>
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

    <!-- Main Content -->
    <main class="container">
        <div class="tabs-container">
            <div class="tabs-header d-flex justify-content-between align-items-center">
                <div class="tabs-list">
                    <button class="tab-btn active" data-tab="all">All ({{ $sanitary->count() }})</button>
                    <button class="tab-btn" data-tab="inspection">Inspection ({{ $inspections->count() }})</button>
                    <button class="tab-btn" data-tab="certificate">Sanitary Permit ({{ $permits->count() }})</button>
                    <button class="tab-btn" data-tab="printed">Printed ({{ $prints->count() }})</button>
                    <button class="tab-btn" data-tab="archive">Archive ({{ $archives->count() }})</button>
                    <button class="tab-btn" data-tab="history">History</button>
                </div>

                <div class="d-flex align-items-center gap-2">
                    <div class="search-section">
                        <form method="GET" action="{{ route('dashboard') }}" class="container mt-3">
                            <div class="row g-2 align-items-center">
                                <div class="col-md-8">
                                    <input type="search" name="search" placeholder="Search establishments..."
                                        class="form-control" value="{{ request('search') }}"
                                        style="width: 400px; margin-right: 100px;">
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


                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- Renewal Year Dropdown -->
                    @php
                        $currentYear = date('Y');
                        $startYear = $currentYear - 5;
                        $endYear = $currentYear + 5;
                        $selectedYear = request()->has('search') && request()->input('search') !== '' ? 'ALL YEAR' : request()->input('renewal_year', $currentYear);
                    @endphp

                    <div class="dropdown">
                        <!-- Dropdown Button -->
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="renewalYearDropdown"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $selectedYear }}
                        </button>

                        <!-- Dropdown Menu -->
                        <ul class="dropdown-menu" aria-labelledby="renewalYearDropdown">
                            @for ($year = $startYear; $year <= $endYear; $year++)
                                <li>
                                    <a class="dropdown-item renewal-year-option {{ $selectedYear == $year ? 'active' : '' }}"
                                        href="#" data-year="{{ $year }}">
                                        {{ $year }}
                                    </a>
                                </li>
                            @endfor
                        </ul>
                    </div>


                    <!-- Create New Permit Button -->
                    <button type="button" class="btn btn-primary newp" data-bs-toggle="modal"
                        data-bs-target="#newPermitModal">
                        <i class="fa-solid fa-plus"></i> &nbsp;
                        Create New Permit
                    </button>
                </div>
            </div>


            <!-- Modal -->
            <div class="modal fade" id="newPermitModal" tabindex="-1" aria-labelledby="newPermitModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="newPermitModalLabel">New Permit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('sanitary') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="name_of_establishment" class="form-label">Name of
                                        Establishment</label>
                                    <input type="text" class="form-control" id="name_of_establishment"
                                        name="name_of_establishment" required>
                                </div>
                                <div class="mb-3">
                                    <label for="name_of_owner" class="form-label">Name of Owner</label>
                                    <input type="text" class="form-control" id="name_of_owner" name="name_of_owner"
                                        required>
                                </div>
                                <div class="mb-3">
                                    <label for="contact_number" class="form-label">Contact Number</label>
                                    <input type="text" class="form-control" id="contact_number" name="contact_number">
                                </div>
                                <div class="mb-3">
                                    <label for="barangay" class="form-label">Barangay</label>
                                    <input type="text" class="form-control" id="barangay" name="barangay" required>
                                </div>
                                <div class="mb-3">
                                    <label for="line_of_business" class="form-label">Line of Business</label>
                                    <input type="text" class="form-control" id="line_of_business"
                                        name="line_of_business" required>
                                </div>

                                <div class="mb-3">
                                    <label for="inspector_name" class="form-label">Inspector</label>
                                    <input type="text" class="form-control" id="inspector_name" name="inspector_name"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label for="renewal_year" class="form-label">Year</label>
                                    <input type="text" class="form-control" id="renewal_year" name="renewal_year"
                                        value="{{ date('Y') }}" required readonly>
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
            <div class="tab-content active" id="all-tab">
                <div class="card">
                    <div class="table-container">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ESTABLISHMENT</th>
                                    <th>OWNER</th>
                                    <th>CONTACT</th>
                                    <th>BARANGAY</th>
                                    <th>LINE OF BUSINESS</th>
                                    <th>YEAR</th>
                                    <th>CLOSE</th>
                                    <th>INSPECTION</th>
                                    <th>UPDATE</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($sanitary->where('status', 'new') as $san)
                                    <tr>
                                        <td>{{$san->id}}</td>
                                        <td>{{$san->name_of_establishment}}</td>
                                        <td>{{$san->name_of_owner}}</td>
                                        <td>{{ substr($san->contact_number, 0, 4) . '-' . substr($san->contact_number, 4, 3) . '-' . substr($san->contact_number, 7) }}
                                        </td>
                                        <td>{{$san->barangay}}</td>
                                        <td>{{$san->line_of_business}}</td>
                                        <td>{{ $san->renewal_year }}</td>
                                        <td>
                                            <form action="{{ route('sanitary.updateClose', $san->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-outline btn-red" type="submit">
                                                    <i class="fa-solid fa-circle-xmark"></i><span> &nbsp;Close</span>
                                                </button>
                                            </form>
                                        </td>
                                        <td>
                                            <form action="{{ route('sanitary.updateInspection', $san->id) }}" method="POST">
                                                @csrf
                                                <button class="btn btn-outline btn-green">
                                                    <i class="fa-solid fa-check"></i><span> &nbsp;Done</span>
                                                </button>
                                            </form>
                                        </td>

                                        <td>

                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#updateModal{{ $san->id }}">
                                                <i class="fa-solid fa-pen-to-square"></i> &nbsp;Update
                                            </button>

                                            <!-- Bootstrap Update Modal -->
                                            <div class="modal fade" id="updateModal{{ $san->id }}" tabindex="-1"
                                                aria-labelledby="updateModalLabel{{ $san->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="updateModalLabel{{ $san->id }}">
                                                                Update Permit</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('sanitary.update', $san->id) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('PUT')

                                                                <!-- Hidden ID -->
                                                                <input type="hidden" name="id" value="{{ $san->id }}">

                                                                <div class="mb-3">
                                                                    <label class="form-label">Establishment Name</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name_of_establishment"
                                                                        value="{{ old('name_of_establishment', $san->name_of_establishment) }}"
                                                                        required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Owner</label>
                                                                    <input type="text" class="form-control"
                                                                        name="name_of_owner"
                                                                        value="{{ old('name_of_owner', $san->name_of_owner) }}"
                                                                        required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Contact Number</label>
                                                                    <input type="text" class="form-control"
                                                                        name="contact_number"
                                                                        value="{{ old('contact_number', $san->contact_number) }}">
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Barangay</label>
                                                                    <input type="text" class="form-control" name="barangay"
                                                                        value="{{ old('barangay', $san->barangay) }}"
                                                                        required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Line of Business</label>
                                                                    <input type="text" class="form-control"
                                                                        name="line_of_business"
                                                                        value="{{ old('line_of_business', $san->line_of_business) }}"
                                                                        required>
                                                                </div>

                                                                <div class="mb-3">
                                                                    <label class="form-label">Inspector</label>
                                                                    <input type="text" class="form-control"
                                                                        name="inspector_name"
                                                                        value="{{ old('inspector_name', $san->inspector_name) }}"
                                                                        style="text-transform: capitalize;">
                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Submit</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center">No Business records found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

                <div class="d-flex justify-content-center mt-3">
                    {{ $sanitary->links() }}
                </div>




            </div>


            @include('inspection')

            @include('archive')

            @include('recieveCert')

            @include('printed')

            @INCLUDE('history')


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





    @include('script')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>




</body>

</html>