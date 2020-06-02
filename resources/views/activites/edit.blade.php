@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/activites.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($activite, ['route' => ['activites.update', $activite->id], 'method' => 'patch']) !!}

                        @include('activites.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
