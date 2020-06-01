@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/enginMarques.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($enginMarque, ['route' => ['enginMarques.update', $enginMarque->id], 'method' => 'patch']) !!}

                        @include('engin_marques.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
