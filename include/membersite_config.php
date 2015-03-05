<?PHP
require_once("./include/fg_membersite.php");

$fgmembersite = new FGMembersite();

//Provide your site name here
$fgmembersite->SetWebsiteName('http://synergyspace309.herokuapp.com');

//Provide the email address where you want to get notifications
$fgmembersite->SetAdminEmail('bathalex210@gmail.com');

//Provide your database login details here:
//hostname, user name, password, database name and table name
//note that the script will create the table (for example, fgusers in this case)
//by itself on submitting register.php for the first time
$fgmembersite->InitDB(/*hostname*/'ec2-50-19-249-214.compute-1.amazonaws.com',
                      /*username*/'joblkqktbkwsnj',
                      /*password*/'REyBIR2hC2G-vSSYBgud-hPlgf',
                      /*database name*/'d4ppai3ve17g1b',
                      /*table name*/'users');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>