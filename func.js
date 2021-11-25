$(document).ready(function(){	 
    
	//add new item
	$(document).on("click", ".new", function(){
		$("#modal_form #action").val("insertRow");
		$('#modal_form').modal('show');
	});
	//edit item
    $(document).on("click", ".edit", function(){
		var item_id = $(this).attr('data-c-id');
		$.ajax({
			method:"post",
			dataType:'JSON',
			data: {
				action: "getRowData",
				item_id:item_id,
			},
			success: function( data ) {
				$("#modal_form #action").val("updateRow");				
				$("#modal_form #item_id").val(data.customerData.id);
				$("#modal_form #id_number").val(data.customerData.id_number);
				$("#modal_form #first_name").val(data.customerData.first_name);
				$("#modal_form #last_name").val(data.customerData.last_name);
				$("#modal_form #dob").val(data.customerData.dob);
				$("#modal_form #gender_id").val(data.customerData.gender_id);
				$("#modal_form #phone").val(data.customerData.phone);
				$('#modal_form').modal('show');
			}
		});
	});
	//delete item
    $(document).on("click", ".del", function(){
		var item_id = $(this).attr('data-c-id');
		if (confirm('Are you sure ?')) {
			$.ajax({
				method:"post",
				data: {
					action: "deleteRow",
					item_id:item_id
				},
				success: function() {
					refreshList();			
				}
			});	
		}
	});
	//close modal
    $('#modal_form').on('hide.bs.modal', function () {
		$("#modal_form .for-clear").val("");
	});	
	//send form
    $('#modal_form form').ajaxForm({
		success: function(data){
			$('#modal_form').modal('hide');		
            if(data==1){
				refreshList();
            }
            else{
                alert ('Erorr Please check data');
            }		
		}
	});

});

function refreshList(){
	$.ajax({
		method:"post",
		data: {
			action: "getList"
		},
		success: function(data) {
			$("#mainTb tbody").html(data);
		}
	});
}


