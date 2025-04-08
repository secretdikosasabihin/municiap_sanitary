<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Death Records</title>
    <style>
        * {
            margin: 0;
            padding-bottom: 4px;
            box-sizing: border-box;
        }

        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 12px;
            font-weight: bold;
            margin: 0;
            padding: 0;
            text-transform: uppercase;
        }

        .record {
            page-break-after: always;
        }

        .province {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 111px;
            left: 160px;
        }

        .municipal {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 131px;
            left: 200px;
        }

        .fname {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 183px;
            left: 160px;
        }

        .mname {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 183px;
            left: 310px;
        }

        .lname {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 183px;
            left: 450px;
        }

        .sex {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 182px;
            right: 115px;
        }

        .ddate {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 237px;
            left: 110px;
        }

        .bdate {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 237px;
            left: 300px;
        }

        .years {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 243px;
            left: 512px;
        }

        .months {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            top: 243px;
            left: 610px;
        }

        .days {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            top: 243px;
            left: 665px;
        }

        .dplace {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 283px;
            left: 110px;
        }

        .status {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 287px;
            right: 110px;
        }

        .religion {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 330px;
            left: 95px;
        }

        .citizenship {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 330px;
            left: 310px;
        }

        .residence {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: start;
            height: 20px;
            /* border: 1px solid red; */
            top: 330px;
            left: 450px;
        }

        .occupation {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 373px;
            left: 95px;
        }

        .father {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 373px;
            left: 300px;
        }

        .mother {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 373px;
            left: 542px;
        }

        .codA {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 440px;
            left: 255px;
        }

        .codB {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 461px;
            left: 255px;
        }

        .codC {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 483px;
            left: 255px;
        }

        .codD {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 498px;
            left: 370px;
        }

        .att1 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 643px;
            left: 361px;
        }

        .att2 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 696px;
            left: 92px;
        }

        .doctor {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 735px;
            left: 170px;
        }

        .doc_pos {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 752px;
            left: 200px;
        }

        .doc_add {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 770px;
            left: 150px;
        }

        .date0 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 786px;
            left: 350px;
        }

        .rev {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 738px;
            right: 90px;
        }

        .date1 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 775px;
            right: 150px;
        }

        .infor {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 952px;
            left: 170px;
        }

        .rel {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 975px;
            left: 250px;
        }

        .infor_add {
            position: absolute;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 995px;
            left: 150px;
        }

        .date2 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 1015px;
            left: 170px;
        }

        .prep {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20px;
            /* border: 1px solid red; */
            top: 955px;
            right: 170px;
        }

        .prep_pos {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 20px;
            /* border: 1px solid red; */
            top: 979px;
            right: 155px;
        }

        .date3 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 1000px;
            right: 180px;
        }

        .ins {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid     red; */
            top: 1170px;
            left: 200px;
        }
    </style>
</head>

<body>
    @foreach ($deaths as $death)
            <div class="record">
                <p class="province">{{ $death->province }}</p>
                <p class="municipal">{{ $death->municipality }}</p>
                <p class="fname">{{ $death->first_name }}</p>
                <p class="mname">{{ $death->middle_name}}</p>
                <p class="lname">{{ $death->last_name }}</p>
                <p class="sex">{{ $death->sex }}</p>
                <p class="ddate">{{ \Carbon\Carbon::parse($death->date_of_death)->format('d F Y') }}</p>
                <p class="bdate">{{ \Carbon\Carbon::parse($death->birthdate)->format('d F Y') }}</p>

                @php
                    // Ensure both birthdate and date_of_death exist before processing
                    if (!empty($death->birthdate) && !empty($death->date_of_death)) {
                        $birthDate = \Carbon\Carbon::parse($death->birthdate);
                        $deathDate = \Carbon\Carbon::parse($death->date_of_death);

                        // Get precise age
                        $diff = $birthDate->diff($deathDate);

                        $ageYears = $diff->y;   // Years
                        $ageMonths = $diff->m;  // Months
                        $ageDays = $diff->d;    // Days
                    }
                @endphp

                @if (!empty($death->birthdate) && !empty($death->date_of_death))
                    @if ($ageYears > 0)
                        <p class="years">{{ $ageYears }}{{ $ageYears > 1 ? '' : '' }}</p>
                    @elseif ($ageMonths > 0)
                        <p class="months">{{ $ageMonths }}{{ $ageMonths > 1 ? '' : '' }}</p>
                    @else
                        <p class="days">{{ $ageDays }}{{ $ageDays > 1 ? '' : '' }}</p>
                    @endif
                @endif

                <p class="dplace">{{ $death->place_of_death }}</p>
                <p class="status">{{ $death->civil_status }}</p>
                <p class="religion">{{ $death->religion }}</p>
                <p class="citizenship">{{ $death->citizenship }}</p>
                <p class="residence">{{ $death->residence }}</p>
                <p class="occupation">{{ $death->occupation }}</p>
                <p class="father">{{ $death->name_of_father }}</p>
                <p class="mother">{{ $death->name_of_mother }}</p>
                <p class="codA">{{ $death->cause_of_death_a }}</p>
                <p class="codB">{{ $death->cause_of_death_b }}</p>
                <p class="codC">{{ $death->cause_of_death_c }}</p>
                <p class="codD">{{ $death->cause_of_death_d }}</p>
                <p class="att1">X</p>
                <p class="att2">X</p>
                <p class="doctor">{{ $death->doctor }}</p>
                <p class="doc_pos">{{ $death->doctor_position }}</p>
                <p class="doc_add">{{ $death->address }}</p>
                <p class="date0">{{ \Carbon\Carbon::parse($death->date)->format('F d, Y') }}</p>
                <p class="rev">{{ $death->reviewed_by}}</p>
                <p class="date1">{{ \Carbon\Carbon::parse($death->date)->format('F d, Y') }}</p>
                <p class="infor">{{ $death->informant_name }}</p>
                <p class="rel">{{ $death->relationship}}</p>
                <p class="infor_add">{{ $death->informant_address }}</p>
                <p class="date2">{{ \Carbon\Carbon::parse($death->date)->format('F d, Y') }}</p>
                <p class="prep">{{ $death->prepared_by_name }}</p>
                <p class="prep_pos">{{ $death->prepared_by_position }}</p>
                <p class="date3">{{ \Carbon\Carbon::parse($death->date)->format('F d, Y') }}</p>
                <p class="ins">{{ $death->remarks }}</p>
            </div>
    @endforeach
</body>

</html>