@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/transporteurs.singular')<small> >> @lang('messages.interface_modification')</small>
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($transporteur, ['route' => ['transporteurs.update', $transporteur->id], 'method' => 'patch']) !!}

                        @include('transporteurs.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
