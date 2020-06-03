@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/vente_petroliers.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'ventePetroliers.store']) !!}

                        @include('vente_petroliers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
