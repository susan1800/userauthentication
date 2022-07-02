 @php
     $totalfee = $_GET['totalfee'];
 @endphp
 {{ \Crypt::decryptString($totalfee) }}