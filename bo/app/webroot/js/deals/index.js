/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

jQuery(document).ready(function() {
     var BaseUrl ='http://localhost/MyTickets/';
    
    $(".remove").click(function() {
        if(confirm("Etes-vous sûr de vouloir supprimer cet élément?")){
            return true;
        }
        return false;
      });
    
});