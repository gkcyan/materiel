@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/enginKilometrages.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($enginKilometrage, ['route' => ['enginKilometrages.update', $enginKilometrage->id], 'method' => 'patch']) !!}

                        @include('engin_kilometrages.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
