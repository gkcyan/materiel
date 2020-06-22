@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/accomptes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($accompte, ['route' => ['accomptes.update', $accompte->id], 'method' => 'patch']) !!}

                        @include('accomptes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
