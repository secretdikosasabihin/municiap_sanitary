<!-- Ceertificate Tab Content -->
<div class="tabs-contents" id="non_food-tab">
    <div class="card">
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th><input type="checkbox" id="selectAllss"></th>
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
                    @forelse($nonFood as $health)
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
                            <td>{{ Carbon\Carbon::parse($health->date_of_expiration)->format('F d, Y') }}</td>
                            <td>
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#updateModalHealthNon{{ $health->id }}">
                                    <i class="fa-solid fa-pen-to-square"></i> &nbsp;Update
                                </button>

                                <!-- Bootstrap Update Modal -->
                                <div class="modal fade" id="updateModalHealthNon{{ $health->id }}" tabindex="-1"
                                    aria-labelledby="updateModalLabel{{ $health->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel{{ $health->id }}">
                                                    Update Health Card</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('healthCard.update', $health->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Hidden ID -->
                                                    <input type="hidden" name="id" value="{{ $health->id }}">

                                                    <!-- Health Card Type -->
                                                    <div class="mb-3">
                                                        <label for="health_card_type" class="form-label">Health
                                                            Card Type</label>
                                                        <select class="form-control" id="health_card_type"
                                                            name="health_card_type" required>
                                                            <option value="" disabled>Select Health Card
                                                                Type</option>
                                                            <option value="non_food"
                                                                @selected($health->health_card_type == 'non_food')>
                                                                Non Food</option>
                                                            <option value="food"
                                                                @selected($health->health_card_type == 'food')>
                                                                Food</option>
                                                            <option value="others"
                                                                @selected($health->health_card_type == 'others')>
                                                                Others</option>
                                                        </select>
                                                    </div>

                                                    <!-- Full Name -->
                                                    <div class="mb-3">
                                                        <label for="full_name" class="form-label">Full
                                                            Name</label>
                                                        <input type="text" class="form-control" id="full_name"
                                                            name="full_name"
                                                            value="{{ old('full_name', $health->full_name) }}" required>
                                                    </div>

                                                    <!-- Age -->
                                                    <div class="mb-3">
                                                        <label for="age" class="form-label">Age</label>
                                                        <input type="text" class="form-control" id="age" name="age"
                                                            value="{{ old('age', $health->age) }}">
                                                    </div>

                                                    <!-- Gender -->
                                                    <div class="mb-3">
                                                        <label for="gender" class="form-label">Gender</label>
                                                        <input type="text" class="form-control" id="gender" name="gender"
                                                            value="{{ old('gender', $health->gender) }}">
                                                    </div>

                                                    <!-- Place of Employment -->
                                                    <div class="mb-3">
                                                        <label for="place_of_employment" class="form-label">Place of
                                                            Employment</label>
                                                        <input type="text" class="form-control" id="place_of_employment"
                                                            name="place_of_employment"
                                                            value="{{ old('place_of_employment', $health->place_of_employment) }}">
                                                    </div>

                                                    <!-- Designation -->
                                                    <div class="mb-3">
                                                        <label for="designation" class="form-label">Designation</label>
                                                        <input type="text" class="form-control" id="designation"
                                                            name="designation"
                                                            value="{{ old('designation', $health->designation) }}">
                                                    </div>

                                                    <!-- Barangay -->
                                                    <div class="mb-3">
                                                        <label for="barangay" class="form-label">Barangay</label>
                                                        <input type="text" class="form-control" id="barangay"
                                                            name="barangay"
                                                            value="{{ old('barangay', $health->barangay) }}">
                                                    </div>

                                                    <!-- Inspector Name -->
                                                    <div class="mb-3">
                                                        <label for="inspector_name" class="form-label">Inspector
                                                            Name</label>
                                                        <input type="text" class="form-control" id="inspector_name"
                                                            name="inspector_name"
                                                            value="{{ old('inspector_name', $health->inspector_name) }}">
                                                    </div>

                                                    <!-- Date of Issuance -->
                                                    <div class="mb-3">
                                                        <label for="date_of_issuance" class="form-label">Date of
                                                            Issuance</label>
                                                        <input type="date" class="form-control" id="date_of_issuance"
                                                            name="date_of_issuance"
                                                            value="{{ old('date_of_issuance', optional($health->date_of_issuance)->format('Y-m-d')) }}">
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center">No records found.</td>
                        </tr>
                    @endforelse
                </tbody>
                </tbody>
            </table>
            <script>
                document.getElementById('selectAllss').addEventListener('click', function (event) {
                    let checkboxes = document.querySelectorAll('input[name="selected_health_cards[]"]');
                    checkboxes.forEach(checkbox => checkbox.checked = event.target.checked);
                });
            </script>
        </div>
    </div>
</div>