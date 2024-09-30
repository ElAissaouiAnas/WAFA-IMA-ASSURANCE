jQuery(document).ready(function() {
	$('#add_dst').click(function() {
        //         alert($(this).val());
       if(parseInt($('#nbr_dest').val()) <3){
            $('.arr'+(parseInt($('#nbr_dest').val())+1)).show() ;
            $('#nbr_dest').val(parseInt($('#nbr_dest').val())+1) ;
       }else{
    	   alert('vous avez atteint le nombre maximum de destination');
       }
       return false;
            
    });
	
});