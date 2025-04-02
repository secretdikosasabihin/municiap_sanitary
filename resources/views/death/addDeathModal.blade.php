<!-- Death Certificate Modal -->
<div class="modal fade" id="newDeathModal" tabindex="-1" aria-labelledby="newDeathModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDeathModalLabel">New Death Certificate</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="deathCertificateForm" action="{{ route('death.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" name="first_name" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Middle Name</label>
                                <input type="text" name="middle_name" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="last_name" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Sex</label>
                                <select name="sex" class="form-select" style="border: 1px solid;" required>
                                    <option value="" disabled selected>Select Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Date of Death</label>
                                <input type="date" name="date_of_death" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Birthdate & Time</label>
                                <input type="datetime-local" name="birthdate" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Place of Death</label>
                                <input type="text" name="place_of_death" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Civil Status</label>
                                <select name="civil_status" class="form-select" required style="border: 1px solid;">
                                    <option value="" disabled selected>Select Civil Status</option>
                                    <option value="single">SINGLE</option>
                                    <option value="married">MARRIED</option>
                                    <option value="widow">WIDOW</option>
                                    <option value="widower">WIDOWER</option>
                                    <option value="annulled">ANNULLED</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Religion</label>
                                <input type="text" name="religion" class="form-control" style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Citizenship</label>
                                <select id="citizenshipSelect" class="form-select" style="border: 1px solid;">
                                    <option value="FILIPINO">FILIPINO</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="citizenship_other" id="citizenship_otherInput"
                                    class="form-control mt-2" placeholder="Enter citizenship"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="citizenship" id="citizenshipHidden" value="FILIPINO">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Residence</label>
                                <input type="text" name="residence" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Occupation</label>
                                <input type="text" name="occupation" class="form-control" style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Insurance</label>
                                <div class="dropdown">
                                    <button class="btn btn-outline-secondary dropdown-toggle w-100" type="button"
                                        name="remarks" data-bs-toggle="dropdown" aria-expanded="false"
                                        style="border: 1px solid;">
                                        Insurance Options
                                    </button>
                                    <ul class="dropdown-menu w-100" aria-labelledby="insuranceDropdown">
                                        <li>
                                            <label class="dropdown-item">
                                                <input type="checkbox" name="remarks" value="with insurance"> With
                                                Insurance
                                            </label>
                                        </li>
                                        <li>
                                            <label class="dropdown-item">
                                                <input type="checkbox" name="remarks" value="without insurance"> Without
                                                Insurance
                                            </label>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Father's Name</label>
                                <input type="text" name="name_of_father" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Mother's Name</label>
                                <input type="text" name="name_of_mother" class="form-control" required
                                    style="border: 1px solid;">
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
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Informant's Address</label>
                                <input type="text" name="informant_address" class="form-control" required
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Relationship</label>
                                <select id="relationshipSelect" class="form-select" style="border: 1px solid;">
                                    <option value="MOTHER">MOTHER</option>
                                    <option value="FATHER">FATHER</option>
                                    <option value="WIFE">WIFE</option>
                                    <option value="SPOUSE">SPOUSE</option>
                                    <option value="GRANDMOTHER">GRANDMOTHER</option>
                                    <option value="GRANDFATHER">GRANDFATHER</option>
                                    <option value="SON">SON</option>
                                    <option value="DAUGHTER">DAUGHTER</option>
                                    <option value="SIBLING">SIBLING</option>
                                    <option value="OTHERS">OTHERS</option>
                                </select>
                                <input type="text" name="relationship_other" id="relationship_otherInput"
                                    class="form-control mt-2" placeholder="Enter relationship"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="relationship" id="relationshipHidden"
                                    value="MOTHER">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cause of Death A</label>
                                <select id="cause_of_death_aSelect" class="form-select" style="border: 1px solid;">
                                    <option value="CARDIO-RESPIRATORY ARREST">CARDIO-RESPIRATORY ARREST</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="cause_of_death_a_other" id="cause_of_death_a_otherInput"
                                    class="form-control mt-2" placeholder="Enter cause of death A"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="cause_of_death_a" id="cause_of_death_aHidden"
                                    value="CARDIO-RESPIRATORY ARREST">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cause of Death B</label>
                                <input type="text" name="cause_of_death_b" class="form-control"
                                    style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Cause of Death C</label>
                                <input type="text" name="cause_of_death_c" class="form-control"
                                    style="border: 1px solid;">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- Doctor -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Doctor</label>
                                <select id="doctorSelect" class="form-select" style="border: 1px solid;" required>
                                    <option value="" disabled selected>Select a doctor</option>
                                    <option value="BENJAMIN Q. BENGCO III, M.D.">BENJAMIN Q. BENGCO III, M.D.</option>
                                    <option value="GLADYS LOURDES B. BENGCO, M.D.">GLADYS LOURDES B. BENGCO, M.D.
                                    </option>
                                    <option value="KRISTINE JOY MENDOZA-RIVERA, M.D.">KRISTINE JOY MENDOZA-RIVERA, M.D.
                                    </option>
                                    <option value="DOLORES C. CUNANAN, M.D.">DOLORES C. CUNANAN, M.D.</option>
                                    <option value="ORGIE I. FELICIANO, M.D.">ORGIE I. FELICIANO, M.D.</option>
                                    <option value="OTHERS">OTHERS</option>
                                </select>
                                <input type="text" name="doctor_other" id="doctor_otherInput" class="form-control mt-2"
                                    placeholder="Enter doctor's name" style="display: none; border: 1px solid;">
                                <input type="hidden" name="doctor" id="doctorHidden">
                            </div>
                        </div>

                        <!-- Doctor's Position -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Doctor's Position</label>
                                <select id="doctor_positionSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled selected>Select a position</option>
                                    <option value="Municipal Health Officer">Municipal Health Officer</option>
                                    <option value="Rural Health Physician">Rural Health Physician</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="doctor_position_other" id="doctor_position_otherInput"
                                    class="form-control mt-2" placeholder="Enter doctor's position"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="doctor_position" id="doctor_positionHidden">
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Address</label>
                                <select id="addressSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled selected>Select an address</option>
                                    <option value="San Nicolas Poblacion, Concepcion, Tarlac">San Nicolas Poblacion,
                                        Concepcion, Tarlac</option>
                                    <option value="Balutu, Concepcion, Tarlac">Balutu, Concepcion, Tarlac</option>
                                    <option value="Sta. Cruz, Concepcion, Tarlac">Sta. Cruz, Concepcion, Tarlac</option>
                                    <option value="Tinang, Concepcion, Tarlac">Tinang, Concepcion, Tarlac</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="address_other" id="address_otherInput"
                                    class="form-control mt-2" placeholder="Enter address"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="address" id="addressHidden">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Reviewed By</label>
                                <select id="reviewed_bySelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled selected>Select a doctor</option>
                                    <option value="BENJAMIN Q. BENGCO III, M.D.">BENJAMIN Q. BENGCO III, M.D.</option>
                                    <option value="GLADYS LOURDES B. BENGCO, M.D.">GLADYS LOURDES B. BENGCO, M.D.
                                    </option>
                                    <option value="KRISTINE JOY MENDOZA-RIVERA, M.D.">KRISTINE JOY MENDOZA-RIVERA, M.D.
                                    </option>
                                    <option value="DOLORES C. CUNANAN, M.D.">DOLORES C. CUNANAN, M.D.</option>
                                    <option value="ORGIE I. FELICIANO, M.D.">ORGIE I. FELICIANO, M.D.</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="reviewed_by" id="reviewed_by_otherInput"
                                    class="form-control mt-2" placeholder="Enter a doctor"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="reviewed_by" id="reviewed_byHidden">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Reviewed Position</label>
                                <select id="reviewed_positionSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled selected>Select a position</option>
                                    <option value="Municipal Health Officer">Municipal Health Officer</option>
                                    <option value="Rural Health Physician">Rural Health Physician</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="reviewed_position_other" id="reviewed_position_otherInput"
                                    class="form-control mt-2" placeholder="Enter a position"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="reviewed_position" id="reviewed_positionHidden">
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Prepared By Name</label>
                                <select id="prepared_by_nameSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled selected>Select a name</option>
                                    <option value="AARON JAY C. GONZALES">AARON JAY C. GONZALES</option>
                                    <option value="GERALD B. CASTRO">GERALD B. CASTRO</option>
                                    <option value="HEIDY D. PAREDE">HEIDY D. PAREDE</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="prepared_by_name_other" id="prepared_by_name_otherInput"
                                    class="form-control mt-2" placeholder="Enter a name"
                                    style="display: none; border: 1px solid;">
                                <input type="hidden" name="prepared_by_name" id="prepared_by_nameHidden">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Prepared By Position</label>
                                <select id="prepared_by_positionSelect" class="form-select" style="border: 1px solid;">
                                    <option value="" disabled selected>Select a position</option>
                                    <option value="SANITARY INSPECTOR">SANITARY INSPECTOR</option>
                                    <option value="ADMINISTRATIVE AIDE III">ADMINISTRATIVE AIDE III</option>
                                    <option value="OTHERS">Others</option>
                                </select>
                                <input type="text" name="prepared_by_position_other"
                                    id="prepared_by_position_otherInput" class="form-control mt-2"
                                    placeholder="Enter a position" style="display: none; border: 1px solid;">
                                <input type="hidden" name="prepared_by_position" id="prepared_by_positionHidden">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Date Today</label>
                                <input type="date" name="date" class="form-control" style="border: 1px solid;">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Municipality</label>
                                <input type="text" name="municipality" class="form-control" readonly value="CONCEPCION">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Province</label>
                                <input type="text" class="form-control" name="province" readonly value="TARLAC">
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
</div>

