<?php
session_start();
if ($_SESSION['firstname'])
{
echo "Welcome, ".$_SESSION['firstname']."!";?><br>
<?php
echo "<a href='logout.php'>Log Out</a>";
}
else
	die("You must log in to view this page. <a href='index.php'>Click here</a> to log in.");
?>