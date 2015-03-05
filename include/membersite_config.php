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
$fgmembersite->InitDB(/*hostname*/'us-cdbr-iron-east-02.cleardb.net',
                      /*username*/'b4792c8bf80f6e',
                      /*password*/'0254f847',
                      /*database name*/'heroku_4a908832174bf62',
                      /*table name*/'users');

//For better security. Get a random string from this link: http://tinyurl.com/randstr
// and put it here
$fgmembersite->SetRandomKey('qSRcVS6DrTzrPvr');

?>