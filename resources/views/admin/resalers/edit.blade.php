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
                   {!! Form::model($resaler, ['route' => ['admin.resalers.update', $resaler->id], 'method' => 'patch']) !!}

                        @include('admin.resalers.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection