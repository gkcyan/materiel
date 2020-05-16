@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            @lang('models/entrepriseFieldsFile=entreprises.singular')
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">
            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'entrepriseFieldsFile=entreprises.store']) !!}

                        @include('entreprise--fields_file=entreprises.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
