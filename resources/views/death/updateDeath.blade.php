<div class="modal fade" id="updateModal{{ $death->id }}" tabindex="-1"
    aria-labelledby="updateModalLabel{{ $death->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg"> <!-- Add modal-lg to make the modal larger -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateModalLabel{{ $death->id }}">
                    Update Death Record</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('deaths.update', $death->id) }}" method="POST">
                    @csrf


                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" required
                                    style="border: 1px solid;" value="{{ old('first_name', $death->first_name) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" required
                                    style="border: 1px solid;" value="{{ old('middle_name', $death->middle_name) }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" required
                                    style="border: 1px solid;" value="{{ old('last_name', $death->last_name) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Sex</label>
                                <select name="sex" class="form-select" style="border: 1px solid;" required>
                                    <option value="Male" {{ old('sex', $death->sex) == 'Male' ? 'selected' : '' }}>Male
                                    </option>
                                    <option value="Female" {{ old('sex', $death->sex) == 'Female' ? 'selected' : '' }}>
                                        Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Date of Death</label>
                                <input type="date" name="date_of_death" class="form-control" required
                                    style="border: 1px solid;"
                                    value="{{ old('date_of_death', $death->date_of_death) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Birthdate & Time</label>
                                <input type="datetime-local" name="birthdate" class="form-control" required
                                    style="border: 1px solid;"
                                    value="{{ old('birthdate', $death->birthdate ? \Carbon\Carbon::parse($death->birthdate)->format('Y-m-d\TH:i') : '') }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Place of Death</label>
                                <input type="text" name="place_of_death" class="form-control" required
                                    style="border: 1px solid;"
                                    value="{{ old('place_of_death', $death->place_of_death) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Civil Status</label>
                                <select name="civil_status" class="form-select" required style="border: 1px solid;">
                                    <option value="Single" {{ old('civil_status', $death->civil_status) == 'Single' ? 'selected' : '' }}>Single</option>
                                    <option value="Married" {{ old('civil_status', $death->civil_status) == 'Married' ? 'selected' : '' }}>Married</option>
                                    <option value="Widow" {{ old('civil_status', $death->civil_status) == 'Widow' ? 'selected' : '' }}>Widow</option>
                                    <option value="Widower" {{ old('civil_status', $death->civil_status) == 'Widower' ? 'selected' : '' }}>Widower</option>
                                    <option value="Annulled" {{ old('civil_status', $death->civil_status) == 'Annulled' ? 'selected' : '' }}>Annulled</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Religion</label>
                                <input type="text" name="religion" class="form-control" style="border: 1px solid;"
                                    value="{{ old('religion', $death->religion) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <!-- <div class="mb-3">
                                <label class="form-label">Citizenship</label>
                                <select id="updateCitizenshipSelect" class="form-select" style="border: 1px solid;">
                                    <option value="FILIPINO" {{ old('citizenship', $death->citizenship) == 'FILIPINO' ? 'selected' : '' }}>
                                        FILIPINO
                                    </option>
                                    <option value="OTHERS" {{ old('citizenship', $death->citizenship) == 'OTHERS' ? 'selected' : '' }}>
                                        Others
                                    </option>
                                </select>
                                <input type="text" name="updateCitizenship_other" id="updateCitizenship_otherInput"
                                    class="form-control mt-2" placeholder="Enter citizenship"
                                    style="display: none; border: 1px solid;"
                                    value="{{ old('updateCitizenship_other', $death->citizenship != 'FILIPINO' && $death->citizenship != '' ? $death->citizenship : '') }}">
                                <input type="hidden" name="citizenship" id="updateCitizenshipHidden"
                                    value="{{ old('citizenship', $death->citizenship) }}">
                            </div> -->
                            <div class="mb-3">
                                <label class="form-label">Citizenship</label>
                                <select id="updateCitizenshipSelect" class="form-select" style="border: 1px solid;">
                                    <option value="FILIPINO" {{ old('citizenship', $death->citizenship) == 'FILIPINO' ? 'selected' : '' }}>
                                        FILIPINO
                                    </option>
                                    <option value="OTHERS" {{ old('citizenship', $death->citizenship) == 'OTHERS' ? 'selected' : '' }}>
                                        Others
                                    </option>
                                </select>
                                <input type="text" name="updateCitizenship_other" id="updateCitizenship_otherInput"
                                    class="form-control mt-2" placeholder="Enter citizenship"
                                    style="display: none; border: 1px solid;"
                                    value="{{ old('updateCitizenship_other', $death->citizenship != 'FILIPINO' && $death->citizenship != '' ? $death->citizenship : '') }}">
                                <input type="hidden" name="citizenship" id="updateCitizenshipHidden"
                                    value="{{ old('citizenship', $death->citizenship) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Residence</label>
                                <input type="text" name="residence" class="form-control" required
                                    style="border: 1px solid;" value="{{ old('residence', $death->residence) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Occupation</label>
                                <input type="text" name="occupation" class="form-control" style="border: 1px solid;"
                                    value="{{ old('occupation', $death->occupation) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Insurance</label>
                                <select class="form-select" name="remarks" style="border: 1px solid;">
                                    <option value="with insurance" {{ old('remarks', $death->remarks) == 'with insurance' ? 'selected' : '' }}>WITH INSURANCE</option>
                                    <option value="without insurance" {{ old('remarks', $death->remarks) == 'without insurance' ? 'selected' : '' }}>WITHOUT INSURANCE</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Father's Name</label>
                                <input type="text" name="name_of_father" class="form-control" required
                                    style="border: 1px solid;"
                                    value="{{ old('name_of_father', $death->name_of_father) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Mother's Name</label>
                                <input type="text" name="name_of_mother" class="form-control" required
                                    style="border: 1px solid;"
                                    value="{{ old('name_of_mother', $death->name_of_mother) }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Informant's Name</label>
                                <input type="text" name="informant_name" class="form-control" required
                                    style="border: 1px solid;"
                                    value="{{ old('informant_name', $death->informant_name) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Informant's Address</label>
                                <input type="text" name="informant_address" class="form-control" required
                                    style="border: 1px solid;"
                                    value="{{ old('informant_address', $death->informant_address) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Relationship to the Deceased</label>
                                <select id="updateRelationshipSelect" class="form-select" style="border: 1px solid;">
                                    <option value="MOTHER" {{ old('relationship', $death->relationship) == 'MOTHER' ? 'selected' : '' }}>MOTHER</option>
                                    <option value="FATHER" {{ old('relationship', $death->relationship) == 'FATHER' ? 'selected' : '' }}>FATHER</option>
                                    <option value="SPOUSE" {{ old('relationship', $death->relationship) == 'SPOUSE' ? 'selected' : '' }}>SPOUSE</option>
                                    <option value="GRANDMOTHER" {{ old('relationship', $death->relationship) == 'GRANDMOTHER' ? 'selected' : '' }}>GRANDMOTHER</option>
                                    <option value="GRANDFATHER" {{ old('relationship', $death->relationship) == 'GRANDFATHER' ? 'selected' : '' }}>GRANDFATHER</option>
                                    <option value="SON" {{ old('relationship', $death->relationship) == 'SON' ? 'selected' : '' }}>SON</option>
                                    <option value="DAUGHTER" {{ old('relationship', $death->relationship) == 'DAUGHTER' ? 'selected' : '' }}>DAUGHTER</option>
                                    <option value="SIBLING" {{ old('relationship', $death->relationship) == 'SIBLING' ? 'selected' : '' }}>SIBLING</option>
                                    <option value="OTHERS" {{ old('relationship', $death->relationship) == 'OTHERS' ? 'selected' : '' }}>OTHERS</option>
                                </select>
                                <input type="text" name="update_relationship_other" id="updateRelationship_otherInput"
                                    class="form-control mt-2" placeholder="Enter Relationship"
                                    style="display: none; border: 1px solid;"
                                    value="{{ old('update_relationship_other', !in_array($death->relationship, ['MOTHER', 'FATHER', 'SPOUSE', 'GRANDMOTHER', 'GRANDFATHER', 'SON', 'DAUGHTER', 'SIBLING']) ? $death->relationship : '') }}">
                                <input type="hidden" name="relationship" id="updateRelationshipHidden"
                                    value="{{ old('relationship', $death->relationship) }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cause of Death A</label>
                                <select id="update_cause_of_death_aSelect" class="form-select"
                                    style="border: 1px solid;">
                                    <option value="CARDIO-RESPIRATORY ARREST" {{ old('cause_of_death_a', $death->cause_of_death_a) == 'CARDIO-RESPIRATORY ARREST' ? 'selected' : '' }}>
                                        CARDIO-RESPIRATORY ARREST</option>
                                    <option value="OTHERS" {{ old('cause_of_death_a', $death->cause_of_death_a) == '' ? 'selected' : '' }}>Others</option>
                                </select>
                                <input type="text" name="update_cause_of_death_a_other"
                                    id="update_cause_of_death_a_otherInput" class="form-control mt-2"
                                    placeholder="Enter cause of death A" style="display: none; border: 1px solid;"
                                    value="{{ old('update_cause_of_death_a_other', $death->cause_of_death_a != 'CARDIO-RESPIRATORY ARREST' ? $death->cause_of_death_a : '') }}">
                                <input type="hidden" name="cause_of_death_a" id="update_cause_of_death_aHidden"
                                    value="{{ old('cause_of_death_a', $death->cause_of_death_a) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cause of Death B</label>
                                <input type="text" name="cause_of_death_b" class="form-control"
                                    style="border: 1px solid;"
                                    value="{{ old('cause_of_death_b', $death->cause_of_death_b) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cause of Death C</label>
                                <input type="text" name="cause_of_death_c" class="form-control"
                                    style="border: 1px solid;"
                                    value="{{ old('cause_of_death_c', $death->cause_of_death_c) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cause of Death D</label>
                                <input type="text" name="cause_of_death_d" class="form-control"
                                    style="border: 1px solid;"
                                    value="{{ old('cause_of_death_d', $death->cause_of_death_d) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <!-- Doctor -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Doctor</label>
                                <select id="updateDoctorSelect" class="form-select" style="border: 1px solid;">
                                    <option value="BENJAMIN Q. BENGCO III, M.D." {{ old('doctor', $death->doctor) == 'BENJAMIN Q. BENGCO III, M.D.' ? 'selected' : '' }}>BENJAMIN Q.
                                        BENGCO III, M.D.</option>
                                    <option value="GLADYS LOURDES B. BENGCO, M.D." {{ old('doctor', $death->doctor) == 'GLADYS LOURDES B. BENGCO, M.D.' ? 'selected' : '' }}>GLADYS
                                        LOURDES B. BENGCO, M.D.</option>
                                    <option value="KRISTINE JOY MENDOZA-RIVERA, M.D." {{ old('doctor', $death->doctor) == 'KRISTINE JOY MENDOZA-RIVERA, M.D.' ? 'selected' : '' }}>
                                        KRISTINE JOY MENDOZA-RIVERA, M.D.</option>
                                    <option value="DOLORES C. CUNANAN, M.D." {{ old('doctor', $death->doctor) == 'DOLORES C. CUNANAN, M.D.' ? 'selected' : '' }}>DOLORES C. CUNANAN, M.D.</option>
                                    <option value="ORGIE I. FELICIANO, M.D." {{ old('doctor', $death->doctor) == 'ORGIE I. FELICIANO, M.D.' ? 'selected' : '' }}>ORGIE I. FELICIANO, M.D.</option>
                                    <option value="OTHERS" {{ !in_array(old('doctor', $death->doctor), ['BENJAMIN Q. BENGCO III, M.D.', 'GLADYS LOURDES B. BENGCO, M.D.', 'KRISTINE JOY MENDOZA-RIVERA, M.D.', 'DOLORES C. CUNANAN, M.D.', 'ORGIE I. FELICIANO, M.D.']) ? 'selected' : '' }}>OTHERS</option>
                                </select>
                                <input type="text" name="updateDoctor_other" id="updateDoctor_otherInput"
                                    class="form-control mt-2" placeholder="Enter doctor's name"
                                    style="display: {{ !in_array(old('doctor', $death->doctor), ['BENJAMIN Q. BENGCO III, M.D.', 'GLADYS LOURDES B. BENGCO, M.D.', 'KRISTINE JOY MENDOZA-RIVERA, M.D.', 'DOLORES C. CUNANAN, M.D.', 'ORGIE I. FELICIANO, M.D.']) ? 'block' : 'none' }}; border: 1px solid;"
                                    value="{{ old('doctor', $death->doctor) }}">
                                <input type="hidden" name="doctor" id="updateDoctorHidden"
                                    value="{{ old('doctor', $death->doctor) }}">
                            </div>
                        </div>

                        <!-- Doctor's Position -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Doctor's Position</label>
                                <select id="updateDoctorPositionSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled>Select a position</option>
                                    <option value="Municipal Health Officer" {{ old('doctor_position', $death->doctor_position) == 'Municipal Health Officer' ? 'selected' : '' }}>
                                        Municipal Health Officer</option>
                                    <option value="Rural Health Physician" {{ old('doctor_position', $death->doctor_position) == 'Rural Health Physician' ? 'selected' : '' }}>Rural
                                        Health Physician</option>
                                    <option value="OTHERS" {{ !in_array(old('doctor_position', $death->doctor_position), ['Municipal Health Officer', 'Rural Health Physician']) ? 'selected' : '' }}>
                                        OTHERS</option>
                                </select>
                                <input type="text" name="updateDoctorPosition_other"
                                    id="updateDoctorPosition_otherInput" class="form-control mt-2"
                                    placeholder="Enter doctor's position"
                                    style="display: {{ !in_array(old('doctor_position', $death->doctor_position), ['Municipal Health Officer', 'Rural Health Physician']) ? 'block' : 'none' }}; border: 1px solid;"
                                    value="{{ old('doctor_position', $death->doctor_position) }}">
                                <input type="hidden" name="doctor_position" id="updateDoctorPositionHidden"
                                    value="{{ old('doctor_position', $death->doctor_position) }}">
                            </div>
                        </div>


                        <!-- Address -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <select id="updateAddressSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled>Select an address</option>
                                    <option value="San Nicolas Poblacion, Concepcion, Tarlac" {{ old('address', $death->address) == 'San Nicolas Poblacion, Concepcion, Tarlac' ? 'selected' : '' }}>San Nicolas Poblacion, Concepcion, Tarlac</option>
                                    <option value="Balutu, Concepcion, Tarlac" {{ old('address', $death->address) == 'Balutu, Concepcion, Tarlac' ? 'selected' : '' }}>Balutu,
                                        Concepcion, Tarlac</option>
                                    <option value="Sta. Cruz, Concepcion, Tarlac" {{ old('address', $death->address) == 'Sta. Cruz, Concepcion, Tarlac' ? 'selected' : '' }}>Sta.
                                        Cruz, Concepcion, Tarlac</option>
                                    <option value="Tinang, Concepcion, Tarlac" {{ old('address', $death->address) == 'Tinang, Concepcion, Tarlac' ? 'selected' : '' }}>Tinang,
                                        Concepcion, Tarlac</option>
                                    <option value="OTHERS" {{ !in_array(old('address', $death->address), ['San Nicolas Poblacion, Concepcion, Tarlac', 'Balutu, Concepcion, Tarlac', 'Sta. Cruz, Concepcion, Tarlac', 'Tinang, Concepcion, Tarlac']) ? 'selected' : '' }}>OTHERS
                                    </option>
                                </select>
                                <input type="text" name="updateAddress_other" id="updateAddress_otherInput"
                                    class="form-control mt-2" placeholder="Enter address"
                                    style="display: {{ !in_array(old('address', $death->address), ['San Nicolas Poblacion, Concepcion, Tarlac', 'Balutu, Concepcion, Tarlac', 'Sta. Cruz, Concepcion, Tarlac', 'Tinang, Concepcion, Tarlac']) ? 'block' : 'none' }}; border: 1px solid;"
                                    value="{{ old('address', $death->address) }}">
                                <input type="hidden" name="address" id="updateAddressHidden"
                                    value="{{ old('address', $death->address) }}">
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Reviewed By</label>
                                <select id="updateReviewedBySelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled>Select a doctor</option>
                                    <option value="BENJAMIN Q. BENGCO III, M.D." {{ old('reviewed_by', $death->reviewed_by) == 'BENJAMIN Q. BENGCO III, M.D.' ? 'selected' : '' }}>
                                        BENJAMIN Q. BENGCO III, M.D.</option>
                                    <option value="GLADYS LOURDES B. BENGCO, M.D." {{ old('reviewed_by', $death->reviewed_by) == 'GLADYS LOURDES B. BENGCO, M.D.' ? 'selected' : '' }}>
                                        GLADYS LOURDES B. BENGCO, M.D.</option>
                                    <option value="KRISTINE JOY MENDOZA-RIVERA, M.D." {{ old('reviewed_by', $death->reviewed_by) == 'KRISTINE JOY MENDOZA-RIVERA, M.D.' ? 'selected' : '' }}>
                                        KRISTINE JOY MENDOZA-RIVERA, M.D.</option>
                                    <option value="DOLORES C. CUNANAN, M.D." {{ old('reviewed_by', $death->reviewed_by) == 'DOLORES C. CUNANAN, M.D.' ? 'selected' : '' }}>DOLORES C.
                                        CUNANAN, M.D.</option>
                                    <option value="ORGIE I. FELICIANO, M.D." {{ old('reviewed_by', $death->reviewed_by) == 'ORGIE I. FELICIANO, M.D.' ? 'selected' : '' }}>ORGIE I.
                                        FELICIANO, M.D.</option>
                                    <option value="OTHERS" {{ !in_array(old('reviewed_by', $death->reviewed_by), ['BENJAMIN Q. BENGCO III, M.D.', 'GLADYS LOURDES B. BENGCO, M.D.', 'KRISTINE JOY MENDOZA-RIVERA, M.D.', 'DOLORES C. CUNANAN, M.D.', 'ORGIE I. FELICIANO, M.D.']) ? 'selected' : '' }}>Others</option>
                                </select>
                                <input type="text" name="reviewed_by_other" id="updateReviewedBy_otherInput"
                                    class="form-control mt-2" placeholder="Enter doctor's name"
                                    style="display: {{ !in_array(old('reviewed_by', $death->reviewed_by), ['BENJAMIN Q. BENGCO III, M.D.', 'GLADYS LOURDES B. BENGCO, M.D.', 'KRISTINE JOY MENDOZA-RIVERA, M.D.', 'DOLORES C. CUNANAN, M.D.', 'ORGIE I. FELICIANO, M.D.']) ? 'block' : 'none' }}; border: 1px solid;"
                                    value="{{ old('reviewed_by', $death->reviewed_by) }}">
                                <input type="hidden" name="reviewed_by" id="updateReviewedByHidden"
                                    value="{{ old('reviewed_by', $death->reviewed_by) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Reviewed Position</label>
                                <select id="updateReviewedPositionSelect" class="form-select"
                                    style="border: 1px solid;">
                                    <option value="" disabled>Select a position</option>
                                    <option value="Municipal Health Officer" {{ old('reviewed_position', $death->reviewed_position) == 'Municipal Health Officer' ? 'selected' : '' }}>
                                        Municipal Health Officer</option>
                                    <option value="Rural Health Physician" {{ old('reviewed_position', $death->reviewed_position) == 'Rural Health Physician' ? 'selected' : '' }}>Rural
                                        Health Physician</option>
                                    <option value="OTHERS" {{ !in_array(old('reviewed_position', $death->reviewed_position), ['Municipal Health Officer', 'Rural Health Physician']) ? 'selected' : '' }}>Others</option>
                                </select>
                                <input type="text" name="updateReviewedPosition_other"
                                    id="updateReviewedPosition_otherInput" class="form-control mt-2"
                                    placeholder="Enter a position"
                                    style="display: {{ !in_array(old('reviewed_position', $death->reviewed_position), ['Municipal Health Officer', 'Rural Health Physician']) ? 'block' : 'none' }}; border: 1px solid;"
                                    value="{{ old('reviewed_position', $death->reviewed_position) }}">
                                <input type="hidden" name="reviewed_position" id="updateReviewedPositionHidden"
                                    value="{{ old('reviewed_position', $death->reviewed_position) }}">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Prepared By Name</label>
                                <select id="updatePreparedByNameSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled>Select a name</option>
                                    <option value="AARON JAY C. GONZALES" {{ old('prepared_by_name', $death->prepared_by_name) == 'AARON JAY C. GONZALES' ? 'selected' : '' }}>AARON
                                        JAY C. GONZALES</option>
                                    <option value="GERALD B. CASTRO" {{ old('prepared_by_name', $death->prepared_by_name) == 'GERALD B. CASTRO' ? 'selected' : '' }}>GERALD B.
                                        CASTRO</option>
                                    <option value="HEIDY D. PADERE" {{ old('prepared_by_name', $death->prepared_by_name) == 'HEIDY D. PADERE' ? 'selected' : '' }}>HEIDY D.
                                    PADERE</option>
                                    <option value="OTHERS" {{ !in_array(old('prepared_by_name', $death->prepared_by_name), ['AARON JAY C. GONZALES', 'GERALD B. CASTRO', 'HEIDY D. PAREDE']) ? 'selected' : '' }}>Others</option>
                                </select>
                                <input type="text" name="updatePreparedByName_other"
                                    id="updatePreparedByName_otherInput" class="form-control mt-2"
                                    placeholder="Enter a name"
                                    style="display: {{ !in_array(old('prepared_by_name', $death->prepared_by_name), ['AARON JAY C. GONZALES', 'GERALD B. CASTRO', 'HEIDY D. PAREDE']) ? 'block' : 'none' }}; border: 1px solid;"
                                    value="{{ old('prepared_by_name', $death->prepared_by_name) }}">
                                <input type="hidden" name="prepared_by_name" id="updatePreparedByNameHidden"
                                    value="{{ old('prepared_by_name', $death->prepared_by_name) }}">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Prepared By Position</label>
                                <select id="updatePreparedByPositionSelect" class="form-select"
                                    style="border: 1px solid;">
                                    <option value="" disabled>Select a position</option>
                                    <option value="SANITARY INSPECTOR" {{ old('prepared_by_position', $death->prepared_by_position) == 'SANITARY INSPECTOR' ? 'selected' : '' }}>
                                        SANITARY INSPECTOR</option>
                                    <option value="ADMINISTRATIVE AIDE III" {{ old('prepared_by_position', $death->prepared_by_position) == 'ADMINISTRATIVE AIDE III' ? 'selected' : '' }}>
                                        ADMINISTRATIVE AIDE III</option>
                                    <option value="OTHERS" {{ !in_array(old('prepared_by_position', $death->prepared_by_position), ['SANITARY INSPECTOR', 'ADMINISTRATIVE AIDE III']) ? 'selected' : '' }}>Others</option>
                                </select>
                                <input type="text" name="updatePreparedByPosition_other"
                                    id="updatePreparedByPosition_otherInput" class="form-control mt-2"
                                    placeholder="Enter a position"
                                    style="display: {{ !in_array(old('prepared_by_position', $death->prepared_by_position), ['SANITARY INSPECTOR', 'ADMINISTRATIVE AIDE III']) ? 'block' : 'none' }}; border: 1px solid;"
                                    value="{{ old('prepared_by_position', $death->prepared_by_position) }}">
                                <input type="hidden" name="prepared_by_position" id="updatePreparedByPositionHidden"
                                    value="{{ old('prepared_by_position', $death->prepared_by_position) }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Date Today</label>
                                <input type="date" name="updateDate" class="form-control" style="border: 1px solid;"
                                    value="{{ old('date', $death->date ?? now()->format('Y-m-d')) }}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- citizenship -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupCitizenshipHandler() {
            const selectElement = document.getElementById("updateCitizenshipSelect");
            const otherInput = document.getElementById("updateCitizenship_otherInput");
            const hiddenInput = document.getElementById("updateCitizenshipHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update cause of death elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was custom or null
            if (hiddenInput.value === "OTHERS" || hiddenInput.value === "" || hiddenInput.value === null) {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value || ''; // Maintain the previous input if it was null
            } else {
                selectElement.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupCitizenshipHandler();
    });
