<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Print Table</title>
        <meta charset="UTF-8">
        <meta name=description content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Bootstrap CSS -->
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <style>
            body {margin: 20px}
        </style>
    </head>
    <body>


        <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <i class="fa fa-globe"></i> {{ config('app.name', 'MTM') }}
            <small class="pull-right">Date: {{ now() }}</small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          Imprimer par
          <address>
            <strong>{{ Auth::user()->name }}.</strong><br>
                        Email: {{ Auth::user()->email }}<br>
                        <img src="{{ asset('assets/images/avatars/avatar.png') }}" class="img-circle"
                     alt="User Image"/>
          </address>
        </div>
        <!-- /.col -->
        
        <!-- /.col -->
        <div class="col-sm-6 invoice-col text-right">
          <b>Invoice #007612</b><br>
          <br>
          <b>Order ID:</b> 4F3S8J<br>
          <b>Payment Due:</b> 2/22/2014<br>
          <b>Account:</b> 968-34567
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->



        <table class="table table-bordered table-condensed table-striped">
            @foreach($data as $row)
                @if ($row == reset($data)) 
                    <tr>
                        <th colspan="{{ count($row) }}" class="text-center text-uppercase"> @lang('messages.liste_enregistrement') des @lang('messages.interface')</th>
                    </tr>
                    <tr>
                            
                        @foreach($row as $key => $value)
                            <th>{!! $key !!}</th>
                        @endforeach
                    </tr>
                @endif
                <tr>
                    @foreach($row as $key => $value)
                        @if(is_string($value) || is_numeric($value))
                            <td>{!! $value !!}</td>
                        @else
                            <td></td>
                        @endif
                    @endforeach
                </tr>
                
            @endforeach
            <tr>
                <th colspan="{{ count($row)-1 }}" class="text-center text-uppercase"> Total </th>
                <th colspan="" class="text-uppercase"> {{ count($data) }}</th>
            </tr>
        </table>


        <div class="row">
            <!-- accepted payments column -->
            <div class="col-xs-6">
              <!--p class="lead">Payment Methods:</p>
              <img src="../../dist/img/credit/visa.png" alt="Visa">
              <img src="../../dist/img/credit/mastercard.png" alt="Mastercard">
              <img src="../../dist/img/credit/american-express.png" alt="American Express">
              <img src="../../dist/img/credit/paypal2.png" alt="Paypal"-->
    
              <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg
                dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
              </p>
            </div>
            <!-- /.col -->
            <div class="col-xs-6">
              <p class="lead">Recapitulatif</p>
    
              <div class="table-responsive">
                <table class="table">
                  <tbody><tr>
                    <th style="width:50%">Total des lignes</th>
                    <td>{{ count($data) }}</td>
                  </tr>
                  <tr>
                    <th>Total des champs / ligne</th>
                    <td>{{ count($row) }}</td>
                  </tr>
                  
                </tbody></table>
              </div>
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
    
          <!-- this row will not appear when printing -->
          <!--div class="row no-print">
            <div class="col-xs-12">
              <a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Print</a>
              <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
              </button>
              <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
                <i class="fa fa-download"></i> Generate PDF
              </button>
            </div>
          </div-->






          <br/><br/><br/>
        <footer class="main-footer" style="max-height: 100px;text-align: center">
            <strong>Copyright © 2020 <a href="#">Yannick G.</a>.</strong> All rights reserved.
        </footer>
    </body>
</html>
