<form id="categories_search">
  <input type="search" id="search_node" />
</form> 
<br/>
<button id="create_node">create root</button>
<div id="container"></div>
<script>

$ROOT	= "{!! url('/') !!}/";
$CSRF	= "{!!csrf_token()!!}";

$(function () {
	
	  var to = false;
	  $('#search_node').keyup(function () {
		if(to) { clearTimeout(to); }
		to = setTimeout(function () {
		  var v = $('#search_node').val();
		  $('#container').jstree(true).search(v);
		}, 250);
	  });
	

	$('#create_node').click(function () {	 
		
		$('#container').jstree("create_node", "#", 
								"NewParent", "last",  
								function(node) {
									$.ajax({
										method: "POST",
										url: $ROOT+"api/admin/categories",
										data: {
												'text':'NewParent',
												'parent':'#',
												'icon':'',
												'position':"null",
												'description':"null"
										},									
										success: function(data, textStatus, jqXHR) {
											var tree	= $("#container").jstree(true);
											console.log(node);
											/**
											 * MUST BUILD IT
											 **/
											//tree.edit(node);
											tree.refresh(); 
										}
									});	 
								}, 
								false);		 		  
	});
 

 var json =[{"id":4,"icon":"null","parent":"#","text":"New node"},{"id":5,"icon":"null","parent":"3","text":"21"},{"id":6,"icon":"null","parent":"5","text":"New node"},{"id":7,"icon":"null","parent":"#","text":"New node"}];
	$('#container').jstree({
	  "core" : {
		"animation" : 0,
		"check_callback" : true,
		"themes" : { "stripes" : true },
		'data' : {
				'url' : $ROOT+"admin/categories/json/tree",
				'data' : function (node) {

					return { 'id' : node.id };
				  },
				  "dataType" : "json"
				}
	  },
	  "types" : {
		"#" : {
		  /* "max_children" : 4, */
		  "max_depth" : 4 
		},
		"root" : {
		  "icon" : "/static/3.3.8/assets/images/tree_icon.png",
		  "valid_children" : ["default"]
		},
		"default" : {
		  "valid_children" : ["default","file"]
		},
		"file" : {
		  "icon" : "glyphicon glyphicon-file",
		  "valid_children" : []
		}
	  },
	  "plugins" : [
		"contextmenu", "dnd", "search",
		"state", "types", "wholerow"
	  ],
		"contextmenu": {
			"items": function ($node) {
				var tree = $("#container").jstree(true);
				return {
					"Create": {
						"seperator_before": false,
						"seperator_after": false,
						"label": "Create",
						action: function (data) {
							$node = tree.create_node($node, { text: 'New Category', type: 'default' },"",function(_data){
								$.ajax({
									method: "POST",
									url: $ROOT+"api/admin/categories",
									data: {
											'text':_data.text,
											'parent':_data.parent,
											'icon':'',
											'position':"null",
											'description':"null"
									},									
									success: function(data, textStatus, jqXHR) {
										console.log(data);
										tree.refresh();
									}
								});										
							});
							tree.deselect_all();
							tree.select_node($node);
						}							
					},
					"Rename": {
						"separator_before"	: false,
						"separator_after"	: false,
						"_disabled"			: false, 
						"label"				: "Rename",	
						"action"			: function (data) {
							var inst = $.jstree.reference(data.reference),
							obj = inst.get_node(data.reference);
							inst.edit(obj,obj.text,function(_data){
								$.ajax({
									method: "POST",
									url: $ROOT+"api/admin/categories/"+_data.id,
									data: {
											'_method':'PUT',
											'id':_data.id,
											'text':_data.text,
											'position':_data.position
									},
									headers: { 'X-CSRF-TOKEN': $CSRF },
									success: function(data, textStatus, jqXHR) {
										inst.refresh();
										console.log(textStatus);
									}
								});
							});					
						}
					},
					"Remove": {
						"separator_before": false,
						"separator_after": false,
						"label": "Remove",
						"action":  function (data) {
							if(confirm("Are you sure you want to delete?")) {
								var inst = $.jstree.reference(data.reference),
								obj = inst.get_node(data.reference);
							
								$.ajax({
									method: "DELETE",
									url: $ROOT+"api/admin/categories/"+obj.id,
									data: {
											'_method':'DELETE'
									},
									success: function(data, textStatus, jqXHR) {
										inst.refresh();
									}
								});
							}else{
								return false;
							}	
						}                               
					}
				};
			}
		}
	});

	
	
});




/**

OLD VERSION OF JSTREE

*/


var jsondata = [
				   { "id": "ajson1", "parent": "#", "text": "Simple root node" },
				   { "id": "ajson2", "parent": "#", "text": "Root node 2" },
				   { "id": "ajson3", "parent": "ajson2", "text": "Child 1" },
				   { "id": "ajson4", "parent": "ajson2", "text": "Child 2" },
				   { "id": "ajson7", "parent": "ajson4", "text": "Child 2" },
	];
//createJSTree(jsondata); 
function createJSTree(jsondata) {
	$('#container').jstree({
		"core": {
			'data' : {
			'url' : $ROOT+"admin/categories/json/tree",
			'data' : function (node) {

				return { 'id' : node.id };
			  },
			  "dataType" : "json"
			},
			"check_callback": true,                    
		},
		"plugins": ["contextmenu"],
		"contextmenu": {
			"items": function ($node) {
				var tree = $("#container").jstree(true);
				return {
					"Create": {
						"seperator_before": false,
						"seperator_after": false,
						"label": "Create",
						action: function (data) {
							$node = tree.create_node($node, { text: 'New Category', type: 'default' },"",function(_data){
								$.ajax({
									method: "POST",
									url: $ROOT+"api/admin/categories",
									data: {
											'text':_data.text,
											'parent':_data.parent,
											'icon':'',
											'position':"null",
											'description':"null"
									},									
									success: function(data, textStatus, jqXHR) {
										console.log(data);
										tree.refresh();
									}
								});										
							});
							tree.deselect_all();
							tree.select_node($node);
						}							
					},
					"Rename": {
						"separator_before"	: false,
						"separator_after"	: false,
						"_disabled"			: false, 
						"label"				: "Rename",	
						"action"			: function (data) {
							var inst = $.jstree.reference(data.reference),
							obj = inst.get_node(data.reference);
							inst.edit(obj,obj.text,function(_data){
								$.ajax({
									method: "POST",
									url: $ROOT+"api/admin/categories/"+_data.id,
									data: {
											'_method':'PUT',
											'id':_data.id,
											'text':_data.text,
											'position':_data.position
									},
									headers: { 'X-CSRF-TOKEN': $CSRF },
									success: function(data, textStatus, jqXHR) {
										inst.refresh();
										console.log(textStatus);
									}
								});
							});					
						}
					},
					"Remove": {
						"separator_before": false,
						"separator_after": false,
						"label": "Remove",
						"action":  function (data) {
							if(confirm("Are you sure you want to delete?")) {
								var inst = $.jstree.reference(data.reference),
								obj = inst.get_node(data.reference);
							
								$.ajax({
									method: "DELETE",
									url: $ROOT+"api/admin/categories/"+obj.id,
									data: {
											'_method':'DELETE'
									},
									success: function(data, textStatus, jqXHR) {
										inst.refresh();
									}
								});
							}else{
								return false;
							}	
						}                               
					}
				};
			}
		}
	});
}
</script>
 