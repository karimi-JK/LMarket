@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Requirement
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
                    {!! Form::open(['route' => 'admin.requirements.store']) !!}

                        @include('admin.requirements.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
