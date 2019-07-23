@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Pants
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productPants, ['route' => ['admin.productPants.update', $productPants->id], 'method' => 'patch']) !!}

                        @include('admin.product_pants.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection