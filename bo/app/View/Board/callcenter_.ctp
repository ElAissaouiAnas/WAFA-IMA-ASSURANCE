<style type="text/css">
  td{vertical-align: middle!important;}
  .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #9E9E9E!important;
}
</style>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Liste</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table id="example" class="table table-bordered table-hover table-datatable table-striped" data-order="[[ 0, &quot;desc&quot; ]]" data-page-length="50">
          <thead>
            <tr>
              <th>ID</th>
              <!-- <th>Réf. Dossier</th> -->
              <th>N° de Tél</th>
              <th>Code Binga</th>
              <th>Montant</th>
              <th>Statut</th>
              <th>Réception des fonds</th>
              <th>Date de création</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($payments as $key => $payment): ?>
              <tr>
                <td style="">
                  <a href="<?php echo $this->Html->url( '/board/view/'.$payment['Assurance']['id']) ?>">
                  <?php echo $payment['Assurance']['id'] ?>   
                  </a> 
                </td>
                <!-- <td class="text-center"><?php echo $payment['Assurance']['ref'] ?></td> -->
                <td style="" class="text-center"><?php echo $payment['Assurance']['tel'] ?></td>
                <td style="" class="text-center"><?php echo $payment['Assurance']['id_transaction'] ?></td>
                <td style="" class="text-center"><?php echo $payment['Contrat']['prime_ttc'] ?> Dhs</td>
                <td style="" class="text-center">
                  <?php if ($payment['Assurance']['status'] == 'PAID'): ?>
                  	<?php if ($payment['Assurance']['valid']): ?>
                    	<span class="label label-primary">COMPLETED</span>
                  		<?php if (isset($pos[$payment['Assurance']['user_id']])): ?>
                  		<br><br><b>Par : <?php echo $pos[$payment['Assurance']['user_id']] ?></b><br><?php echo $payment['Assurance']['confirmedDate'] ?>
                  		<?php endif ?>
                  	<?php elseif ($payment['Assurance']['files']): ?>
                  		<span class="label label-info">ISSUED</span>
                  		<?php if (isset($pos[$payment['Assurance']['file_user_id']])): ?>
                  		<br><br><b>Par : <?php echo $pos[$payment['Assurance']['file_user_id']] ?></b><br><?php echo $payment['Assurance']['file_date'] ?>
                  		<?php endif ?>
                  	<?php else: ?> 
                    <span class="label label-success"><?php echo $payment['Assurance']['status'] ?></span>
                  	<?php endif ?>
                  <?php else: ?>
                    <span class="label label-warning"><?php echo $payment['Assurance']['status'] ?></span>
                  <?php endif ?>
                </td>
                <td style="" class="text-center">
                  <?php echo $payment['Assurance']['confirmed'] =='Y' ? '<span class="label label-success">Oui</span>' : '<span class="label label-danger">Non</span>' ?>
                </td>
                <td style="" class="text-center"><?php echo $payment['Assurance']['created'] ?></td>
                <td style="" class="text-center">
                  <a href="<?php echo $this->Html->url( '/board/view/'.$payment['Assurance']['id']) ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-eye"></i> Consulter</a>
                  <?php if ($payment['Assurance']['status'] == 'PAID'): ?>
                  <?php if ($payment['Assurance']['files']): ?>
                  <hr style="margin: 14px 0 5px;border-color: #cfcfcf;">
                  Pièces jointes :
                  	<?php foreach (explode('||', $payment['Assurance']['files']) as $key => $file): ?>
                  		<a href="<?php echo $this->Html->url( '/assurances/'.$payment['Assurance']['id'].'/'.$file) ?>" target="_blank"><i class="fa fa-file"></i></a> &nbsp;
                  	<?php endforeach ?>
                  	<?php if (!$payment['Assurance']['valid'] && $current_user['User']['admin']): ?>
                  	<hr style="margin: 14px 0 5px;border-color: #cfcfcf;">
	                  <a href="<?php echo $this->Html->url( '/board/valid/'.$payment['Assurance']['id']) ?>" class="btn btn-block btn-success btn-sm" data-toggle="modal">
	                    <i class="fa fa-check"></i> Valider
	                  </a>
                  	<?php endif ?>
                  <?php endif ?>
                  <button type="button" class="btn btn-block btn-default btn-sm" data-toggle="modal" data-target="#modal-default_<?php echo $payment['Assurance']['id'] ?>">
                    <i class="fa fa-upload"></i> Télécharger
                  </button>
                  <div class="modal fade" id="modal-default_<?php echo $payment['Assurance']['id'] ?>" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      	<form data-toggle="validator" role="form" action="<?php echo $this->Html->url('/board/import'); ?>" enctype="multipart/form-data" method="post">
                      		<input type="hidden" name="id" value="<?php echo $payment['Assurance']['id'] ?>" />
	                        <div class="modal-header">
	                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">×</span></button>
	                          <h4 class="modal-title">Télécharger votre police d'assurance ici :: <?php echo $payment['Assurance']['nom'].' '.$payment['Assurance']['prenom'] ?></h4>
	                        </div>
	                        <div class="modal-body">
	                          <div class="file-loading">
	                          	<input id="input-b4a_<?php echo $payment['Assurance']['id'] ?>" type="file" name="data[file][]" required="required" class="input-file-sd file" multiple />
	                          </div>
	                        </div>
	                        <div class="modal-footer">
	                          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
	                          <button type="submit" class="btn btn-primary">Valider</button>
	                        </div>
                        </form>
                      </div>
                      <!-- /.modal-content -->
                    </div>
                  </div>
                  <?php endif ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
          <tfoot>
          <tr>
            <th>ID</th>
              <th>Réf. Dossier</th>
              <th>N° de Tél</th>
              <th>Code Binga</th>
              <th>Total</th>
              <th>Statut</th>
              <th>Réception des fonds</th>
              <th>Date de création</th>
          </tr>
          </tfoot>
        </table>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>