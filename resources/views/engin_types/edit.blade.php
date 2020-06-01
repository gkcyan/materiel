@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/enginTypes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($enginType, ['route' => ['enginTypes.update', $enginType->id], 'method' => 'patch']) !!}

                        @include('engin_types.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
