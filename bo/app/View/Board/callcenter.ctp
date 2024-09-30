<!-- <?php debug($payments) ?> -->
<style type="text/css">
  td{vertical-align: middle!important;}
  .table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #9E9E9E!important;
}
</style>
<form role="form" method="GET" action="<?php echo $this->Html->url( '/board/callcenter/') ?>">
  <div class="box box-default">
    <div class="box-header with-border">
      <h3 class="box-title">Filter by:</h3>
      <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
      <div class="row">
        <div class="col-md-6">
          <div class="form-group">
            <label>Recherche par nom, code Binga ou transaction ID:</label>
            <input type="text" name="q" class="form-control" value="<?php echo $q ?>" />
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Statut:</label>
            <select id="type_filter" name="status" class="form-control select2" style="width: 100%;" >
                <option></option>
                <option value="PENDING" <?php echo $status == 'PENDING' ? 'selected' : '' ?>>PENDING</option>
                <option value="PAID" <?php echo $status == 'PAID' ? 'selected' : '' ?>>PAID</option>
                <option value="ISSUED" <?php echo $status == 'ISSUED' ? 'selected' : '' ?>>ISSUED</option>
                <option value="COMPLETED" <?php echo $status == 'COMPLETED' ? 'selected' : '' ?>>COMPLETED</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Type:</label>
            <select id="type_filter" name="type" class="form-control select2" style="width: 100%;" >
                <option></option>
                <option value="callcenter" <?php echo $type == 'callcenter' ? 'selected' : '' ?>>Callcenter</option>
                <option value="site" <?php echo $type == 'site' ? 'selected' : '' ?>>Site</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <label>&nbsp;</label>
          <button type="submit" class="btn btn-primary btn-block"><i class="fa fa-play-circle"></i> Filter</button>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.box-body -->
  </div>
