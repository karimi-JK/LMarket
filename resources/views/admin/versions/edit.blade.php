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
                   {!! Form::model($version, ['route' => ['admin.versions.update', $version->id], 'method' => 'patch']) !!}

                        @include('admin.versions.fields_edit')

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
			$("#product_tag_choosen").val([{!!$version->requirements!!}]);
			$('#product_tag_choosen').trigger("chosen:updated");
		}, 500);
	})
</script>

@endsection