@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product Brands
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($productBrands, ['route' => ['admin.productBrands.update', $productBrands->id], 'method' => 'patch']) !!}

                        @include('admin.product_brands.fields')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection