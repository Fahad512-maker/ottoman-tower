<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>Print</title>
</head>
<body id="divToPrint">
    <style>
        div{
            margin-top: 27px;
            font-size: 18px;
        }
        .wrapper{
           
        }
        .header{
            height: 150px;
        }
        .payment_by{
            margin-top: 27px;
            font-size: 18px;
            margin-left: 130px;
            
        }
        .drawn{
            margin-left: 210px;
        }
        
        .flatr{
            
            margin-left: 130px;
        }
        .flatpref{
            margin-top: 14px;
            margin-left: 147px;
        }
        .pay_sec{
            margin-left: 170px;

        }
        .phone{
            margin-top: 22px;
            margin-left: 200px;
        }
        .address{
            margin-left: 165px;
            margin-top: 19px;
            
        }
        .signature{
            height: 50px;
        }
        .nominee{
            margin-left: 180px; 
            margin-top: 18px;
        }
        .nominee_sowo{
            margin-top: 14px;
            margin-left: 170px;
        }
        .nominee_relation{
            margin-top: 16px;
            margin-left: 200px;
        }
        .nominee_cnic{
            margin-top: 11px;
            margin-left: 180px;
        }
        .des{
            height: 100px;
        }
        .witness{
            
            display: inline-flex;
            margin-top: 10px;
            margin-left: 30px;
            margin-right: 50px;
            padding: 0px 44px;
        }
        .witness_cnic{
            margin-top: 13px;
            display: inline-flex;
            margin-left: 45px;
            padding: 0px 50px;
            margin-right: -60px 
        }
    </style>
<div class="wrapper">
    <div class="header"></div>
    <div class="payment_by">{{$booking->payment}}</div>
    <div class="payment_by">{{$booking->number}}</div>
    <div class="payment_by">{{$booking->date}}</div>
    <div class="drawn">{{$booking->bank_branch}}</div>
    <div class="flatr">{{$booking->flat_number}}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$booking->size}}</div>
    <div class="flatpref">{{$booking->flat_pref}}</div>
    <div class="pay_sec">{{$booking->payment_schedule}}</div>
    <div class="pay_sec">{{$booking->applicant}}&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;{{$booking->cnic}}</div>
    <div class="pay_sec">{{$booking->sowo}}</div>
    <div class="phone">{{$booking->office_no}} &emsp;&emsp;&emsp; {{$booking->res}} &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; {{$booking->mobile}}</div>
    <div class="address"> {{strip_tags($booking->address)}}</div>
    <div class="signature"></div>
    <div class="nominee">{{$booking->nominee}}</div>
    <div class="nominee_sowo">{{$booking->nominee_sowo}}</div>
    <div class="nominee_relation">{{$booking->nominee_relation}}</div>
    <div class="nominee_cnic">{{$booking->nominee_cnic}}</div>
    <div class="des"></div>
    @php  
    $names = unserialize($booking->witness_name);
    $pcnic = unserialize($booking->wintess_cnic);
   @endphp
   @foreach($names as $name)
    <div class="witness">{{$name}}</div>
    @endforeach
    <br>
    @foreach($pcnic as $cnic)
    <div class="witness_cnic">{{$cnic}}</div>
    @endforeach
    <br>
</div>

</body>
<script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
<script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
<script type="text/javascript">
       
  $(document).ready(function(){

    window.print()
});

</script>
</html>