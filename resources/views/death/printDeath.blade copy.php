<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Death Records</title>
    <style>
        * {
            margin: 0;
            padding-bottom: 2px;
            box-sizing: border-box;
        }

        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
            font-size: 12px;
            font-weight: bold;
            /* color: red; */
            margin: 0;
            padding: 0;
            text-transform: uppercase;
            position: absolute;
        }

        .record {
            page-break-after: always;
        }

        .province {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 110px;
            left: 60px;
        }

        .municipal {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 111px;
            left: 140px;
        }

        .fname {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 145px;
            left: 170px;
        }

        .mname {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 125px;
            left: 310px;
        }

        .lname {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 105px;
            left: 455px;
        }

        .sex {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 85px;
            left: 560px;
        }

        .ddate {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 119px;
            left: 95px;
        }

        .bdate {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 99px;
            left: 290px;
        }

        .years {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            top: 85px;
            left: 401px;
        }

        .months {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            top: 85px;
            left: 489px;
        }

        .days {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            top: 85px;
            left: 547px;
        }

        .dplace {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 108px;
            left: 95px;
        }

        .status {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 90px;
            left: 560px;
        }

        .religion {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 113px;
            left: 105px;
        }

        .citizenship {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 93px;
            left: 300px;
        }

        .residence {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: start;
            height: 20px;
            /* border: 1px solid red; */
            top: 78px;
            left: 435px;
        }

        .father {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 93px;
            left: 220px;
        }

        .mother {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 73px;
            left: 470px;
        }

        .codA {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 122px;
            left: 260px;
        }

        .codB {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 124px;
            left: 260px;
        }

        .codC {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 127px;
            left: 260px;
        }

        .att1 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 650px;
            left: 370px;
        }

        .att2 {
            position: absolute;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 697px;
            left: 90px;
        }

        .doctor {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 363px;
            left: 175px;
        }

        .doc_pos {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 361px;
            left: 185px;
        }

        .doc_add {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 358px;
            left: 157px;
        }

        .date0 {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 354px;
            left: 253px;
        }

        .rev {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 284px;
            left: 500px;
        }

        .date1 {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 302px;
            left: 490px;
        }

        .infor {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 463px;
            left: 175px;
        }

        .rel {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 465px;
            left: 235px;
        }

        .infor_add {
            position: relative;
            display: flex;
            justify-content: start;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 467px;
            left: 145px;
        }

        .date2 {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 467px;
            left: 65px;
        }

        .prep {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 384px;
            left: 470px;
        }

        .prep_pos {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 388px;
            left: 470px;
        }

        .date3 {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid red; */
            top: 391px;
            left: 470px;
        }

        .ins {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: end;
            height: 20px;
            /* border: 1px solid     red; */
            top: 545px;
            left: 170px;
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
                    $birthDate = \Carbon\Carbon::parse($death->birthdate);
                    $deathDate = \Carbon\Carbon::parse($death->death_of_date ?? now()); // Use death date or current time

                    $ageYears = (int) $birthDate->diffInYears($deathDate);
                    $totalMonths = (int) $birthDate->diffInMonths($deathDate);
                    $totalDays = (int) $birthDate->diffInDays($deathDate);

                    $ageMonths = ($totalMonths < 12) ? $totalMonths : null; // Show only if less than a year
                    $ageDays = ($totalDays < 30) ? $totalDays : null; // Show only if less than a month
                @endphp

                @if ($ageYears > 0 && is_null($ageMonths) && is_null($ageDays))
                    <p class="years">{{ $ageYears }}</p>
                @elseif ($ageMonths > 0 && is_null($ageDays))
                    <p class="months">{{ $ageMonths }}</p>
                @elseif ($ageDays > 0)
                    <p class="days">{{ $ageDays }}</p>
                @endif


                <p class="dplace">{{ $death->place_of_death }}</p>
                <p class="status">{{ $death->civil_status }}</p>
                <p class="religion">{{ $death->religion }}</p>
                <p class="citizenship">{{ $death->citizenship }}</p>
                <p class="residence">{{ $death->residence }}</p>
                <p class="father">{{ $death->name_of_father }}</p>
                <p class="mother">{{ $death->name_of_mother }}</p>
                <p class="codA">{{ $death->cause_of_death_a }}</p>
                <p class="codB">{{ $death->cause_of_death_b }}</p>
                <p class="codC">{{ $death->cause_of_death_c }}</p>
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