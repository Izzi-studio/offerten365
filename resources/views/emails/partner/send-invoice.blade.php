@component('mail::message')

Sehr geehrtes Partnerunternehmen,<br>
im Anhang erhalten Sie Ihre Rechnung.<br> 
Für manuelle Überweiser:<br>
Falls Sie nicht am Lastschriftverfahren teilnehmen, bitten wir Sie um die Überweisung des offenen Betrages innerhalb von 7 Tagen nach Rechnungseingang an<br>
Kontoinhaber:<br>
Rahal Gmbh<br>
St. Urbanstrasse 79<br>
4914 Roggwil<br>
PostFinance AG IBAN: CH48 0900 0000 1556 1356 9<br>
Konto: 15-561356-9


@component('mail::button', ['url' => 'https://portal.offerten-365.ch/info'])
Zur Website
@endcomponent

Freundliche Grüße<br>
Ihr Offerten 365 Team<br>
@endcomponent
