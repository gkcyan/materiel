@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/chauffeurPermis.singular')
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($chauffeurPermi, ['route' => ['chauffeurPermis.update', $chauffeurPermi->id], 'method' => 'patch']) !!}

                        @include('chauffeur_permis.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection
