@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/type_fournisseurs.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'typeFournisseurs.store']) !!}

                        @include('type_fournisseurs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
