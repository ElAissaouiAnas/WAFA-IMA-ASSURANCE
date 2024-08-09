@extends('elements/layout')
@section('main')
<style>
.table>tbody>tr>td,
.table>tbody>tr>th,
.table>tfoot>tr>td,
.table>tfoot>tr>th,
.table>thead>tr>td,
.table>thead>tr>th {
    vertical-align: middle;
}
</style>
<section id="mesassurances" style="margin-top:20px; padding-top: 30px">
    <div class="container" style="margin-top:20px">
        <div class="col-lg-12 col-md-12">
            <div class="box-light">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading panel-heading-transparent">
                                <h2 class="panel-title  my-green">Mes Assurances</h2>
                            </div>
                            <div class="panel-body table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped table-booking-history">
                                    <thead>
                                        <tr>
                                            <th class="hidden-xs">Nom</th>
                                            <th class="text-center hidden-xs">Numéro de transaction</th>
                                            <th class="text-center hidden-xs">Date réservation</th>
                                            <th class="text-center"><span class="visible-xs">Référence</span><span
                                                    class="hidden-xs">Montant</span></th>
                                            <th class="text-center">Statut</th>
                                            <th class="text-center"><span class="hidden-xs">Reçu</span></th>
                                            <th class="text-center"><span class="hidden-xs">Attestation</span></th>
                                            <th class="text-center"><span class="hidden-xs">Contrat</span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($assurances as $key => $assurance) : ?>
                                        <?php
                                            $string_to_encrypt = $assurance['id'];
                                            $password = "assurancevoyage";
                                            $encrypted_string = base64_encode(openssl_encrypt($string_to_encrypt, "AES-128-ECB", $password));
                                            ?>
                                        <tr>
                                            <td class="hidden-xs">{{ $assurance['nom'] }} {{ $assurance['prenom'] }}
                                            </td>
                                            <td class="text-center hidden-xs">{{ $assurance['id_transaction'] }}</td>
                                            <td class="text-center hidden-xs">{{ $assurance['updated_at'] }}</td>
                                            <td class="text-center">
                                                <span class="visible-xs">{{ $assurance['id_transaction'] }}</span>
                                                <span style="color:#ed8323;"><b>{{ $assurance['montant'] }}
                                                        Dhs</b></span>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($assurance['status'] == 'PAID') : ?>
                                                <span class="label label-success">Payé</span>
                                                <?php elseif ($assurance['expirationDate'] < date('Y-m-d H:i:s')) : ?>
                                                <span class="label label-danger">Expiré</span>
                                                <?php elseif ($assurance['status'] == 'PENDING') : ?>
                                                <span class="label label-warning">En attente de paiement</span>
                                                <?php endif ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($assurance['status'] == 'PAID' || $assurance['expirationDate'] > date('Y-m-d H:i:s')) : ?>
                                                <a href="{{ route('voucher', $encrypted_string) }}" target="_blank"
                                                    style="padding: 1px;" class="btn btn-block btn-primary btn-xs"><i
                                                        class="fa fa-eye"></i> <span
                                                        class="hidden-xs">Consulter</span></a>
                                                <?php endif ?>
                                            </td>
                                            <td class="text-center">
                                                <?php if ($assurance['status'] == 'PAID') : ?>
                                                <?php if ($assurance['files']) : ?>
                                                <?php foreach (explode('||', $assurance['files']) as $key => $file) : ?>
                                                <?php if ($file) : ?>
                                                <a href="//www.assurancevoyagevisa.com/files/assurances/{{ $assurance['id'] }}/{{ $file }}"
                                                    target="_blank"><i class="fa fa-file text-info"
                                                        style="font-size: 21px;"></i></a> &nbsp;
                                                <?php endif ?>
                                                <?php endforeach ?>
                                                <?php endif ?>
                                                <?php /* ?>
                                                <a class="btn btn-block btn-info btn-xs" data-toggle="modal"
                                                    style="padding: 1px;margin-top: 10px;"
                                                    data-target="#modal-default_<?php echo $assurance['id'] ?>">
                                                    <i class="fa fa-upload"></i> <span class="hidden-xs">Attestation
                                                        signée</span>
                                                </a>
                                                <div class="modal fade"
                                                    id="modal-default_<?php echo $assurance['id'] ?>"
                                                    style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form data-toggle="validator" role="form"
                                                                action="{{ route('import') }}"
                                                                enctype="multipart/form-data" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $assurance['id'] ?>" />
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Télécharger votre
                                                                        attestation signée</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="file-loading">
                                                                        <input
                                                                            id="input-b4a_<?php echo $assurance['id'] ?>"
                                                                            type="file" name="file[]"
                                                                            accept="image/*, .pdf" required="required"
                                                                            class="form-control-file" multiple />
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default pull-left"
                                                                        data-dismiss="modal">Fermer</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Valider</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        <!-- /.modal-content -->
                                                    </div>
                                                </div>
                                                <?php */ ?>
                                                <?php endif ?>
                                            </td>

                                            <td class="text-center">
                                                <?php if ($assurance['status'] == 'PAID') : ?>
                                                <?php if ($assurance['userfiles']) : ?>
                                                <?php foreach (explode('||', $assurance['userfiles']) as $key => $file) : ?>
                                                <?php if ($file) : ?>
                                                <a href="//www.assurancevoyagevisa.com/files/assurances/{{ $assurance['id'] }}/{{ $file }}"
                                                    target="_blank"><i class="fa fa-file text-info"
                                                        style="font-size: 21px;"></i></a> &nbsp;
                                                <?php endif ?>
                                                <?php endforeach ?>
                                                <?php endif ?>
                                                <a class="btn btn-block btn-info btn-xs" data-toggle="modal"
                                                    style="padding: 1px;margin-top: 10px;"
                                                    data-target="#modal-default2_<?php echo $assurance['id'] ?>">
                                                    <i class="fa fa-upload"></i> <span class="hidden-xs">Contrat
                                                        signé</span>
                                                </a>
                                                <div class="modal fade"
                                                    id="modal-default2_<?php echo $assurance['id'] ?>"
                                                    style="display: none;">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <form data-toggle="validator" role="form"
                                                                action="{{ route('import2') }}"
                                                                enctype="multipart/form-data" method="post">
                                                                {{ csrf_field() }}
                                                                <input type="hidden" name="id"
                                                                    value="<?php echo $assurance['id'] ?>" />
                                                                <div class="modal-header">
                                                                    <button type="button" class="close"
                                                                        data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Télécharger votre contrat
                                                                        signé</h4>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <div class="file-loading">
                                                                        <input
                                                                            id="input2-b4a_<?php echo $assurance['id'] ?>"
                                                                            type="file" name="file[]"
                                                                            accept="image/*, .pdf" required="required"
                                                                            class="form-control-file" multiple />
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button"
                                                                        class="btn btn-default pull-left"
                                                                        data-dismiss="modal">Fermer</button>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Valider</button>
                                                                    :
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
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('javascripts')
{{--  
<script>
var amount = <?php echo $amount ?>;

function generateTransactionId() {
    const prefix = 'TXN';
    const timestamp = new Date().getTime();
    const random = Math.floor(Math.random() * 90000) + 10000;

    const transactionId = `${prefix}${timestamp}${random}`;
    return transactionId;
}

const uniqueTransactionId = generateTransactionId();
gtag('event', 'purchase', {
    value: amount,
    currency: "USD",
    transaction_id: uniqueTransactionId,
    'items': [{
        'id': 'PRODUCT_SKU',
        'name': 'Product Name',
        'category': 'Product Category',
        'quantity': 1,
        'price': amount
    }]
});
</script>--}}


@endsection