<script>
    function setupDynamicField(selectId, otherInputId, hiddenInputId, otherValue = 'OTHERS') {
        document.getElementById(selectId).addEventListener('change', function () {
            const otherInput = document.getElementById(otherInputId);
            const hiddenInput = document.getElementById(hiddenInputId);

            if (this.value === otherValue) {
                otherInput.style.display = 'block';  // Show the "OTHERS" input field
                hiddenInput.value = '';  // Clear the hidden input value
                otherInput.setAttribute('name', hiddenInputId.replace('Hidden', ''));  // Assign correct name
            } else {
                otherInput.style.display = 'none';  // Hide the "OTHERS" input field
                otherInput.removeAttribute('name');  // Prevent submission of empty field
                hiddenInput.value = this.value;  // Set the hidden input value
            }
        });

        document.getElementById(otherInputId).addEventListener('input', function () {
            document.getElementById(hiddenInputId).value = this.value;  // Update hidden input value
        });
    }

    // Setup all fields
    setupDynamicField('citizenshipSelect', 'citizenship_otherInput', 'citizenshipHidden');
    setupDynamicField('relationshipSelect', 'relationship_otherInput', 'relationshipHidden');
    setupDynamicField('cause_of_death_aSelect', 'cause_of_death_a_otherInput', 'cause_of_death_aHidden');
    setupDynamicField('doctorSelect', 'doctor_otherInput', 'doctorHidden');
    setupDynamicField('doctor_positionSelect', 'doctor_position_otherInput', 'doctor_positionHidden');
    setupDynamicField('addressSelect', 'address_otherInput', 'addressHidden');
    setupDynamicField('reviewed_bySelect', 'reviewed_by_otherInput', 'reviewed_byHidden');
    setupDynamicField('reviewed_positionSelect', 'reviewed_position_otherInput', 'reviewed_positionHidden');
    setupDynamicField('prepared_by_nameSelect', 'prepared_by_name_otherInput', 'prepared_by_nameHidden');
    setupDynamicField('prepared_by_positionSelect', 'prepared_by_position_otherInput', 'prepared_by_positionHidden');


</script>