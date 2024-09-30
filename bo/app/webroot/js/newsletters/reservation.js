/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery(document).ready(function() {
    var BaseUrl ='http://localhost/MyTickets/';
    firstSelected = false;
    selected = new Array();
    $('form').submit(function(){
        return false;
    });
    
    
    $("#spectaclesListe").change(function()
    {
        $("#SalleDiv").hide();
        $("#loginProcessingDiv").show();
        var id=$(this).val();
        //        console.log(id);
        if(id !=null && id >0)
        {
            //            console.log(id); 
            $.ajax({
                url: BaseUrl+'spectacles/getSpectacle',
                method: "POST",
                data: 'id='+ id,
                success: function(data){
                
                    //                    console.log(data);
                    data =$.parseJSON(data);       
                    $('#spectacleTitle').empty().append(data['Spectacle'].name);
                    $.ajax({
                        url: BaseUrl+'spectacles/getSalle',
                        method: "POST",
                        data: 'id='+ data['Spectacle'].id_salle,
                        success: function(data){
                            data =$.parseJSON(data);  
                            $("#salles").val(data['Salle'].id);
                            if(data['Salle'].id==1 ){
                                if( data['Salle'].adress != null){
                                    $('#spectacleAdress').empty().append(' au '+ data['Salle'].adress +' - '+data['Salle'].city );
                                }
                                $('#spectacleAdress').empty().append('');
                                $('#noaccount_ttp').hide();
                            }else{
                                $('#spectacleAdress').empty().append(' au '+ data['Salle'].name+' - '+data['Salle'].city ); 
                                $('#noaccount_ttp').show();
                            }
                            
                        }
                    });
                    //                        $('#spectacleAdress').empty().append(' - '+data['Spectacle'].city+' '+data['Spectacle'].adress);
                    
                    var weekday=new Array(7);
                    weekday[0]="Dimanche";
                    weekday[1]="Lundi";
                    weekday[2]="Mardi";
                    weekday[3]="Mercredi";
                    weekday[4]="Jeudi";
                    weekday[5]="Vendredi";
                    weekday[6]="Samedi";
                    var monthday=new Array(12);
                    monthday[0]="Janvier";
                    monthday[1]="Février";
                    monthday[2]="Mars";
                    monthday[3]="Avril";
                    monthday[4]="Mai";
                    monthday[5]="Juin";
                    monthday[6]="Juillet";
                    monthday[7]="Août";
                    monthday[8]="Septembre";
                    monthday[9]="Octobre";
                    monthday[10]="Novembre";
                    monthday[11]="Décembre";
                    var date = new Date(data['Spectacle'].date);
                    var dayOfWeek = weekday[date.getUTCDay()];
                    var Month = monthday[date.getUTCMonth()];
                    $('#spectacleDate').empty().append(dayOfWeek +' Le '+date.getDate()+' '+Month+' '+date.getUTCFullYear()+' à '+date.getUTCHours()+':'+("0" + date.getUTCMinutes()).slice(-2));
                
                },
                error: function(resultXML){
                    alert('oops');
                }
            });
            $.ajax({
                url: BaseUrl+'spectacles/getSalleBySpectacle',
                method: "POST",
                data: 'id='+ id,
                success: function(data){
                
                    //                    console.log(data);
                    $('#SalleDiv #salleInfoForm').empty().append(data);
                    
                    $.ajax({
                        type: "POST",
                        url: BaseUrl+'spectacles/getCategorieSalle0BySpectacle',
                
                        data: "id="+id,
                        success: function(data){
                            //                                        console.log(data);
                            data =$.parseJSON(data);
                            //                    console.log(data);
                            var content2='<table width="350px">';
                            content2+='<tr id="row" data-row="">';
                            content2+='<td ><div class="section clearfix">';
                            content2+='<div class="half">';
                            content2+='<h4>Catégorie</h4>';
                            content2+='<div class="dollarInputContainer"><select style="width: 120px;" name="cat_id" id="cat_id"><option value="">--select--</option>';                            
                            $.each(data,function(k,v){
                                content2 +='<option value='+v['Categorie'].id + '>'+v['Categorie'].name + '</option>';
                            });
                            content2+='</select></div>';
                            content2+='</div>';
                            content2+='<div class="half">';
                            content2+='<h4>Nombre de place</h4>';
                            content2+='<div class="dollarInputContainer">';
                            content2+='<input type="text" name="nbr_place" id="nbr_place" style="width:130px" value="" class="required">';
                            content2+='</div>';
                            content2+='</div>';
                            content2+='</div></td>';
                            content2+='</tr>';
                            content2+='</table>';
                            $("#salle0Td").empty().append(content2);
                    
                        }
                    });  
                
                },
                error: function(resultXML){
                    $("#SalleDiv").hide();
                    alert('oops');
                }
            });
            
            setTimeout(function() {
                $(".fu").each(function() {
                    $(this).addClass('v');
                });
                $.ajax({
                    type: "POST",
                    url: BaseUrl+'spectacles/getCategorieBySpectacle',
                
                    data: "id="+id,
                    success: function(data){
                        //                                        console.log(data);
                        data =$.parseJSON(data);
                        //                    console.log(data);
                        var listes ='';
                        $.each(data,function(k,v){
                            //                        console.log(v['Categorie']);
                            listes += '<li style="display: inline-block;margin-right: 10px;" class="v"><span class="plan_reserved ';
                            if(v['Categorie'].color != '' ){
                                listes += v['Categorie'].color+'"' ;
                            }
                            listes +='></span>&nbsp;'+v['Categorie'].name + ' ('+v['Categorie'].prix+ 'Dhs)</li>';
                        
                        //                        options +='<option value='+v['Categorie'].id + '>'+v['Categorie'].name + '</option>';
     
                        });
                        //                    options +='<option value="0">Bloquée</option>';
                        //                     console.log(options);
                        $("ul#legend").html(listes);
                    //                    $("#categories").empty().append(options);
                    //                    $("#imprim_ticket").empty().append(options);
                    }
                });
                $.getJSON(BaseUrl+"spectacles/handler/"+id,  // le fichier qui recevera la requête
                    function(data){  // la fonction qui traitera l'objet reçu
                        //                                                console.log(data);
                        $.each(data,function(k1,v1){
                            //                            console.log(v1['Place'].status);
                            if (!$('#'+v1['Place'].code).hasClass('bl') && (v1['Place'].status == 'G' || v1['Place'].status == 'V')){
                                // var title =$('#'+v1.place).attr("title");
                                // $('#'+v1.place).attr("title",title + ' - ' + v1.prix+'Dhs');
                                var title ='';
                                if(v1['Place'].id_categorie == 0){
                                    //                            alert(v1['Place'].id)
                                    title ='Place N° '+v1['Place'].code+ ' - Bloquée ';
                                    $('#'+v1['Place'].code).addClass('bl');
                                }else if(v1['Place'].status == 'V'){
                                    //                                    title ='Place N° '+v1['Place'].code+ ' - ' + v1['Categorie'].prix+'Dhs';
                                    title ='Place N° '+v1['Place'].code+ ' - Vendu ';
                                    $('#'+v1['Place'].code).addClass('bl');
                                    $('#'+v1['Place'].code).html('X');
                                }
                                else{
                                    title ='Place N° '+v1['Place'].code+ ' - ' + v1['Categorie'].prix+'Dhs';
                                }
                                $('#'+v1['Place'].code).attr("title",title);
                                //                                $('#'+v1['Place'].code).css('background','#'+'#'+v1['Place'].code);
                                //                                $('#'+v1['Place'].code).addClass(v1['Place'].color);
                                if(v1['Place'].status != 'V'){
                                    $('#'+v1['Place'].code).addClass(v1['Categorie'].color);
                                }
                                $('#'+v1['Place'].code).removeClass('v');
                            }
                        // });
                        });
                    });
                //                     $(document).on('each','.fu',function(index, value){
                
                    
                $("#loginProcessingDiv").hide();
                $("#SalleDiv").show();
                
            }, 1000); 
        }
        else{
            
            $("#loginProcessingDiv").show();

        }

    });
    
    $('#senTicket').submit(function() {
        //        console.log(selected);
        $("#senTicket .submit").hide();
        $("#senTicket .loginProcessingDiv").show();
        if($('#salles').val()==1){
                $.ajax({
                url: BaseUrl+'spectacles/generateTicket2', // le nom du fichier indiqué dans le formulaire
                type: 'POST', // la méthode indiquée dans le formulaire (get ou post)
                data: {
                    cat_id: $("#cat_id").val(),
                    nbr_place: $("#nbr_place").val(),
                    spectacle: $('#spectaclesListe').val(),
                    fullname: $('#fullname').val(),
                    mail: $('#mail').val()
                } ,
                complete: function(data) { 	
                    //                    console.log(data);
                    $('#mask , .form-popup').fadeOut(300 , function() {
                        $('#mask').remove();  
                    });
                    
                    $("#senTicket .loginProcessingDiv").hide();
                    $("#senTicket .submit").show();
                },
                // je sérialise les données (voir plus loin), ici les $_POST
                success: function(response) { // je récupère la réponse du fichier PHP
//                                                    console.log(response);
                    response =$.parseJSON(response);                    
                    
                    if(response.save)
                    {     
                        window.open(response.url);
                    }
                    else
                    {
                        //display error   with data.error
                                    
                        alert(response.message);
                    
                    }
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }
            });
        }else{
            $.ajax({
                url: BaseUrl+'spectacles/generateTicket', // le nom du fichier indiqué dans le formulaire
                type: 'POST', // la méthode indiquée dans le formulaire (get ou post)
                data: {
                    selected: jQuery.unique(selected.sort()),
                    spectacle: $('#spectaclesListe').val(),
                    fullname: $('#fullname').val(),
                    mail: $('#mail').val()
                } ,
                complete: function(data) { 	
                    //                    console.log(data);
                    $('#mask , .form-popup').fadeOut(300 , function() {
                        $('#mask').remove();  
                    });
                    $("#senTicket .submit").show();
                    $("#senTicket .loginProcessingDiv").hide();
                },
                // je sérialise les données (voir plus loin), ici les $_POST
                success: function(response) { // je récupère la réponse du fichier PHP
                    //                                console.log(response);
                    response =$.parseJSON(response);
                    // alert(html); // j'affiche cette réponse
                    selected = new Array();
                    //                handler();
                    $.getJSON(BaseUrl+"spectacles/handler/"+$('#spectaclesListe').val(),  // le fichier qui recevera la requête
                        function(data){  // la fonction qui traitera l'objet reçu
                         
                            $.each(data,function(k,v1){
                            
                                if (!$('#'+v1['Place'].code).hasClass('bl')&& (v1['Place'].status == 'G' || v1['Place'].status == 'V')){
                                    //                                console.log(v1['Place'].code);
                                    // var title =$('#'+v1.place).attr("title");
                                    // $('#'+v1.place).attr("title",title + ' - ' + v1.prix+'Dhs');
                                    var title ='';
                                    $('#'+v1['Place'].code).removeClass('th');
                                    $('#'+v1['Place'].code).removeClass('rd');
                                    $('#'+v1['Place'].code).removeClass('gr');
                                    $('#'+v1['Place'].code).removeClass('sb');
                                    if(v1['Place'].id_categorie == 0){
                                        //                            alert(v1['Place'].id)
                                        title ='Place N° '+v1['Place'].code+ ' - Bloquée ';
                                        $('#'+v1['Place'].code).addClass('bl');
                                    }else if(v1['Place'].status == 'V'){
                                        //                                    title ='Place N° '+v1['Place'].code+ ' - ' + v1['Categorie'].prix+'Dhs';
                                        title ='Place N° '+v1['Place'].code+ ' - Vendu ';
                                        $('#'+v1['Place'].code).addClass('bl');
                                        $('#'+v1['Place'].code).html('X');
                                    }
                                    else{
                                        title ='Place N° '+v1['Place'].code+ ' - ' + v1['Categorie'].prix+'Dhs';
                                    }
                                    $('#'+v1['Place'].code).attr("title",title);
                                    //                                $('#'+v1['Place'].code).css('background','#'+'#'+v1['Place'].code);
                                    //                                $('#'+v1['Place'].code).addClass(v1['Place'].color);
                                    //                                $('#'+v1['Place'].code).addClass(v1['Categorie'].color);
                                    if(v1['Place'].status != 'V'){
                                        $('#'+v1['Place'].code).addClass(v1['Categorie'].color);
                                    
                                    }
                                    $('#'+v1['Place'].code).removeClass('hv');
                                }
                            });
                        });
                    if(response.save)
                    {     
                        window.open(response.url);
                    }
                    else
                    {
                        //display error   with data.error
                                    
                        alert('oops');
                    
                    }
                },
                error: function (request, status, error) {
                    console.log(request.responseText);
                }
            });
        }
        return false;
    });
    

    //    $(document).on('dblclick','.fu',function(){
    //        //        alert('dobl click');
    //
    //        //    $('.fu', this).hover(function(){
    //        $(document).on('mouseenter','.fu',function(){
    //            // var place = $(this).find("input[type=checkbox]");
    //            if (firstSelected && !$(this).hasClass('v') && !$(this).hasClass('bl') && !$(this).hasClass('hv')){
    //                $(this).addClass('hv');
    //                selected.push($(this).attr("id"));
    //            }
    //        // if (!$('#'+place.attr('id')).attr('checked') && firstSelected){
    //        // $('#'+place.attr('id')).attr('checked', true);
    //        // $('#'+place.attr('id')).next("label").addClass("ui-state-active");
    //        // }
    //        // alert(place.attr('id'));
    //        });
    //        //    $('.fu', this).dblclick(function(){
    //        // if (!$(this).hasClass('hv')){
    //        if (!firstSelected && !$(this).hasClass('v') && !$(this).hasClass('bl')){
    //            firstSelected = true;
    //        // startSelection = place.attr('id');
    //        }
    //				
    //    // methods.initBackendSelection(place.attr('id'));
    //    // }
    //    });
    
    $(document).on('click','.fu',function(){
        //    $('.fu', this).click(function(){
        //        alert('click');
        if (!$(this).hasClass('hv') && !$(this).hasClass('v') && !$(this).hasClass('bl')){
            $(this).addClass('hv');
            selected.push($(this).attr("id"));
        }else if(!firstSelected){
            $(this).removeClass('hv');
            selected.splice(selected.indexOf($(this).attr("id")),1);
        }
			
        if(firstSelected && !$(this).hasClass('v') && !$(this).hasClass('bl')){
            firstSelected = false;
            // endSelection = place.attr('id');
            // methods.showBackendPopUp();
            popup();
            return false;
        //            console.log('selected = '+jQuery.unique(selected.sort()));
        //            console.log(selected.length); 
        }
    //        console.log('selected = '+jQuery.unique(selected.sort()));
    //        console.log(selected.length); 
			
    });
      
    function popup() {
        firstSelected = false;
		
        //Getting the variable's value from a link 
        var loginBox = '#form-box2';

        //Fade in the Popup
        $(loginBox).fadeIn(300);
		
        //Set the center alignment padding + border see css style
        var popMargTop = ($(loginBox).height() + 24) / 2; 
        var popMargLeft = ($(loginBox).width() + 24) / 2; 
		
        $(loginBox).css({ 
            'margin-top' : -popMargTop,
            'margin-left' : -popMargLeft
        });
		
        // Add the mask to body
        $('body').append('<div id="mask"></div>');
        $('#mask').fadeIn(300);
		
        return false;
    };
    
    // When clicking on the button close or the mask layer the popup closed
    //    $('a.close').click( function() { 
    $(document).on('click','a.close',function(){
        $('#mask , .form-popup').fadeOut(300 , function() {
            $('#mask').remove();  
        }); 
        return false;
    });
    $(document).keydown(function(e) {
        //        alert(e.keyCode);
        // ESCAPE key pressed
        if (e.keyCode == 27) {
            if(selected.length>0){
                if (confirm('Voulez-vous annuler les places séléctionner ?')) {
                    $( ".fu" ).each(function() {
                        if ($(this).hasClass('hv')){
                            $(this).removeClass('hv');
                            firstSelected = false;
                            selected = new Array();
                            $('#mask , .form-popup').fadeOut(300 , function() {
                                $('#mask').remove();  
                            });
                        }
                    });
                }
            }
        }
        if (e.keyCode == 13) {
            if(selected.length == 0) {
                alert('Veuillez séléctionner une place');
                return false;
            } else {
                popup();
                return false;
        
            }
            
        }
    });
    $(document).on('click','#reservation',function(){
        if($("#salles").val()==1){
            
        if(!$("#cat_id").val() || !$("#nbr_place").val())  {
                alert('Veuillez remplir tous les champs');
                return false;
            } else {
                popup();
                return false;
        
            }
        }else{
            if(selected.length == 0) {
                alert('Veuillez séléctionner une place');
                return false;
            } else {
                popup();
                return false;
        
            }
        }
    });
    $("#noaccount_ttp").mouseover(function(){
        $("#noaccount_tooltip").show();
    });
    $("#noaccount_ttp").mouseout(function(){
        $("#noaccount_tooltip").hide();
    });
});

