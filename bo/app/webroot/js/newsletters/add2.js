/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function() {
	$('select').multiselect({
        onChange:function(element, checked){
		//console.log($('#NewsletterDealIds').val());
jQuery.ajax({
	  type: 'GET', // Le type de ma requete
	  url: 'load2/'+$('#NewsletterDealIds').val(),
	  success: function(data, textStatus, jqXHR) {
	    // La reponse du serveur est contenu dans data
	    // On peut faire ce qu'on veut avec ici
	//console.log(data);
	tinyMCE.activeEditor.setContent(data);
	  },
	  error: function(jqXHR, textStatus, errorThrown) {
	    // Une erreur s'est produite lors de la requete
	  }
	});
    }
});
});

