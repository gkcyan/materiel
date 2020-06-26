@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/facture_tickets.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($factureTicket, ['route' => ['factureTickets.update', $factureTicket->id], 'method' => 'patch']) !!}

                        @include('facture_tickets.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
