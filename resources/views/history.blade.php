<!-- Ceertificate Tab Content -->
<div class="tab-content" id="history-tab">
    <div class="card">
        <div class="table-container">
            <table class="data-table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Establishment Name</th>
                        <th>Owner Name</th>
                        <th>Contact Number</th>
                        <th>Barangay</th>
                        <th>Business Type</th>
                        <th>Renewal Year</th>
                       
                        <th>Status</th>
                        <th>Updated At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sanitaryRecords as $record)
                        <tr>
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->name_of_establishment }}</td>
                            <td>{{ $record->name_of_owner }}</td>
                            <td>{{ $record->contact_number }}</td>
                            <td>{{ $record->barangay }}</td>
                            <td>{{ $record->line_of_business }}</td>
                            <td>{{ $record->renewal_year }}</td>
                          
                            <!-- Show the latest status -->
                            <td>
                                @if($record->latestStatus)
                                    {{ ucfirst($record->latestStatus->status) }}
                                @else
                                    {{ ucfirst($record->status) }}
                                @endif
                            </td>

                            <!-- Show the latest status change date -->
                            <td>
                                @if($record->latestStatus)
                                    {{ $record->latestStatus->changed_at->format('Y-m-d H:i:s') }}
                                @else
                                    {{ $record->renewed_at->format('Y-m-d H:i:s') }}
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        </div>
    </div>
</div>