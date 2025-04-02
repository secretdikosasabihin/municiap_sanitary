<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Cards PDF</title>
    <style>

        * {
            text-transform: uppercase;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            display: flex;
            flex-direction: column;
            font-family: Arial, Helvetica, sans-serif;
            font-size: 13px;
            font-weight: bold;
            justify-content: center;
            align-items: center;
        }
        
        .card {
            display: flex;
            width: 7.4in;
            height: 5.4in;
        }

        .page-break {
            page-break-after: always;
        } 

        h2 {
            text-align: center;
        }

        .left {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        #form {
            position: absolute;
            top: 15px;
            left: 200px;
        }

        #scode {
            position: absolute;
            top: 70px;
            left: 230px;
        }

        .left {
            width: 50%;
            display: flex;
            flex-direction: column;
            position: relative; /* ✅ Fix absolute child elements */
        }

        #emp_data {
           position:relative;
           top: 140px;
            left: 70px;
        }

        #name {
            position: relative;
            top: 72px;
            left: 10px;
        }

        #pos {
            position: relative;
            top: 81px;
            left: 50px;
            height: 25px;
           
            
        }

        #age {
            position: relative;
            top: 82px;
            left: 8px;
            height: 25px;
          
            
        }

        #gender {
            position: relative;
            top: 55px;
            left: 70px;
            height: 25px;
        
        }

        
        .fil {
            position: relative;
            top: 30px;
            left: 210px;
            height: 25px;
         
        }
        
        #workplace {
            position: relative;
            top: 30px;
            left: 77px;
            /* display: flex;
            justify-content: flex-start;
            align-items: end; */
            height: 25px;
           
        }

        .left #sig {
            position: absolute;
            display: flex;
            flex-direction: column;
            width: 100%;
            gap: 40px;
            top: 375px;
            left: 83px;
        }

        #doc {
            position: relative;
            top: -5px;
            left: 3px;
        }

        #ins, #doc {
            display: flex;
            border: 50px;
            justify-content: center;
            align-items: center;
        }

        .right {
            width: 50%;
            display: flex;
            flex-direction: column;
        }

        #date {
            gap: 55px;
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
            margin-top: 125px;
        }

        .Meds{
            position: relative;
            display: flex;
            gap: 160px;
            width: 100%;
            justify-content: center;
            top: 267px;
        }

        .dos{
            text-transform: lowercase;
        }

        .med_result, .do {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        #med1 {
            display: flex;
            justify-content: center;
            gap: 160px;
            width: 100%;
            position: relative;
            top: 183px;
        }

        .sir-a {
            width: 110px;
            height: 110px;
            position: absolute; /* Position the image absolutely */
            top: -45px; /* Adjust as needed */
        left: 120px; /* Adjust as needed */
        z-index: 1; /* Puts image behind the text */
      
    }

    .sir-doc {
        width: 150px;
        height: 150px;
        position: absolute; /* Position the image absolutely */
        top: -15px; /* Adjust as needed */
        left: 130px; /* Adjust as needed */
        z-index: 1; /* Puts image behind the text */
        /* filter: contrast(300%);
        filter: drop-shadow(1px 1px 0px black)  */
            /* drop-shadow(-1px -1px 0px black) */
            /* drop-shadow(1px -1px 0px black) */
            /* drop-shadow(-1px 1px 0px black); */
      
    }

    .non {
    width: 330px;
    height: 210px;
    position: absolute; /* Position the image absolutely */
    top: 5px; /* Adjust as needed */
    left: 30px; /* Adjust as needed */
    z-index: -1; /* Puts image behind the text */
    transform: rotate(180deg); /* Rotates the image */
}

.non-2 {
    width: 330px;
    height: 210px;
    position: absolute; /* Position the image absolutely */
    top: 290px; /* Adjust as needed */
    right: -350px; /* Adjust as needed */
    z-index: -1; /* Puts image behind the text */
    transform: rotate(360deg); /* Rotates the image */
}





        
    </style>
</head>
<body>

    @foreach ($healthCards as $health)

        @php
            $img_type = [
                'non_food' => asset('images/non.png'),
                'food' => asset('images/food.png'),
                'others' => asset('images/non.png')
            ];

            $imgSrc = $img_type[$health->health_card_type] ?? asset ('images/default.jpg');
        @endphp
        <div class="card">
            <div class="left">

                 <img class="non" src="{{ $imgSrc }}" alt="Signature">
                 <img class="non-2" src="{{ $imgSrc }}" alt="Signature">
                <p id="form">EHS FORM NO. 102-{{ $health->health_card_type == 'food' ? 'A' : 'B' }} </p>
                <p id="scode">{{ $health->print_code }}</p>
                <div id="emp_data">
                    <p id="name">{{ $health->full_name }}</p>
                    <p id="pos">{{ $health->designation }}</p>
                    <p id="age">{{ $health->age }}</p>
                    <p id="gender">{{ $health->gender }}</p>
                    <p class="fil">FILIPINO</p>
                    <p id="workplace" style="font-size: {{ strlen(str_replace(' ', '', $health->place_of_employment)) >= 20 ? '9px' : '13px' }};">
                        {{ $health->place_of_employment }}
                    </p>
                </div>

                <div id="sig">
                   
                    <p id="ins">AARON JAY C. GONZALES</p>
                    <p id="doc">BENJAMIN Q. BENGCO III, M.D.</p>
                    <img class="sir-a" src="{{ asset('images/A-sig.png') }}" alt="Signature">
                    <img class="sir-doc" src="{{ asset('images/DOC-B.png') }}" alt="Signature">
                   
                </div>
            </div>
            <div class="right">
          
                <div id="date">
             
                    <p>{{ \Carbon\Carbon::parse($health->date_of_issuance)->format('F d, Y') }}</p>
                    <p>{{ \Carbon\Carbon::parse($health->date_of_expiration)->format('F d, Y') }}</p>
                </div>
                <div id="med1">
                    <p>NORMAL</p>
                    <p class="dos">-do-</p>
                </div>
                <div class="Meds">
                    <div class="med_result">
                        <p>NORMAL</p>
                        <p>NORMAL</p>
                    </div>
                    <div class="do">
                        <p class="dos">-do-</p>
                        <p class="dos">-do-</p>
                    </div>
                </div>
             
            </div>
           

        </div>

      

        <div class="page-break"></div>
        <!-- Page Break After Each Card -->
    @endforeach

</body>
</html>
