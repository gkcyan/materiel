@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/pompes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pompe, ['route' => ['pompes.update', $pompe->id], 'method' => 'patch']) !!}

                        @include('pompes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
