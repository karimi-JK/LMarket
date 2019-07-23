@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Product
        </h1>
   </section>
   <div class="content">
       @include('adminlte-templates::common.errors')
       <div class="box box-primary">
           <div class="box-body">
               <div class="row">
                   {!! Form::model($product, ['route' => ['admin.products.update', $product->id], 'method' => 'patch', 'files'=>true]) !!}

                        @include('admin.products.fields_edit')

                   {!! Form::close() !!}
               </div>
           </div>
       </div>
   </div>
@endsection

@section('scripts')

<script>
	$(document).ready(function(){	 
		setTimeout(function(){ 
			$("#product_categories_choosen").val([{!!$product->categories!!}]);
			$("#product_tag_choosen").val([{!!$product->product_tags!!}]);
			$("#publisher_id_select").val({!!$product->publisher_id!!});
			
			$('#product_categories_choosen').trigger("chosen:updated");
			$('#product_tag_choosen').trigger("chosen:updated");
		}, 500);
	})
</script>

@endsection