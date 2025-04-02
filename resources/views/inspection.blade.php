<!-- Inspection Tab Content -->
<div class="tab-content" id="inspection-tab">
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
                        <th>BUSINESS TYPE</th>
                        <th>YEAR</th>
                        <th>PRINT</th>
                        <th>RECIEVING CERTIFICATE</th>
                        <th>RESTORE</th>
                        <th>UPDATE</th>

                    </tr>
                </thead>
                <tbody>
                    
                    @forelse($inspections->where('status', 'inspection') as $inspection)
                        <tr>
                            <td>{{$inspection->id}}</td>
                            <td>{{$inspection->name_of_establishment}}</td>
                            <td>{{$inspection->name_of_owner}}</td>
                            <td>{{$inspection->contact_number}}</td>
                            <td>{{$inspection->barangay}}</td>
                            <td>{{$inspection->line_of_business}}</td>
                            <td>{{ $inspection->renewal_year }}</td>

                            <td>
                                <button class="btn btn-outline btn-green">
                                    <a href="{{ route('print', $inspection->id) }}"><i class="fa-solid fa-print"></i></a> 
                                </button>
                            </td>
                            <td>
                                <form action="{{ route('sanitary.updateCompleted', $inspection->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline btn-green">
                                        <i class="fa-solid fa-check"></i><span> &nbsp;Done</span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('sanitary.updateRestore', $inspection->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline btn-red" type="submit">
                                        <i class="fa-solid fa-trash-can-arrow-up"></i>&nbsp;Restore
                                    </button>
                                </form>
                            </td>
                            <td>

                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#updateModal{{ $inspection->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i> &nbsp;Update
                                </button>

                                <!-- Bootstrap Update Modal -->
                                <div class="modal fade" id="updateModal{{ $inspection->id }}" tabindex="-1"
                                    aria-labelledby="updateModalLabel{{ $inspection->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel{{ $inspection->id }}">
                                                    Update Permit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('sanitary.update', $inspection->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Hidden ID -->
                                                    <input type="hidden" name="id" value="{{ $inspection->id }}">

                                                    <div class="mb-3">
                                                        <label class="form-label">Establishment Name</label>
                                                        <input type="text" class="form-control" name="name_of_establishment"
                                                            value="{{ old('name_of_establishment', $inspection->name_of_establishment) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Owner</label>
                                                        <input type="text" class="form-control" name="name_of_owner"
                                                            value="{{ old('name_of_owner', $inspection->name_of_owner) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Contact Number</label>
                                                        <input type="text" class="form-control" name="contact_number"
                                                            value="{{ old('contact_number', $inspection->contact_number) }}"
                                                            >
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Barangay</label>
                                                        <input type="text" class="form-control" name="barangay"
                                                            value="{{ old('barangay', $inspection->barangay) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Line of Business</label>
                                                        <input type="text" class="form-control" name="line_of_business"
                                                            value="{{ old('line_of_business', $inspection->line_of_business) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">inspector</label>
                                                        <input type="text" class="form-control" name="inspector_name"
                                                            value="{{ old('inspector_name', $inspection->inspector_name) }}"
                                                            required>
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
                            </td>

                        </tr>
                        @empty
                        <tr>
                            <td colspan="11" class="text-center">No Business records found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>