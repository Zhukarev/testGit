jQuery( document ).ready(function($) {
    $("#btn_apply").on( "click", function() {
        $("div.row-value:last").clone().insertBefore($("hr.hr-end"));
    });

    $("#btn_clear").on( "click", function() {
        var first = $("div.row-value:first");
        $("div.row-value").remove();
        first.insertBefore($("hr.hr-end"));
    });

    $("#btn_add").on( "click", function() {
       var field_select = new Array();
       var field_operator = new Array();
       var input_value = new Array();

        $('.row-value').each(function (i) {
    		field_select[i] = $(this).find(".field_select option:selected").eq(0).val();
    		field_operator[i] = $(this).find(".field_operator option:selected").eq(0).val();
    		input_value[i] = $(this).find(".input_value").eq(0).val();

    		i+1;
		});
        

        $.ajax({
        	method: "POST",
  			url: "git.php",
  			// dataType: 'json',
  			data: {
  				field_select: field_select,
  				field_operator: field_operator, 
  				input_value:input_value
  			},
  			success: function(data) {
  			console.log(data); 
  				$("#finita").html(data);
  			}
		});
    });


});

function btn_delete(e) {
    e.parentNode.parentNode.parentNode.remove();
};