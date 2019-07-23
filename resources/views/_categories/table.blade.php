<form id="categories_search">
  <input type="search" id="q" />
  <button type="submit">Search</button>
</form> 
<div id="container"></div>
<script>
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
	   */
	   
 
 
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
	
	
	 $('#container').jstree({
		'core' : {
			'data' : {
			  'url' : "{!! url('/') !!}/api/categories",
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
			url: "{!! url('/') !!}/api/categories/"+ data.node.id,
			type: 'DELETE',
		})
		.done(function(dataa) {
			data.instance.refresh();
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	   
	}).on('create_node.jstree', function (e, data) {
         
		console.log(data);
		$.ajax({
			url: "{!! url('/') !!}/api/categories/create",
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
	
	

});


</script>
 