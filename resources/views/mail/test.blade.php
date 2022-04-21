@extends('mail.template')

@section('title')
    Testowy mail
@endsection


@section('content')
<p style="margin: 0; font-size: 14px;">Dzień dobry,</p>
<p style="margin: 0; font-size: 14px; mso-line-height-alt: 16.8px;"> </p>
<p style="margin: 0;">przesyłamy dane logowania do platformy dla schronisk <a href="https://app.psiakaloria.pl" style="color: #e60b4c;">Psia Kaloria</a>:</p>
<p style="margin: 0; font-size: 14px; mso-line-height-alt: 16.8px;"> </p>
<p style="margin: 0;"><b>Identyfikator konta:</b> 1223112</p>
<p style="margin: 0;"><b>Email:</b> 1223112</p>
<p style="margin: 0;"><b>Hasło:</b> 123</p>
<p style="margin: 0; font-size: 14px; mso-line-height-alt: 16.8px;"> </p>
<p style="margin: 0;"><b>Adres do platformy dla schronisk:</b> <a href="https://app.psiakaloria.pl" style="color: #e60b4c;">app.psiakaloria.pl</a></p>
<p style="margin: 0; mso-line-height-alt: 16.8px;"> </p>
<p style="margin: 0;">W przypadku pytań prosimy o kontakt mailowy na <a href="mailto:kontakt@psiakaloria.pl" target="_blank" title="kontakt@psiakaloria.pl" style="text-decoration: none; color: #e60b4c;" rel="noopener">kontakt@psiakaloria.pl</a> lub telefoniczny pod numerem <a href="tel:798 680 679" target="_blank" title="798 680 679" style="text-decoration: none; color: #e60b4c;" rel="noopener">798 680 679</a>.</p>
@endsection
