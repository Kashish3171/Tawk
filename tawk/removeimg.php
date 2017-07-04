<?php
if(isset($_GET['dirname']))
{$d=$_GET['dirname'];


if(unlink($d."/pp.jpg"))
echo 'Your Profile Pic is successfully removed';
else
echo 'try later';	
}
?>