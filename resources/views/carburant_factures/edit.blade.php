@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/carburant_factures.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($carburantFacture, ['route' => ['carburantFactures.update', $carburantFacture->id], 'method' => 'patch']) !!}

                        @include('carburant_factures.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
