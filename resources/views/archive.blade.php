<!-- Archive Tab Content -->
<div class="tab-content" id="archive-tab">
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
                        <th>RESTORE</th>
                        <th>UPDATE</th>

                    </tr>
                </thead>
                <tbody>

                    @forelse($archives->where('status', 'close') as $archive)
                        <tr>
                            <td>{{$archive->id}}</td>
                            <td>{{$archive->name_of_establishment}}</td>
                            <td>{{$archive->name_of_owner}}</td>
                            <td>{{$archive->contact_number}}</td>
                            <td>{{$archive->barangay}}</td>
                            <td>{{$archive->line_of_business}}</td>
                            <td>{{$archive->renewal_year }}</td>

                            <td>
                                <form action="{{ route('sanitary.updateRestore', $archive->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline btn-red" type="submit">
                                        <i class="fa-solid fa-trash-can-arrow-up"></i>&nbsp;Restore
                                </form>
                            </td>
                            <td>

                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#updateModal{{ $archive->id }}">
                                        <i class="fa-solid fa-pen-to-square"></i> &nbsp;Update
                                </button>

                                <!-- Bootstrap Update Modal -->
                                <div class="modal fade" id="updateModal{{ $archive->id }}" tabindex="-1"
                                    aria-labelledby="updateModalLabel{{ $archive->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel{{ $archive->id }}">
                                                    Update Permit</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('sanitary.update', $archive->id) }}" method="POST">
                                                    @csrf
                                                    @method('PUT')

                                                    <!-- Hidden ID -->
                                                    <input type="hidden" name="id" value="{{ $archive->id }}">

                                                    <div class="mb-3">
                                                        <label class="form-label">Establishment Name</label>
                                                        <input type="text" class="form-control" name="name_of_establishment"
                                                            value="{{ old('name_of_establishment', $archive->name_of_establishment) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Owner</label>
                                                        <input type="text" class="form-control" name="name_of_owner"
                                                            value="{{ old('name_of_owner', $archive->name_of_owner) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Contact Number</label>
                                                        <input type="text" class="form-control" name="contact_number"
                                                            value="{{ old('contact_number', $archive->contact_number) }}"
                                                            required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Barangay</label>
                                                        <input type="text" class="form-control" name="barangay"
                                                            value="{{ old('barangay', $archive->barangay) }}" required>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label">Line of Business</label>
                                                        <input type="text" class="form-control" name="line_of_business"
                                                            value="{{ old('line_of_business', $archive->line_of_business) }}"
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
                            <td colspan="9" class="text-center">No Business records found.</td>
                        </tr>
                    @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>