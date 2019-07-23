@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Images
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productImages, ['route' => ['admin.productImages.update', $productImages->id], 'method' => 'patch']) !!}

                        @include('admin.product_images.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection