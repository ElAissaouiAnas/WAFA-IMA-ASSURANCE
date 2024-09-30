/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function() {
     var BaseUrl ='http://localhost/newsletter/';
    
     jQuery(document).ready(function(){
    	 $('select#list').multiselect({maxHeight: 250});
    	 $("#datetimepicker").datetimepicker({
    	        format: "dd MM yyyy - hh:ii"
    	    });
    	 var data_id="";
    	    $(".loadPopup").click(function(){
    	    	$("#documentId").val($(this).attr('newsletter-id'));
				$("#NewsletterForm").attr('action',$(this).attr('action'));
    	    	data_id = $(this).attr('data-id');
    	    	$.get($(this).attr('data-href'), function(data) {
    	    		$('#modalContent').html(data);
    	    		popup(data_id);
    	    		});
    	    	return false;
    	    });
    	    
    	    $(".loadPopup2").click(function(){
    	    	$("#document_id").val($(this).attr('newsletter-id'));
    	    	data_id = $(this).attr('data-id');
    	    		popup(data_id);
    	    	
    	    	return false;
    	    })
    	    
    	});
     
     function popup(id) {
 		
         //Getting the variable's value from a link 
         var loginBox = '#'+id;
         //Fade in the Popup
         $(loginBox).fadeIn(300);
 		
         //Set the center alignment padding + border see css style
         var popMargTop = ($(loginBox).height()) / 15; 
         var popMargLeft = ($(loginBox).width()) / 4; 
 		
         $(loginBox).css({ 
             'margin-top' : popMargTop,
             'margin-bottom' : popMargTop,
             'margin-left' : popMargLeft
         });
 		
         // Add the mask to body
         $('body').append('<div id="mask"></div>');
         $('#mask').fadeIn(300);
 		
         return false;
     };
     
     $('.close').click( function() { 
         $('#mask , .popupContent').fadeOut(300 , function() {
             $('#mask').remove();  
         }); 
         return false;
     });
    
});