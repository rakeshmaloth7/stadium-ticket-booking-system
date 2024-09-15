 



<?php
$dbserver = "localhost"; // localhost
$dbuser = "root";
$dbpwd = "";
$dbname = "ticket_stadium";

$connection = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);

if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

function my_iud($query)
{
    global $connection;
    $result = $connection->query($query);
    if ($result) {
        $n = $connection->affected_rows;
    } else {
        $n = -1; // An error occurred
    }
    return $n;
}

function my_select($query)
{
    global $connection;
    $rs = $connection->query($query);
    return $rs;
}

function my_one($query)
{
    global $connection;
    $rs = $connection->query($query);
    $row = $rs->fetch_array();
    return $row[0];
}

// Rest of your functions remain unchanged

function verifyuser()
{
    // ...
    $u="";
$p="";
if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
{
$u=$_COOKIE['cun'];
$p=$_COOKIE['cpwd'];
}
else
{
if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
{
$u=$_SESSION['sun'];
$p=$_SESSION['spwd'];
}
}
$query="select count(*) from siteuser where username='$u' and pwd='$p'";
$n=my_one($query);
if($n==1)
{
return true;
}
else
{
return false;
}
}

function fetchusername()
{
    // ...
    $u="";
$p="";
if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
{
$u=$_COOKIE['cun'];
$p=$_COOKIE['cpwd'];
}
else
{
if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
{
$u=$_SESSION['sun'];
$p=$_SESSION['spwd'];
}
}
$query="select count(*) from siteuser where username='$u' and pwd='$p'";
$n=my_one($query);
if($n==1)
{
return $u;
}
else
{
return false;
}
}

function fetchrole()
{
    // ...
    $u="";
$p="";
if(isset($_COOKIE['cun']) && isset($_COOKIE['cpwd']))
{
$u=$_COOKIE['cun'];
$p=$_COOKIE['cpwd'];
}
else
{
if(isset($_SESSION['sun']) && isset($_SESSION['spwd']))
{
$u=$_SESSION['sun'];
$p=$_SESSION['spwd'];
}
}
$query="select count(*) from siteuser where username='$u' and pwd='$p'";
$n=my_one($query);
if($n==1)
{
$query="select role from siteuser where username='$u' and pwd='$p'";
$role=my_one($query);
return $role;
}
else
{
return false;
}
}

// Don't forget to close the connection when you're done
// $connection->close();
?>
