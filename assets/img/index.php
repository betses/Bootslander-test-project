<?
if (isset($_GET['q'])){
	$q=$_GET['q']; 
} else {
	$q="Order Now";
}
//$q=str_replace('-', ' ', $q);
?>
<?php
$table="revisebookartc";
$aply=0;

	include ('configart.php');
	$queryn = "select * from $table WHERE title LIKE '$q' LIMIT 0, 1";
	//print "$queryn<br>";  exit;
	$resultn = mysql_query($queryn) or die("Couldn't execute query 1");
	$numresultsn=mysql_query($queryn);
	$numrowsn=mysql_num_rows($numresultsn);
	if ($numrowsn!=0)	{
	while ($row= mysql_fetch_array($resultn)) {
	$id=$row["id"];
	$article=$row["article"];
	$article2=$row["article2"];
	$kyew=$row["kyew"];
	$title=$row["title"];
	$disc=$row["disc"];
	$book=$row["book"];
	$dt=$row["dt"];
	$user=$row["user"];
	$title= str_replace('-', ' ', $title);
	//$book= str_replace('-', ' ', $book);
	$titles="$title";
	$discs="$disc";
	//$books="$book";
				}
	$metatitle="$titles";
	$metadesc="$discs";
	$metakyew="$kyew";
	$kyew= str_replace(', ', '</b></i></u> <u><i><b>', $book);
	$top="<h1><a href='#'>$metatitle</a></h1>";
	$tags="<u><i><b>$kyew</b></i></u>";
	$aply=1;
	} else {
		$q=str_replace('-', ' ', $q);
		$metatitle="$q Order Now | Contact Us";
		$metadesc="$q Order Now | Contact Us";
		$metakyew="$q, Order Now | Contact Us";
		$q=ucwords($q);
		$top="<h1><a href='#'>$q</a></h1>";
		$tags="<u><i><b>digital marketing</b></i></u> <u><i><b>digital marketing agency</b></i></u> <u><i><b>online marketing</b></i></u> <u><i><b>digital marketing company</b></i></u> <u><i><b>social media marketing agencies</b></i></u> <u><i><b>digital agencies</b></i></u> <u><i><b>performance marketing</b></i></u> <u><i><b>digital marketing strategy</b></i></u> <u><i><b>digital marketing website</b></i></u> <u><i><b>google digital marketing</b></i></u> <u><i><b>internet marketing</b></i></u> <u><i><b>digital marketing agency near me</b></i></u> <u><i><b>seo digital marketing</b></i></u> <u><i><b>digital media marketing</b></i></u> <u><i><b>online advertising</b></i></u> <u><i><b>traditional marketing</b></i></u> <u><i><b>digital marketing expert</b></i></u> <u><i><b>social media agencies</b></i></u> <u><i><b>digital marketing services</b></i></u> <u><i><b>ads google ads</b></i></u> <u><i><b>ads management</b></i></u> <u><i><b>facebook ads management</b></i></u> <u><i><b>advertisement</b></i></u>";
	}
?>

<?
$p=$metatitle;

$schematitle="$metatitle";
$schemadesc="$metadesc";

include ($_SERVER['DOCUMENT_ROOT'] . '/digital-marketing-agency-company-online-advertising/tm/hedall.php');
?>

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Order Now | Contact Us</h2>
          <ol>
            <li><a href="/digital-marketing-agency-company-online-advertising/">Home</a></li>
            <li>Order Now | Contact Us</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <p>
	<? if ($aply==1) { 
		if (!empty($book)) {
		?>
		<div class="col-lg-4 order-1 order-lg-2 hero-img" >
		<a href=""><img src="/digital-marketing-agency-company-online-advertising/assets/img/<? print $book; ?>" alt="digital marketing" class="img-fluid" width="300" height="300"></a> 
		</div>
		<? 
		} else {
			print "$article";  
			} 
	} ?>
	<?
	// send email
	if (isset($_POST["submit"])){
    $name       = @trim(stripslashes($_POST['name'])); 
    $email      = @trim(stripslashes($_POST['email'])); 
    $subject    = @trim(stripslashes($_POST['subject'])); 
    $message    = @trim(stripslashes($_POST['message'])); 
    $whatsapp   = @trim(stripslashes($_POST['whatsapp'])); 

    $email_from = $email;
	
    $email_to = 'info@revisebook.com';//replace with your email
	
    $body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Whatsapp No: ' . $whatsapp . "\n\n" . 'Message: ' . $message;

	$headers .= 'Return-Path: $email' . "\r\n";
	$headers .= 'From:' . "$email\r\n";
	$headers .= 'Cc:' . "\r\n";

//	mail($email_to,$subject,$body,$headers);

	if ((empty($_POST["name"])) || (empty($_POST["email"])) || (empty($_POST["subject"])) || (empty($_POST["whatsapp"])) || (empty($_POST["message"])) || (!filter_var($email, FILTER_VALIDATE_EMAIL)))
	{
	?>		
	<b><font size="4" color="#FF0000">Please fill in all fields boxes!</font></b><br>
	<b><font size="4" color="#FF0000">Please add correct and valid email address!</font></b>
	<? } else { 
	 	mail($email_to,$subject,$body,$headers);
	// send Reply email
	$to = "$email";
	$subject = "ReviseBook Digital Marketing";

	$message = "
Dear $name,

Thanks for your email massage | Booking

We have received your email massage | Booking we shall contact you as early as possible

Yours truly,
ReviseBook Digital Marketing
https://www.revisebook.com/
Whatsapp: +923004538321
Phone: 0092 300 4538321
Emial: info@revisebook.com
	";

	// More headers
	$headers .= 'Return-Path: info@revisebook.com' . "\r\n";
	$headers .= 'From: <info@revisebook.com>' . "\r\n";
	$headers .= 'Cc:' . "\r\n";

	mail($to,$subject,$message,$headers);	

		print "<script>";
		print " self.location='thankyou.php';";
		print "</script>";
		exit;	
	?>
              <div class="my-3">
                <div class="sent-message"><font size="4" color="#008000"><b>Your message has been sent. Thank you!<br>We shall contact you shortly</b></font></div>
              </div><br>			  
	<? } 
	}
	?>	
          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="contactus.php" method="post">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
			  <? if (isset($q)){ ?>
                <input type="text" value="Booking Package <? print "$p"; ?>" class="form-control" name="subject" id="subject" placeholder="Subject" required>
				<? } else { ?>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
				<? } ?>
              </div>
                <div class="form-group mt-3">
                  <input type="text" class="form-control" name="whatsapp" id="whatsapp" placeholder="Your Phone No | Whatsapp No" required>
                </div>
				<div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>

              <div class="text-center"><button name="submit" type="submit">Send Message</button></div>
            </form>

          </div>
		  <? if ($aply==1) { 
			  if (!empty($book)) {
				print "<p>$article<br>$article2</p>"; 
			  } else {
				  print "<p>$article2</p>"; 
			  }
			} ?>
        </p>
      </div>
    </section>
		  
  </main><!-- End #main -->
<?
include ($_SERVER['DOCUMENT_ROOT'] . '/digital-marketing-agency-company-online-advertising/tm/foot.php');
?>