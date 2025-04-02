<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Print Permit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            /* border: solid 1px red; */
        }

        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            display: flex;
            align-items: center;
            justify-content: center;
        }


        .conatainer {
            display: flex;
            justify-content: space-between;

            height: 11in;
        }


        .img_holder {
            display: flex;
            flex-direction: column;
            margin-top: 1.9in;
            gap: 50px;
            width: 2.1in;
            margin-bottom: 2.3in;

        }

        .year {
            width: 100%;
            height: auto;
            writing-mode: vertical-rl;
            /* Makes text vertical */
            text-orientation: upright;
            /* Keeps numbers upright */
            font-size: 207px;
            /* Adjust size as needed */
            letter-spacing: -133px;
            /* Adds spacing between characters */
            font-family: "Arial Black", Gadget, sans-serif;
            margin-top: -50px;
            margin-left: 60px;
        }

        .codes {
            font-family: "Comic Sans MS", cursive, sans-serif;
            font-size: 30px;
            margin-left: 60px;
            margin-top: 25px;
            font-weight: bold;

        }

        .info {
            width: 6.4in;
            margin-top: 2.8in;
            gap: 0.6in;
            display: flex;
            flex-direction: column;
            margin-left: 40px;
            margin-right: 40px;


        }

        .info p {
            width: 100%;
            text-align: center;
            
            font-weight: bold;
            font-family: 'Berlin Sans FB Demi', sans-serif;
        }

        .date {
            display: flex;
            position: relative;
            /* border: solid 1px red; */
            height: 80px;
           display:flex;
           justify-content:center;
           align-items:end;
           top: -217px;
        }


        .signature {
            display: flex;
            position: relative;
            /* border: solid 1px red; */
            height: 80px;
           display:flex;
           justify-content:center;
           align-items:end;
           top: -175px;
        }



        .date p {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            font-family: 'Berlin Sans FB Demi', sans-serif;
            text-transform: uppercase;
        }

        .signature p {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            font-family: 'Berlin Sans FB Demi', sans-serif;
            text-transform: uppercase;
            margin-top: -20px;
        }

        .a {
            /* margin-top: 9px; */
            text-transform: uppercase;
            /* font-size:{{ str_word_count($inspection->name_of_establishment) <= (8 ? '17px' : '22px') ?  '17px' : '22px'}}; */
            font-size: 22px;
             top: -43px;
            position: relative;
            /* border: solid 1px red; */
            height: 80px;
           display:flex;
           justify-content:center;
           align-items:end;
           
            

          
        }

        .b {
            /* margin-top: 9px; */
            text-transform: uppercase;
            font-size: 22px;
            /* font-size:{{ str_word_count($inspection->name_of_establishment) <= (8 ? '17px' : '22px') ?  '17px' : '22px'}}; */
          
            position: relative;
            /* border: solid 1px red; */
            height: 80px;
           display:flex;
           justify-content:center;
           align-items:end;
           top: -90px;

        }

        .c {
           
            text-transform: uppercase;
            font-size: 22px;
            position: relative;
            /* border: solid 1px red; */
            height: 80px;
           display:flex;
           justify-content:center;
           align-items:end;
           top: -135px;
        }

        .d {
            /* margin-top: 7px; */
            text-transform: uppercase;
            font-size: 22px;
            /* font-size:{{ str_word_count($inspection->name_of_establishment) <= (8 ? '17px' : '22px') ?  '17px' : '22px'}}; */
            /* margin-top:{{ str_word_count($inspection->name_of_owner) >= (4 ? '0px' : '9px') ? '0px' : '9px'}}; */
            position: relative;
            /* border: solid 1px red; */
            height: 80px;
            display:flex;
            justify-content:center;
            align-items:end;
            top: -183px;

        }

        .sp{
            position: relative;
            left: 8px;
        }


        .sir-a {
            width: 170px;
            height: 170px;
            position: absolute; /* Position the image absolutely */
            top: -20px; /* Adjust as needed */
            left: 80px; /* Adjust as needed */
            z-index: 1; /* Puts image behind the text */
        
        }

        .sir-g {
            width: 170px;
            height: 170px;
            position: absolute; /* Position the image absolutely */
            top: -60px; /* Adjust as needed */
            left: 80px; /* Adjust as needed */
            z-index: 1; /* Puts image behind the text */
        
        }

        .sir-doc {
            width: 250px;
            height: 250px;
            position: absolute; /* Position the image absolutely */
            top: -70px; /* Adjust as needed */
            left: 380px; /* Adjust as needed */
            z-index: 1; /* Puts image behind the text */
        
        }

        
    </style>
</head>

<body>
    <div class="conatainer">
        <div class="img_holder">
            <p class="year">{{ $inspection->renewal_year }}</p>
            <p class="codes">{{  $permitCode }}</p>
        </div>
        <div class="info">
            <p class="a" >
                {{ $inspection->name_of_establishment }}
            </p>

            <p class="b">{{ $inspection->name_of_owner }}</p>
            <p class="c">{{ $inspection->barangay }}</p>
            <p class="d">{{ $inspection->line_of_business }}</p>

            <div class="date">
                <p>{{ $today }}</p>
                <p>{{ $lastDayOfYear }}</p>
            </div>

            <div class="signature">
                <p class="sp">{{ $inspection->inspector_name }}</p>
                <p>benjamin q. bengco iii, md</p>
                
                @if(Str::lower($inspection->inspector_name) === 'aaron jay c. gonzales')
                    <img class="sir-a" src="{{ asset('images/A-sig.png') }}" alt="Signature">
                @else
                    <img class="sir-g" src="{{ asset('images/sir-g.png') }}" alt="Signature">
                @endif

                <img class="sir-doc" src="{{ asset('images/DOC-B.png') }}" alt="Signature">
            </div>
        </div>
    </div>
</body>

<script>
    
</script>

</html>