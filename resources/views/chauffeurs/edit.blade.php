@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/chauffeurs.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($chauffeur, ['route' => ['chauffeurs.update', $chauffeur->id], 'method' => 'patch']) !!}

                        @include('chauffeurs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
