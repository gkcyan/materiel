@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/accompteFactures.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accompteFacture, ['route' => ['accompteFactures.update', $accompteFacture->id], 'method' => 'patch']) !!}

                        @include('accompte_factures.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
