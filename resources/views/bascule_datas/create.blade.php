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
                    {!! Form::open(['route' => 'basculeDatas.store','files' => true]) !!}

                        @include('bascule_datas.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
