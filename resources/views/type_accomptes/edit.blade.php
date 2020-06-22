@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/type_accomptes.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($typeAccompte, ['route' => ['typeAccomptes.update', $typeAccompte->id], 'method' => 'patch']) !!}

                        @include('type_accomptes.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
