@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/processes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($process, ['route' => ['processes.update', $process->id], 'method' => 'patch']) !!}

                        @include('processes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
