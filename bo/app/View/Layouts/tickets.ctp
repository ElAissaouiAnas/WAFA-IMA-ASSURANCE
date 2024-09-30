<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Binga Assurance</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo $this->Html->url("/bower_components/bootstrap/dist/css/bootstrap.min.css");?>">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo $this->Html->url("/bower_components/font-awesome/css/font-awesome.min.css");?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo $this->Html->url("/bower_components/Ionicons/css/ionicons.min.css");?>">
  <link rel="stylesheet" href="<?php echo $this->Html->url("/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css");?>">
  <link rel="stylesheet" href="<?php echo $this->Html->url("/css/fileinput.css");?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo $this->Html->url("/dist/css/AdminLTE.min.css");?>">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo $this->Html->url("/dist/css/skins/_all-skins.min.css");?>">

  <!-- Morris charts -->
  <link rel="stylesheet" href="<?php echo $this->Html->url("/bower_components/morris.js/morris.css");?>">
  <link rel="stylesheet" href="<?php echo $this->Html->url("/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css");?>">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- jQuery 3 -->
    <script src="<?php echo $this->Html->url("/bower_components/jquery/dist/jquery.min.js");?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo $this->Html->url("/bower_components/bootstrap/dist/js/bootstrap.min.js");?>"></script>
    <script src="<?php echo $this->Html->url( '/js/fileinput.js') ?>" type="text/javascript"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body class="hold-transition skin-blue layout-top-nav">
    <div class="wrapper">

      <header class="main-header">
        <nav class="navbar navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <a href="<?php echo $this->Html->url("/");?>" class="navbar-brand"><b>Assurance</b></a>
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                <i class="fa fa-bars"></i>
              </button>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
              <ul class="nav navbar-nav">
                <li class="active_"><a href="<?php echo $this->Html->url( '/board/callcenter') ?>"><i class="fa fa-table"></i> Liste</a></li>
                <li><a href="<?php echo $this->Html->url( '/board/generate') ?>"><i class="fa fa-edit"></i> Formulaire</a></li>
                <?php if ($current_user['User']['admin']): ?>
                <li><a href="<?php echo $this->Html->url( '/board/summary') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <?php endif ?>
              </ul>
            </div>
            <!-- /.navbar-collapse -->
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
              <ul class="nav navbar-nav">
                <!-- User Account Menu -->
                <li class="dropdown user user-menu">
                  <!-- Menu Toggle Button -->
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- hidden-xs hides the username on small devices so only the image appears. -->
                    <span class="hidden-xs"><i class="fa fa-user"></i> <?php echo $current_user['User']['name'] ?></span>
                  </a>
                  <ul class="dropdown-menu">
                    <!-- The user image in the menu -->
                    <li class="user-header">
                      <p>
                        <?php echo $current_user['User']['name'] ?>
                        <small><?php echo $current_user['User']['email'] ?></small>
                      </p>
                    </li>
                    <!-- Menu Footer-->
                    <li class="user-footer">
                      <div class="pull-left">
                        <a href="<?php echo $this->Html->url("/users/info") ?>" class="btn btn-default btn-flat">Profile</a>
                      </div>
                      <div class="pull-right">
                        <a href="<?php echo $this->Html->url("/users/logout") ?>" class="btn btn-default btn-flat">Sign out</a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
            <!-- /.navbar-custom-menu -->
          </div>
          <!-- /.container-fluid -->
        </nav>
      </header>
      <!-- Full Width Column -->
      <div class="content-wrapper">
        <div class="container">
          <!-- Content Header (Page header) -->
          <section class="content-header">
            <!-- <h1>Top Navigation</h1> -->
          </section>

          <!-- Main content -->
          <section class="content">
                <?php echo $this->Session->flash(); ?>
                <?php echo $this->fetch('content'); ?>
            <!-- /.box -->
          </section>
          <!-- /.content -->
        </div>
        <!-- /.container -->
      </div>
      <!-- /.content-wrapper -->
      <footer class="main-footer no-print">
        <div class="container">
          <div class="pull-right hidden-xs">
          </div>
          <strong>Copyright &copy; <?php echo date('Y') ?>.</strong> All rights
          reserved.
        </div>
        <!-- /.container -->
      </footer>
    </div>