</script>
<!-- <script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateCauseOfDeathHandler() {
            const selectElement = document.getElementById("updateCitizenshipSelect");
            const otherInput = document.getElementById("updateCitizenship_otherInput");
            const hiddenInput = document.getElementById("updateCitizenshipHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update cause of death elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was custom
            if (hiddenInput.value !== "FILIPINO" && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateCauseOfDeathHandler();
    });
</script> -->

<!-- relationship -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateRelationshipHandler() {
            const selectElement = document.getElementById("updateRelationshipSelect");
            const otherInput = document.getElementById("updateRelationship_otherInput");
            const hiddenInput = document.getElementById("updateRelationshipHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update relationship elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was custom
            if (!["MOTHER", "FATHER", "GRANDMOTHER", "GRANDFATHER", "SON", "DAUGHTER", "SIBLING", "SPOUSE", "WIFE"].includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateRelationshipHandler();
    });
</script>

<!-- cause of death a -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateCauseOfDeathHandler() {
            const selectElement = document.getElementById("update_cause_of_death_aSelect");
            const otherInput = document.getElementById("update_cause_of_death_a_otherInput");
            const hiddenInput = document.getElementById("update_cause_of_death_aHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update cause of death elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was custom
            if (hiddenInput.value !== "CARDIO-RESPIRATORY ARREST" && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateCauseOfDeathHandler();
    });
</script>

<!-- doctors -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateDoctorHandler() {
            const selectElement = document.getElementById("updateDoctorSelect");
            const otherInput = document.getElementById("updateDoctor_otherInput");
            const hiddenInput = document.getElementById("updateDoctorHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update doctor elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was a custom doctor
            const predefinedDoctors = [
                "BENJAMIN Q. BENGCO III, M.D.",
                "GLADYS LOURDES B. BENGCO, M.D.",
                "KRISTINE JOY MENDOZA-RIVERA, M.D.",
                "DOLORES C. CUNANAN, M.D.",
                "ORGIE I. FELICIANO, M.D."
            ];

            if (!predefinedDoctors.includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateDoctorHandler();
    });
</script>

<!-- Doctor's Position -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateDoctorPositionHandler() {
            const selectElement = document.getElementById("updateDoctorPositionSelect");
            const otherInput = document.getElementById("updateDoctorPosition_otherInput");
            const hiddenInput = document.getElementById("updateDoctorPositionHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update doctor position elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was a custom position
            const predefinedPositions = ["Municipal Health Officer", "Rural Health Physician"];

            if (!predefinedPositions.includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateDoctorPositionHandler();
    });
</script>

<!-- Reviewed By Name -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateReviewedByHandler() {
            const selectElement = document.getElementById("updateReviewedBySelect");
            const otherInput = document.getElementById("updateReviewedBy_otherInput");
            const hiddenInput = document.getElementById("updateReviewedByHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update reviewed by elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was a custom name
            const predefinedDoctors = [
                "BENJAMIN Q. BENGCO III, M.D.",
                "GLADYS LOURDES B. BENGCO, M.D.",
                "KRISTINE JOY MENDOZA-RIVERA, M.D.",
                "DOLORES C. CUNANAN, M.D.",
                "ORGIE I. FELICIANO, M.D."
            ];

            if (!predefinedDoctors.includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateReviewedByHandler();
    });
</script>

<!-- Address -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateAddressHandler() {
            const selectElement = document.getElementById("updateAddressSelect");
            const otherInput = document.getElementById("updateAddress_otherInput");
            const hiddenInput = document.getElementById("updateAddressHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update address elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was a custom address
            const predefinedAddresses = [
                "San Nicolas Poblacion, Concepcion, Tarlac",
                "Balutu, Concepcion, Tarlac",
                "Sta. Cruz, Concepcion, Tarlac",
                "Tinang, Concepcion, Tarlac"
            ];

            if (!predefinedAddresses.includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateAddressHandler();
    });
</script>

<!-- Reviewed By Position -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdateReviewedPositionHandler() {
            const selectElement = document.getElementById("updateReviewedPositionSelect");
            const otherInput = document.getElementById("updateReviewedPosition_otherInput");
            const hiddenInput = document.getElementById("updateReviewedPositionHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update reviewed position elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was a custom position
            const predefinedPositions = [
                "Municipal Health Officer",
                "Rural Health Physician"
            ];

            if (!predefinedPositions.includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdateReviewedPositionHandler();
    });
</script>

<!-- Prepared By Name -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdatePreparedByNameHandler() {
            const selectElement = document.getElementById("updatePreparedByNameSelect");
            const otherInput = document.getElementById("updatePreparedByName_otherInput");
            const hiddenInput = document.getElementById("updatePreparedByNameHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update prepared by name elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was a custom name
            const predefinedNames = [
                "AARON JAY C. GONZALES",
                "GERALD B. CASTRO",
                "HEIDY D. PAREDE"
            ];

            if (!predefinedNames.includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdatePreparedByNameHandler();
    });
</script>

<!-- Prepared By Position -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        function setupUpdatePreparedByPositionHandler() {
            const selectElement = document.getElementById("updatePreparedByPositionSelect");
            const otherInput = document.getElementById("updatePreparedByPosition_otherInput");
            const hiddenInput = document.getElementById("updatePreparedByPositionHidden");

            if (!selectElement || !otherInput || !hiddenInput) {
                console.error("Update prepared by position elements missing!");
                return;
            }

            function toggleOtherInput() {
                if (selectElement.value === "OTHERS") {
                    otherInput.style.display = "block";
                    hiddenInput.value = otherInput.value || "OTHERS";
                } else {
                    otherInput.style.display = "none";
                    otherInput.value = "";
                    hiddenInput.value = selectElement.value;
                }
            }

            // ✅ Auto-display input if the previous value was a custom position
            const predefinedPositions = [
                "SANITARY INSPECTOR",
                "ADMINISTRATIVE AIDE III"
            ];

            if (!predefinedPositions.includes(hiddenInput.value) && hiddenInput.value !== "") {
                selectElement.value = "OTHERS";
                otherInput.style.display = "block";
                otherInput.value = hiddenInput.value;
            }

            toggleOtherInput(); // Run on load
            selectElement.addEventListener("change", toggleOtherInput);
            otherInput.addEventListener("input", () => hiddenInput.value = otherInput.value);
        }

        // Setup for Update Form only
        setupUpdatePreparedByPositionHandler();
    });
</script>