@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/transporteurs.singular')<small> >> @lang('messages.interface_creation')</small>
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'transporteurs.store']) !!}

                        @include('transporteurs.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
