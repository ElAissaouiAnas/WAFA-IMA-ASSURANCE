@extends('elements/layout')
@section('main')
<section style="padding-bottom:30px">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-sm-offset-3 col-xs-12 text-center">
                <div>
                    <h2>Transfert vers la page de paiement</h2>
                    @if( $payment_method == 'payzone')
                        <!-- POST the parameters to the paywall -->
                        <form id="openPaywall" name="paymentForm" action="{{$paywallUrl}}" method="POST" >
                            <input type="hidden" name="payload" value='{{$json_payload}}' />
                            <input type="hidden" name="signature" value="{{$signature}}" />
                        </form>
                    @else if( $payment_method == 'binga')
                        <p>
                            Nous vous transferons vers la page de paiement sécurisé Binga.<br>
                            Veuillez renseigner vos cordonnées pour finaliser votre achat.
                        </p>
                        <form name="paymentForm" action="{{$gateway_url}}" method="post">
                            @foreach($data_payment as $key => $value)
                                <input type="hidden" name="{{$key}}" value="{{trim($value)}}" />
                            @endforeach
                        </form>
                    @endif
                
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