<!-- ./wrapper -->

    
    <!-- SlimScroll -->
    <script src="<?php echo $this->Html->url("/bower_components/jquery-slimscroll/jquery.slimscroll.min.js");?>"></script>
    <!-- FastClick -->
    <script src="<?php echo $this->Html->url("/bower_components/fastclick/lib/fastclick.js");?>"></script>

    <!-- DataTables -->
    <script src="<?php echo $this->Html->url("/bower_components/datatables.net/js/jquery.dataTables.min.js");?>"></script>
    <script src="<?php echo $this->Html->url("/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js");?>"></script>
    <!-- AdminLTE App -->
    <!-- <script src="<?php echo $this->Html->url("/dist/js/adminlte.min.js");?>"></script> -->
    <!-- AdminLTE for demo purposes -->
    <!-- <script src="<?php echo $this->Html->url("/dist/js/demo.js");?>"></script> -->
    <script src="<?php echo $this->Html->url( '/js/validator.min.js') ?>" type="text/javascript"></script>
    <!-- InputMask -->
    <script src="<?php echo $this->Html->url( '/js/input-mask/jquery.inputmask.js') ?>" type="text/javascript"></script>
    <script src="<?php echo $this->Html->url( '/js/input-mask/jquery.inputmask.date.extensions.js') ?>" type="text/javascript"></script>
    <script src="<?php echo $this->Html->url( '/js/input-mask/jquery.inputmask.extensions.js') ?>" type="text/javascript"></script>

    <!-- Morris.js charts -->
    <script src="<?php echo $this->Html->url("/bower_components/raphael/raphael.min.js");?>"></script>
    <script src="<?php echo $this->Html->url("/bower_components/morris.js/morris.min.js");?>"></script>
    <script src="<?php echo $this->Html->url("/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js");?>"></script>

    <script type="text/javascript">

        $(document).ready(function() { 
            $('[data-mask]').inputmask();
            $('.datepicker').datepicker({
              format: 'dd/mm/yyyy',
              autoclose: true,
              todayHighlight: true,
              startDate: '-9131d',
              endDate: '0d',
            });

            // $('.datepicker').datepicker('setStartDate', "01-01-1900");

            $('.table-datatable').DataTable();

             $(".input-file-sd").fileinput({
                showPreview: true,
                showUpload: false,
                // elErrorContainer: '#kartik-file-errors',
                // allowedFileExtensions: ["jpg", "png", "gif"],
                // uploadUrl: '<?php echo $this->Html->url( "/board/upload/") ?>',
                maxFileCount: 5,
            });

            $('#company').on('change', function() {
                $('#type').find('option').remove();
                if($(this).val() == 'MAROC ASSISTANCE INTERNATIONAL' || $(this).val() == 'WAFA IMA' ){
                    $('#type').append('<option value=""></option>');
                    $('#type').append('<option value="Assistance Schengen">Assistance Schengen</option>');
                    $('#type').append('<option value="Assistance Monde">Assistance Monde</option>');
                }
                if($(this).val() == 'AXA ASSISTANCE' ){
                    $('#type').append('<option value=""></option>');
                    $('#type').append('<option value="Assistance Schengen">Assistance Schengen</option>');
                    $('#type').append('<option value="Assistance Monde famille avec ou sans véhicule">Assistance Monde famille avec ou sans véhicule</option>');
                }
            });

            $('#type').on('change', function() {
              if($(this).val() == 'Assistance Schengen'){
                $('#d_conjoints').hide();
                $('#div_conjoints').hide();
                $('#d_enfants').hide();
                $('#d_vehicule').hide();
                $('#div_enfants').hide();
                $('#conjoints').val(0);
                $('#enfants').val(0);
              }else{
                $('#d_conjoints').show();
                $('#d_enfants').show();
                $('#d_vehicule').show();
              }
            });


            $('#company,#type,#duree,#date_naissance').on('change', function() {
                // if(){
                    getPrice();
                // }
            });

            $('#conjoints').on('change', function() {
                if($(this).val()>0){
                    $('#div_conjoints').show();
                    show_element('#c1');
                    hide_element('#c2');
                    hide_element('#c3');
                    hide_element('#c4');
                    if ($(this).val() == 2) {
                        show_element('#c2');
                        hide_element('#c3');
                        hide_element('#c4');
                    }
                    if ($(this).val() == 3) {
                        $('#c2').show();
                        $('#c3').show();
                        $('#c4').hide();
                    }
                    if ($(this).val() == 4) {
                        show_element('#c2');
                        show_element('#c3');
                        show_element('#c4');
                    }
                }else{
                    $('#div_conjoints').hide();
                    hide_element('#c1');
                    hide_element('#c2');
                    hide_element('#c3');
                    hide_element('#c4');
                }

            });

            $('#enfants').on('change', function() {
                if($(this).val()>0){
                    $('#div_enfants').show();
                    show_element('#e1');
                    hide_element('#e2');
                    hide_element('#e3');
                    hide_element('#e4');
                    hide_element('#e5');
                    hide_element('#e6');
                    if ($(this).val() == 2) {
                        show_element('#e2');
                        hide_element('#e3');
                        hide_element('#e4');
                        hide_element('#e5');
                        hide_element('#e6');
                    }
                    if ($(this).val() == 3) {
                        show_element('#e2');
                        show_element('#e3');
                        hide_element('#e4');
                        hide_element('#e5');
                        hide_element('#e6');
                    }
                    if ($(this).val() == 4) {
                        show_element('#e2');
                        show_element('#e3');
                        show_element('#e4');
                        hide_element('#e5');
                        hide_element('#e6');
                    }
                    if ($(this).val() == 5) {
                        show_element('#e2');
                        show_element('#e3');
                        show_element('#e4');
                        show_element('#e5');
                        hide_element('#e6');
                    }
                    if ($(this).val() == 6) {
                        show_element('#e2');
                        show_element('#e3');
                        show_element('#e4');
                        show_element('#e5');
                        show_element('#e6');
                    }
                }else{
                    $('#div_conjoints').hide();
                    hide_element('#e1');
                    hide_element('#e2');
                    hide_element('#e3');
                    hide_element('#e4');
                    hide_element('#e5');
                    hide_element('#e6');
                }

            });
            
        });

        function show_element(element) {
            $(element).show();
            $("div" + element + " :input").attr("required", true);
        }

        function hide_element(element) {
            $(element).hide();
            $("div" + element + " :input").attr("required", false);
        }

        function getCompanies(){

            $("#prime_ttc").html( 0 );
            $("#montant_wafacash").html( 0 );
            $("#contrat_id").val();

            var $select = $('#PaymentCompagny');
            $select.find('option').remove();
            $select.append('<option value=""></option>');

            if($('#PaymentTypeContrat').val() && $('#PaymentAgeAssure').val() && $('#PaymentDuree').val()){
                $.ajax({
                    url : '<?php echo $this->Html->url( '/board/getCompanies' ) ?>',
                    type : 'POST',
                    data : 'type=' + $('#PaymentTypeContrat').val() + '&age=' + $('#PaymentAgeAssure').val() + '&duree=' + $('#PaymentDuree').val(),
                    success : function(data){

                        response = $.parseJSON(data);

                        $("#PaymentCompagny").attr('disabled', false);

                        $.each(response.compagnies,function(key, value)
                        {
                            $select.append('<option value="' + key + '">' + value + '</option>'); // return empty
                        });

                        // console.log(response);

                    }
                });
            }

        }

        function getPrice(){
            // console.log('getPrice');
            
            $("#prime_ttc").html( 0 );
            // $("#montant_wafacash").html( 0 );
            $("#contrat_id").val();

            if($('#type').val() && $('#date_naissance').val() && $('#duree').val() && $('#company').val()){
                $.ajax({

                    url : '<?php echo $this->Html->url( '/board/getPrice' ) ?>',
                    type : 'POST',
                    data : 'type=' + $('#type').val() + '&age=' + $('#date_naissance').val() + '&duree=' + $('#duree').val() + '&company=' + $('#company').val(),
                    success : function(data){

                        response = $.parseJSON(data);

                        $("#contrat_id").val( response.id );
                        $("#age").html( response.age );
                        $("#prime_ttc").html( response.prime_ttc );
                        // $("#montant_wafacash").html( Math.round( response.prime_ttc * 112) / 100);

                        // console.log(response);

                    }
                });
            }

        }

    </script>

</body>
</html>
