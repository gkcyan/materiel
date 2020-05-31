@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/pompistes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($pompiste, ['route' => ['pompistes.update', $pompiste->id], 'method' => 'patch']) !!}

                        @include('pompistes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
