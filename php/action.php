<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

function kodTemizle(&$veri)
{
	$veri = mysql_real_escape_string($veri);
	$veri = filter_var($veri,FILTER_SANITIZE_STRING);

    return $veri;
}

/* sayfaya gelen herhangi bir post olup olmadığını kontrol eder*/
if(isset($_POST['name'])){

/* tüm postları temizler */
$_POST = array_map("kodTemizle",$_POST);

$name		= $_POST['name'];
$email		= $_POST['email'];
$phone		= $_POST['phone'];
$message	= $_POST['message'];

if(($name==='') || ($email==='') || ($phone==='') || $message===''){
	
	echo  " <script type=\"text/javascript\">
            		alert('Lütfen boş alan bırakmayın');
        	</script>";
	
	echo "<script language=\"Javascript\">
					window.location = \"../index.html#iletisim\"	
		  </script>
		  
		  <noscript> <meta http-equiv=\"refresh\" content=\"0; URL=../index.html#iletisim\"></noscript>";
		  
		  
 
	
	}
	else{// geçerli bir email adresi girilmiş ise

			if (filter_var($email,FILTER_VALIDATE_EMAIL)) {

					echo "<script type=\"text/javascript\">
            					alert('Teşekkür ederiz! Mesajınız iletildi... ');
        				</script>";
	
					echo "<script language=\"Javascript\">
								window.location = \"../index.html#iletisim\"	
		  		 		</script>";
						
					echo "<noscript> <meta http-equiv=\"refresh\" content=\"0; URL=../index.html#iletisim\"></noscript>";	
		  	
		  	}
		  	else{// geçersiz bir email adresi girilmiş ise

				echo  " <script type=\"text/javascript\">
            					alert('Lütfen geçerli bir email adresi girin!');
        				</script>";
	
				echo "<script language=\"Javascript\">
							window.location = \"../index.html#iletisim\"	
		 			 </script>
		  
		  			<noscript> <meta http-equiv=\"refresh\" content=\"0; URL=../index.html#iletisim\"></noscript>";		  			

		  		}	 
				 
		}
				 
}/* eğer sayfaya gelen bi post yok ve bu sayfaya girilmeye çalışılıyorsa hata verir*/
else{
		echo "<script type=\"text/javascript\">
            		alert('Seni yaramaz ^_^');
        	  </script>";

       	echo "<noscript><center> Seni yaramaz ^_^ </center></noscript>";

		echo "<meta http-equiv=\"refresh\" content=\"0; URL=../index.html#iletisim\">";
	}


	


?>


</body>
</html>