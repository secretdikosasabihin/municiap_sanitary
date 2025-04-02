<!-- Ceertificate Tab Content -->
<div class="tab-content" id="certificate-tab">
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
                        <th>RENEWAL</th>
                        <th>RESTORE</th>

                    </tr>
                </thead>
                <tbody>

                    @forelse($permits->where('status', 'completed') as $permit)
                        <tr>
                            <td>{{$permit->id}}</td>
                            <td>{{$permit->name_of_establishment}}</td>
                            <td>{{$permit->name_of_owner}}</td>
                            <td>{{$permit->contact_number}}</td>
                            <td>{{$permit->barangay}}</td>
                            <td>{{$permit->line_of_business}}</td>
                            <td>{{$permit->renewal_year }}</td>
                            <td>
                                <form action="{{ route('sanitary.updateRenewal', $permit->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline btn-blue" type="submit">
                                         <i class="fa-solid fa-rotate"></i> &nbsp;Renewal
                                    </button>
                                </form>
                            <td>
                                <form action="{{ route('sanitary.updateRestoreInspection', $permit->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-outline btn-red" type="submit">
                                        <i class="fa-solid fa-trash-can-arrow-up"></i>&nbsp;Restore
                                </form>
                            </td>
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