<!-- Ceertificate Tab Content -->
<div class="tab-content" id="printed-tab">
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
                        <th>PRINT</th>
                      

                    </tr>
                </thead>
                <tbody>

                    @forelse($prints->where('confirmed', true) as $printed)
                        <tr>
                            <td>{{$printed->id}}</td>
                            <td>{{$printed->name_of_establishment}}</td>
                            <td>{{$printed->name_of_owner}}</td>
                            <td>{{$printed->contact_number}}</td>
                            <td>{{$printed->barangay}}</td>
                            <td>{{$printed->line_of_business}}</td>
                            <td>{{$printed->renewal_year }}</td>
                            <td>
                                <button class="btn btn-outline btn-green">
                                    <a href="{{ route('print', $printed->id) }}"><i class="fa-solid fa-print"></i></a> 
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No Business print records found.</td>
                        </tr>
                    @endforelse
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>