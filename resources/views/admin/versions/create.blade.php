@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Version
        </h1>
    </section>
    <div class="content">
        @include('adminlte-templates::common.errors')
        <div class="box box-primary">

            <div class="box-body">
                <div class="row">
					<form method="post" action="{!! route('admin.versions.index',$id) !!}" enctype="multipart/form-data">
						@csrf
                        @include('admin.versions.fields')

                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
