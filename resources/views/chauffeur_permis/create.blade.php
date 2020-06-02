@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/chauffeur_permis.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'chauffeurPermis.store']) !!}

                        @include('chauffeur_permis.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
