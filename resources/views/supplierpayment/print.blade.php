<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
<link href="{{asset('bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />

</head>
<body>
    <style>
        body{
            background-color:aliceblue;
        }
        #image{
                display: block;
                margin-left: auto;
                margin-right: auto;
                height: 150px;
                width: 300px;
        }
        h2{
          
            text-align: center;
        }
        .text-info{
            color: #17a2b8!important;
            padding: 0px 40px;
        }
       
        .amount_date{
            background-color: white;
            height: 100%;
            padding: 12px;
        }
        .date{
            border: 2px solid black;
            
        }
        .table,tr,th,table{
          
            
            border: 1px solid black;
          
        }
        

        
    </style>
    <div class="wrapper">
        <div class="header">
            <h2>OTTOMAN CONSTRUCTION</h2>
            <hr class="text-left" style="border: 1px solid #17a2b8" width=100%>
            <img id="image" src="{{ asset('assets/img/logo.png') }}" alt="image">
            <div><strong class="text-info"><b>Supplier Invoice # :</b></strong><u><b>{{$pay->id}}</b></u></div>
        </div>
       <div class="wrapper2" >
            <!-- {{-- <div class="paid">Amount Paid : {{$pay->supplier_paid}}-- </div>
           <div class="date">Date : {{$pay->created_at}}</div> --}} -->
           <table class="table dt-responsive" style="margin-top:20px;">
            <tr class="text-justify bg-white">
                <th class="w-50" style="border-top: 1px solid black">Amount Paid : <span class="font-weight-normal"><b>{{$pay->supplier_paid}}</b></span></th>
                <th class="w-50" style="border-top: 1px solid black" colspan="2">Date : <span class="font-weight-normal"><b>{{$pay->created_at}}</b></span></th>
            </tr>

            <tr>
                <td class="text-center table-secondary" colspan="3"><strong>Method of Payment</strong></td>
            </tr>
            <tr class="text-justify bg-white">
                <th style="border-top: 1px solid black" colspan="3">Mode of Payments : <span class="font-weight-normal"><b>{{$pay->account->account_name}}</b></span></th>
            </tr>
            <tr class="text-justify bg-white">
                <th class="">To : <span class="font-weight-normal"><b>{{$pay->supplierof->name}}</b></span></th>
                <th class="" colspan="2">CNIC : <span class="font-weight-normal"><b>{{$pay->supplierof->cnic}}</b></span></th>
            </tr>
           
            <tr class="text-justify bg-white">
                <th class="" colspan="3">Note : <span class="font-weight-normal"><b></b> </span><br><br><br><br><br><br></th>
            </tr>
            <tr class="text-justify bg-white">
                <th class="">Approved By : <span class="font-weight-normal"></span><br><br></th>
                <th class="">Paid By : <span class="font-weight-normal"></span><br><br><br><br></th>
                <th class="">Signature : <span class="font-weight-normal"></span><br><br><br><br></th>
            </tr>
        </table>
        <div class="col-md-3 float-left text-center" style="margin-top: 80px;"><span style="opacity: 0.8;padding: 10px;">Receiver's Name</span>
            <hr class="text-left" style="border: 1px solid #17a2b8" width=100%>
            <h6 class="text-center"><strong>Receiver's Name</strong></h6>
          </div>
          <div class="col-md-6"></div>
          <div class="col-md-3 float-right text-center" style="margin-top: 80px;"><span style="opacity: 0.8;padding: 10px;border:1px solid #00000047;border-radius: 100px;">Stamp</span>
            <hr class="text-left" style="border: 1px solid #17a2b8" width=100%>
            <h6 class="text-center"><strong>Receiver's Signature</strong></h6>
          </div>
      
       </div>
        
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
