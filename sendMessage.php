<?php

	/* ************************************************** */
	/*                                                    */
	/*                MAİL SENDING PROCESS                */
	/*                                                    */
	/* ************************************************** */

	/* Burak Akdemir - 25.04.2015 23:00 */
	/* *************************************************************** */

	$mailAyarlari  = "MIME-Version: 1.0" . "\r\n";
	$mailAyarlari .= "Content-Type: text/html; charset=iso-8859-9" . "\r\n";


	## mail gönderimi için gerekli bilgiler

	$gondericiAdi          = $_POST["adi"];     // echo $gondericiAdi . "<br/>";
	$gondericiEpostaAdresi = $_POST["eposta"];  // echo $gondericiEpostaAdresi . "<br/>";
	$gondericiTelefonNo    = $_POST["tel"];     // echo $gondericiTelefonNo . "<br/>";
	$gondericiAdresi       = $_POST["adres"];	// echo $gondericiAdresi . "<br/>";
	$gondericiMesaji       = $_POST["mesaj"];	// echo $gondericiMesaji . "<br/>";
	$mesajKonusu           = $_POST["konu"];	// echo $mesajKonusu . "<br/>";

	$aliciEpostaAdresi = "ilhanakdemir@akmirkutu.com";
	// $aliciEpostaAdresi = "burakakdemir@hotmail.com.tr" . ", " . "prfdrburakakdemir@gmail.com";

	/*

	$yeniAd = ucwords($gondericiAdi);
	$yeniMail = str_replace(" ", "", $gondericiEpostaAdresi);

	*/

	## mesaj düzenlemesi
	$mesaj = "

		<div style='font-size: 11px; color: rgb(54,54,54);'>
			<table>

				<tr>
					<td><b>Isim Soyisim</b></td>
					<td>: $gondericiAdi</td>
				</tr>
				<tr>
					<td><b>Telefon No</b></td>
					<td>: $gondericiTelefonNo</td>
				</tr>
				<tr>
					<td><b>ePosta Adresi</b></td>
					<td>: $gondericiEpostaAdresi</td>
				</tr>
				<tr>
					<td><b>Adresi</b></td>
					<td>: $gondericiAdresi</td>
				</tr>

			</table>
		</div>

		<br/>

		<h1 style='color: rgb(54,54,54); height: 35px; font-weight: bold;'>$mesajKonusu</h1>
		<p style='color: rgb(54,54,54);'>$gondericiMesaji</p>

	";

	$mailAyarlari .= "From: " . $gondericiEpostaAdresi . "\r\n";
	$mailAyarlari .= "Cc: prfdrburakakdemir@gmail.com" . "\r\n";
	$mailAyarlari .= "Bcc: zıttiribittiri@gmail.com" . "\r\n";

	$mesajGonder = mail($aliciEpostaAdresi, $mesajKonusu, $mesaj, $mailAyarlari);

	if ($mesajGonder) {
		echo "Mesajınız başarılı bir şekilde iletildi.";
	}else{
		echo "Maalesef bir hata ile karşılaştık. Lütfen tekrar deneyin.";
	}

?>