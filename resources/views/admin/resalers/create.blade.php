@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Resaler
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">

					{!! Form::open(array("route"=>'admin.resalers.store', 'files'=>true)) !!}

                        @include('admin.resalers.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