</form>
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Liste</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <table class="table table-bordered table-hover table-striped" data-order="[[ 0, &quot;desc&quot; ]]" data-page-length="50">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>N° de Tél</th>
              <th>Code Binga / Transaction ID</th>
              <th>Montant</th>
              <th>Statut</th>
              <th>Date de création</th>
              <th>Type</th>
              <th>Attestation</th>
              <th>Contrat</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($payments as $key => $payment): ?>
              <?php $payment['Assurance']['files'] = '||'.$payment['Assurance']['files'] ?>
              <?php $payment['Assurance']['userfiles'] = '||'.$payment['Assurance']['userfiles'] ?>
              <tr>
                <td>
                  <a href="<?php echo $this->Html->url( '/board/view/'.$payment['Assurance']['id']) ?>">
                  <?php echo $payment['Assurance']['id'] ?>   
                  </a> 
                </td>
                <td class="text-center"><?php echo $payment['Assurance']['prenom'].' '.$payment['Assurance']['nom'] ?></td>
                <td class="text-center"><?php echo $payment['Assurance']['tel'] ?></td>
                <td class="text-center"><?php echo $payment['Assurance']['id_transaction'] ?></td>
                <td class="text-center"><?php echo $payment['Assurance']['montant'] ?> Dhs</td>
                <td class="text-center">
                  <?php if ($payment['Assurance']['status'] == 'PAID'): ?>
                  	<?php if ($payment['Assurance']['valid']): ?>
                    	<span class="label label-primary">COMPLETED</span>
                  		<?php if (isset($pos[$payment['Assurance']['user_id']])): ?>
                  		<br><br><b>Par : <?php echo $pos[$payment['Assurance']['user_id']] ?></b><br><?php echo $payment['Assurance']['confirmedDate'] ?>
                  		<?php endif ?>
                  	<?php elseif ($payment['Assurance']['files'] != '||'): ?>
                  		<span class="label label-info">ISSUED</span>
                  		<?php if (isset($pos[$payment['Assurance']['file_user_id']])): ?>
                  		<br><br><b>Par : <?php echo $pos[$payment['Assurance']['file_user_id']] ?></b><br><?php echo $payment['Assurance']['file_date'] ?>
                  		<?php endif ?>
                  	<?php else: ?> 
                    <span class="label label-success"><?php echo $payment['Assurance']['status'] ?></span><br> <?php echo $payment['Assurance']['paidDate'] ?>
                  	<?php endif ?>
                  <?php else: ?>
                    <span class="label label-warning"><?php echo $payment['Assurance']['status'] ?></span>
                  <?php endif ?>
                </td>
                <td class="text-center"><?php echo $payment['Assurance']['created'] ? $payment['Assurance']['created_at'] : '' ?></td>
                <td class="text-center"><?php echo $payment['Assurance']['type'] ?></td>
                <td class="text-center">
                  <?php if ($payment['Assurance']['status'] == 'PAID'): ?>
                  <?php if ($payment['Assurance']['files']): ?>
                  <hr style="margin: 14px 0 5px;border-color: #cfcfcf;">
                  Pièces jointes :<br>
                  	<?php foreach (explode('||', $payment['Assurance']['files']) as $key => $file): ?>
                      <?php if ($file): ?>
                        
                  		<a href="<?php echo $this->Html->url( '//www.assurancevoyage.ma/files/assurances/'.$payment['Assurance']['id'].'/'.$file, true) ?>" target="_blank" id="file2_<?php echo $payment['Assurance']['id'] ?>_<?php echo $key ?>"><i class="fa fa-file"></i></a> &nbsp;
                      <?php endif ?>
                  	<?php endforeach ?>
                  <?php endif ?>
                  <button type="button" class="btn btn-block btn-default btn-sm" data-toggle="modal" data-target="#modal-default2_<?php echo $payment['Assurance']['id'] ?>">
                    <i class="fa fa-upload"></i> Télécharger
                  </button>
                  <div class="modal fade" id="modal-default2_<?php echo $payment['Assurance']['id'] ?>" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                      	<form data-toggle="validator" role="form" action="<?php echo $this->Html->url('/board/import2/'); ?>" enctype="multipart/form-data" method="post">
                      		<input type="hidden" name="id" value="<?php echo $payment['Assurance']['id'] ?>" />
	                        <div class="modal-header">
	                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	                            <span aria-hidden="true">×</span></button>
	                          <h4 class="modal-title">Télécharger l'attestation :: <?php echo $payment['Assurance']['nom'].' '.$payment['Assurance']['prenom'] ?></h4>
	                        </div>
	                        <div class="modal-body">
	                          <div class="file-loading">
	                          	<input id="input-b4a_<?php echo $payment['Assurance']['id'] ?>" type="file" name="data[file][]" required="required" class="file_" multiple />
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
                  <script type="text/javascript">
                    $("#input-b4a_<?php echo $payment['Assurance']['id'] ?>").fileinput({
                        allowedFileExtensions: ["pdf"],
                        initialPreviewFileType: 'pdf',
                        <?php if ($payment['Assurance']['files']): ?>
                        initialPreview: [
                        <?php foreach (explode('||', $payment['Assurance']['files']) as $key => $file): ?>
                          <?php if ($file): ?>
                          "<?php echo $this->Html->url( '//www.assurancevoyage.ma/files/assurances/'.$payment['Assurance']['id'].'/'.$file, true) ?>",
                          <?php endif ?>
                        <?php endforeach ?>
                        ],
                        initialPreviewConfig: [
                            <?php foreach (explode('||', $payment['Assurance']['files']) as $key => $file): ?>
                            <?php if ($file): ?>
                              {caption: "<?php echo $file ?>", key: <?php echo $key ?>},
                            <?php endif ?>
                            <?php endforeach ?>
                        ],
                        <?php endif ?>
                        initialPreviewAsData: true,
                        deleteUrl: "<?php echo $this->Html->url('/board/deletefile/'.$payment['Assurance']['id']); ?>",
                        overwriteInitial: false,
                        showPreview: true,
                        showUpload: false,
                        maxFileCount: 5,
                    }).on('filedeleted', function(event, key, jqXHR, data) {
                      $('#file_<?php echo $payment['Assurance']['id'] ?>_'+key).remove();
                  });
                  </script>
                  <?php endif ?>
                </td>
                <td class="text-center">
                  <?php if ($payment['Assurance']['status'] == 'PAID'): ?>
                  <?php if ($payment['Assurance']['userfiles']): ?>
                  <hr style="margin: 14px 0 5px;border-color: #cfcfcf;">
                  Pièces jointes :<br>
                    <?php foreach (explode('||', $payment['Assurance']['userfiles']) as $key => $file): ?>
                      <?php if ($file): ?>
                        
                      <a href="<?php echo $this->Html->url( '//www.assurancevoyage.ma/files/assurances/'.$payment['Assurance']['id'].'/'.$file, true) ?>" target="_blank" id="file_<?php echo $payment['Assurance']['id'] ?>_<?php echo $key ?>"><i class="fa fa-file"></i></a> &nbsp;
                      <?php endif ?>
                    <?php endforeach ?>
                  <?php endif ?>
                  <button type="button" class="btn btn-block btn-default btn-sm" data-toggle="modal" data-target="#modal-default_<?php echo $payment['Assurance']['id'] ?>">
                    <i class="fa fa-upload"></i> Télécharger
                  </button>
                  <div class="modal fade" id="modal-default_<?php echo $payment['Assurance']['id'] ?>" style="display: none;">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form data-toggle="validator" role="form" action="<?php echo $this->Html->url('/board/import/'); ?>" enctype="multipart/form-data" method="post">
                          <input type="hidden" name="id" value="<?php echo $payment['Assurance']['id'] ?>" />
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Télécharger le contrat :: <?php echo $payment['Assurance']['nom'].' '.$payment['Assurance']['prenom'] ?></h4>
                          </div>
                          <div class="modal-body">
                            <div class="file-loading">
                              <input id="input-b4a2_<?php echo $payment['Assurance']['id'] ?>" type="file" name="data[file][]" required="required" class="file_" multiple />
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
                  <script type="text/javascript">
                    $("#input-b4a2_<?php echo $payment['Assurance']['id'] ?>").fileinput({
                        allowedFileExtensions: ["pdf"],
                        initialPreviewFileType: 'pdf',
                        <?php if ($payment['Assurance']['userfiles']): ?>
                        initialPreview: [
                        <?php foreach (explode('||', $payment['Assurance']['userfiles']) as $key => $file): ?>
                          <?php if ($file): ?>
                          "<?php echo $this->Html->url( '//www.assurancevoyage.ma/files/assurances/'.$payment['Assurance']['id'].'/'.$file, true) ?>",
                          <?php endif ?>
                        <?php endforeach ?>
                        ],
                        initialPreviewConfig: [
                            <?php foreach (explode('||', $payment['Assurance']['userfiles']) as $key => $file): ?>
                              <?php if ($file): ?>
                              {caption: "<?php echo $file ?>", key: <?php echo $key ?>},
                              <?php endif ?>
                            <?php endforeach ?>
                        ],
                        <?php endif ?>
                        initialPreviewAsData: true,
                        deleteUrl: "<?php echo $this->Html->url('/board/deletefile/'.$payment['Assurance']['id']); ?>",
                        overwriteInitial: false,
                        showPreview: true,
                        showUpload: false,
                        maxFileCount: 5,
                    }).on('filedeleted', function(event, key, jqXHR, data) {
                      $('#file_<?php echo $payment['Assurance']['id'] ?>_'+key).remove();
                  });
                  </script>
                  <?php endif ?>
                </td>

                <td class="text-center">
                  <a href="<?php echo $this->Html->url( '/board/view/'.$payment['Assurance']['id']) ?>" class="btn btn-block btn-primary btn-sm"><i class="fa fa-eye"></i> Consulter</a>
                  <?php if ($payment['Assurance']['status'] == 'PAID'): ?>
                    <?php if (!$payment['Assurance']['valid'] && $current_user['User']['admin']): ?>
                    <hr style="margin: 14px 0 5px;border-color: #cfcfcf;">
                    <a href="<?php echo $this->Html->url( '/board/valid/'.$payment['Assurance']['id']) ?>" class="btn btn-block btn-success btn-sm" data-toggle="modal">
                      <i class="fa fa-check"></i> Valider
                    </a>
                    <?php endif ?>
                  <?php endif ?>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
        <div class="pagination pagination-right">  
            <ul class="pagination pagination-sm no-margin pull-right">  
              <?php     
                echo $this->Paginator->numbers( array( 'tag' => 'li', 'separator' => '', 'currentClass' => 'active', 'currentTag' => 'a' ) );   
              ?>  
            </ul>  
        </div>
      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    
    <!-- /.box -->
  </div>
  <!-- /.col -->
</div>