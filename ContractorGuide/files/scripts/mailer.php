<?php
include("config.php");
$job= isset($_REQUEST['job'])?$_REQUEST['job']:"";
$yname= isset($_REQUEST['yname'])?$_REQUEST['yname']:"";
$yemail= isset($_REQUEST['yemail'])?$_REQUEST['yemail']:"";
$fname= isset($_REQUEST['fname'])?$_REQUEST['fname']:"";
$femail= isset($_REQUEST['femail'])?$_REQUEST['femail']:"";
$emailSelf= isset($_REQUEST['emailSelf'])?$_REQUEST['emailSelf']:"";
$emailFriend= isset($_REQUEST['emailFriend'])?$_REQUEST['emailFriend']:"";
$message= isset($_REQUEST['message'])?$_REQUEST['message']:"";
$url= isset($_REQUEST['url'])?$_REQUEST['url']:"";
$bookmarks= isset($_REQUEST['bookmarks'])?$_REQUEST['bookmarks']:"";
$notes= isset($_REQUEST['notes'])?$_REQUEST['notes']:"";
$frmEmail=$yemail;
$toEmail=$femail;

if($job=="sendtofriend")
{
	$msg=$yname." (".$yemail.") sent you this article!<br><br><br><a href='".$url."'>Click here to view article</a><br><br>URL: <a href='".$url."'>".$url."</a><br><br>Your friend's message: ".$message;
	$subject=$yname." sent you an article!";	
}
else if($job=="sendcomment")
{
	$msg=$yname." (".$yemail.") left a comment on your digital magazine page located at the following URL!<br><br><br>".$url."<br><br><a href='".$url."'> Click here to view article page</a><br><br>Your reader's comment:<br><br>".$message;
	$subject=$yname." left you a comment!";
}
else if($job=="sendbookmarks")
{
	$msg=$yname." (".$yemail.") emailed you these bookmarks for the digital magazine located at the following URL!<br><br><a href='".$url."'>".$url."</a><br>".$bookmarks."<br>".$message;
	$subject=$yname." sent you bookmarks!";
}
else if($job=="sendnotes")
{
	$msg=$yname." (".$yemail.") emailed you these notes for the digital magazine located at the following URL!<br><br><br><a href='".$url."'>".$url."</a><br>".$notes."<br>".$message;
	$subject=$yname." sent you notes!";
}

$subject = stripslashes($subject);
$msg = stripslashes($msg);
	
if($job=="sendcomment")
{	
	echo SendEmail($frmEmail,$toEmail,$subject,$msg);
}
else
{
	If($emailSelf=="true")
		echo SendEmail($frmEmail,$frmEmail,$subject,$msg);

	If($emailFriend=="true")
		echo SendEmail($frmEmail,$toEmail,$subject,$msg);
}

?>
