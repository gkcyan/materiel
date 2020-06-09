@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/bareme_transports.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($baremeTransport, ['route' => ['baremeTransports.update', $baremeTransport->id], 'method' => 'patch']) !!}

                        @include('bareme_transports.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
