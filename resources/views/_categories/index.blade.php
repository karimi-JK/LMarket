@extends('layouts.app')

@section('css')		
	<!--
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.11.1/jquery.min.js" ></script>
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jstree/3.0.9/themes/default/style.min.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/jstree/3.3.5/jstree.min.js" defer></script>
	-->	
	<link rel="stylesheet" href="{!! url('/assets/jstree') !!}/themes/default/style.min.css" />
	<script src="{!! url('/assets/jstree') !!}/jquery.1.11.1.js" ></script>
	<script src="{!! url('/assets/jstree') !!}/jstree.min.js" defer></script>
@endsection

@section('content')
    <section class="content-header">
        <h1 class="pull-left">Categories</h1>
        <h1 class="pull-right">
           <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{!! route('categories.create') !!}">Add New</a>
        </h1>
    </section>
    <div class="content">
        <div class="clearfix"></div>

        @include('flash::message')

        <div class="clearfix"></div>
        <div class="box box-primary">
            <div class="box-body">
                    @include('categories.table')
            </div>
        </div>
        <div class="text-center">
        
        </div>
    </div>
@endsection

