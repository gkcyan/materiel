@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/produit_prixes.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'produitPrixes.store']) !!}

                        @include('produit_prixes.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
