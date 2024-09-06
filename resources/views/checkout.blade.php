@extends('elements/layout')
@section('main')
<section style="padding-bottom:30px">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-xs-12 text-center">
                <div>
                    <h2>Transfert vers la page de paiement</h2>
                    <?php if($data['payment_method'] == 'mtc'){?>
                    <p>
                        Nous vous transferons vers la page de paiement sécurisé Maroc
                        Telecommerce.<br> Veuillez renseigner vos cordonnées bancaires
                        pour finaliser votre achat.
                    </p>
                    <form name="paymentForm" action="<?php echo $paywallUrl?>" method="post">
                        <?php
            
                        $postParams = array();
                        foreach ($data_payement as $key => $value){
                            array_push($postParams, $key);
                            echo "<input type=\"hidden\" name=\"" .$key ."\" value=\"" .trim($value)."\" />";
                        }
                        
                        natcasesort($postParams);		
                        
                        $hashval = "";					
                        foreach ($postParams as $param){				
                            $paramValue = trim($data_payement[$param]);
                            $escapedParamValue = str_replace("|", "\\|", str_replace("\\", "\\\\", $paramValue));	
                                
                            $lowerParam = strtolower($param);
                            if($lowerParam != "hash" && $lowerParam != "encoding" )	{
                                $hashval = $hashval . $escapedParamValue . "|";
                            }
                        }
                        
                        $escapedStoreKey = str_replace("|", "\\|", str_replace("\\", "\\\\", $store_id));	
                        $hashval = $hashval . $escapedStoreKey;
                        
                        $calculatedHashValue = hash('sha512', $hashval);  
                        $hash = base64_encode (pack('H*',$calculatedHashValue));
                        
                        echo "
                        <input type=\"hidden\" name=\"payload\" value=\"<?php echo $json_payload; ?>\" />
                        <input type=\"hidden\" name=\"signature\" value=\"<?php echo $signature; ?>\" />";

                        ?>
                    </form>
                    <?php }elseif($data['payment_method'] == 'binga'){ ?>
                    <p>
                        Nous vous transferons vers la page de paiement sécurisé Binga.<br>
                        Veuillez renseigner vos cordonnées pour finaliser votre achat.
                    </p>
                    <form name="paymentForm" action="<?php echo $gateway_url?>" method="post">
                        <?php
                        foreach ($data_payement as $key => $value){
                            echo "<input type=\"hidden\" name=\"" .$key ."\" value=\"" .trim($value)."\" />";
                        }
                    ?>
                    </form>
                    <?php }?>
                    <div style="text-align: center; margin-top: 20px;">
                        <img src="{{ asset('/images/ajax-loader.gif')}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('javascripts')
<script>
document.forms.paymentForm.submit();
</script>
@endsection