<form id="categories_search">
  <input type="search" id="q" />
  <button type="submit">Search</button>
</form> 
<div id="container"></div>
<script>

$ROOT	= "{!! url('/') !!}/";
$CSRF	= "{!!csrf_token()!!}";

$(function () {



	var jsondata = [
				   { "id": "ajson1", "parent": "#", "text": "Simple root node" },
				   { "id": "ajson2", "parent": "#", "text": "Root node 2" },
				   { "id": "ajson3", "parent": "ajson2", "text": "Child 1" },
				   { "id": "ajson4", "parent": "ajson2", "text": "Child 2" },
	];
	createJSTree(jsondata);
});

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
					/* "Create": {
						"separator_before": false,
						"separator_after": true,
						"label": "Create",
						"action": false,
						"submenu": {
							"File": {
								"seperator_before": false,
								"seperator_after": false,
								"label": "File",
								action: function (obj) {
									$node = tree.create_node($node, { text: 'New File', type: 'file', icon: 'glyphicon glyphicon-file' });
									tree.deselect_all();
									tree.select_node($node);
								}
							},
							"Folder": {
								"seperator_before": false,
								"seperator_after": false,
								"label": "Folder",
								action: function (obj) {
									$node = tree.create_node($node, { text: 'New Category', type: 'default' });
									tree.deselect_all();
									tree.select_node($node);
								}
							}
						}
					}, */
					
					"Create": {
						"seperator_before": false,
						"seperator_after": false,
						"label": "Create",
						action: function (data) {
							//var inst = $.jstree.reference(data.reference),
							$node = tree.create_node($node, { text: 'New Category', type: 'default' },"",function(_data){
								$.ajax({
									method: "POST",
									url: $ROOT+"api/admin/categories",
									data: {
											 /* '_method':'POST',  */
											/* 'id':_data.id, */
											'text':_data.text,
											'parent':_data.parent,
											'icon':'',
											/* '_token': "{!!csrf_token()!!}", */
											'position':"null",
											'description':"null"
									},
									/* headers: { 'X-CSRF-TOKEN': $CSRF }, */
									success: function(data, textStatus, jqXHR) {
										//inst.refresh();
										console.log(data);
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
						"_disabled"			: false, //(this.check("rename_node", data.reference, this.get_parent(data.reference), "")),
						"label"				: "Rename",
						 
						//"shortcut"			: 113,
						//"shortcut_label"	: 'F2',
						//"icon"				: "glyphicon glyphicon-leaf",
						 
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
							if (confirmRemove()) {
								var inst = $.jstree.reference(data.reference),
								obj = inst.get_node(data.reference);
							
								$.ajax({
									method: "DELETE",
									url: $ROOT+"api/admin/categories/"+obj.id,
									data: {
											'_method':'DELETE'
									},
									/* headers: { 'X-CSRF-TOKEN': $CSRF }, */
									success: function(data, textStatus, jqXHR) {
										inst.refresh();
										console.log(textStatus);
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

		
		
$(function() {
	
	
	/**
	 *
	 * https://www.phpflow.com/php/create-rename-delete-node-using-jstree-php-mysql/
	 *
	 */
	 /*
	$('#container').jstree({
		'plugins' : ["search",
					 //"checkbox", 
					 "contextmenu"],  
		'contextmenu': {items: customMenu},
		'core' : {
		  'check_callback' : true ,
		  'data' : <?php echo json_encode($categories) ?>
		}
	});
	
	
	$("#categories_search").submit(function(e) {
		e.preventDefault();
		$("#container").jstree(true).search($("#q").val());
	});
	
	
	function customMenu(node) {
		// The default set of all items
		var items = {
			renameItem: { // The "rename" menu item
				 "label" : "Rename Branch",
				 "action" : function(obj) { this.rename(obj);}
			},
			deleteItem: { // The "delete" menu item
				label: "Delete",
				action: function () {
					alert();
				}
			}
		};

		if ($(node).hasClass("folder")) {
			// Delete the "delete" menu item
			delete items.deleteItem;
		}

		return items;
	}
	    
	   
 
 
    //fill data to tree  with AJAX call
    /* $('#container').jstree({
    'plugins' : ['state','contextmenu','wholerow'],
        'core' : {
            'data' : {
                "url" : "api/categories",
                "plugins" : [ "wholerow", "checkbox" ],
                "dataType" : "{!! url('/') !!}" // needed only if you do not supply JSON headers
            }
        }
     
	}); */
	/*
	
	 $('#container').jstree({
		'core' : {
			'data' : {
			  'url' : "{!! url('/') !!}/admin/categories/json/tree",
			  'data' : function (node) {
				  
					return { 'id' : node.id };
				  },
				  "dataType" : "json"
				}
				,'check_callback' : true,
				'themes' : {
				  'responsive' : false
				}
		},
		'plugins' : ['search','state','contextmenu','wholerow']
	}).on('delete_node.jstree', function (e, data) {

		$.ajax({
			url: "{!! url('/') !!}/admin/categories/"+ data.node.id,
			type: 'DELETE',
		})
		.done(function(dataa) {
			console.log();
			data.instance.refresh();
		})
		.fail(function(request, error) {
			console.log(request);
		})
		.always(function() {
			console.log("complete");
		});
	   
	}).on('create_node.jstree', function (e, data) {
         
		console.log(data);
		$.ajax({
			url: "{!! url('/') !!}/api/admin/categories/create",
			type: 'POST',
			data: {'parent_id':data.parent,'name':data.node.text,'description':'null'}, 
      success: function(resultData) {console.log("a"); }
		})
		.done(function(data) {
			//console.log(data);
		})
		.fail(function() {
			//console.log("error");
		})
		.always(function() {
			//console.log("complete");
		});
		
		
	}).on('rename_node.jstree', function (e, data) {
		
		
		
		
	});

		
		
	$("#categories_search").submit(function(e) {
		e.preventDefault();
		$("#container").jstree(true).search($("#q").val());
	});
	*/
	

});


</script>
 