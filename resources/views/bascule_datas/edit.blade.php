@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/bascule_datas.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($basculeData, ['route' => ['basculeDatas.update', $basculeData->id], 'method' => 'patch']) !!}

                        @include('bascule_datas.fields_edit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
