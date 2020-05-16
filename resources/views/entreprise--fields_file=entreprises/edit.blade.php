@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/entrepriseFieldsFile=entreprises.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($entrepriseFieldsFile=entreprises, ['route' => ['entrepriseFieldsFile=entreprises.update', $entrepriseFieldsFile=entreprises->id], 'method' => 'patch']) !!}

                        @include('entreprise--fields_file=entreprises.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
