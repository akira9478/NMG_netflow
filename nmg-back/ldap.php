<?php

// using ldap bind


// connect to ldap server
/*$ldapconn = ldap_connect("ldaps://ldap.cs.thu.edu.tw")
    or die("Could not connect to LDAP server.");

if ($ldapconn) {
    // binding to ldap server
    $ldapbind = ldap_bind($ldapconn, $ldaprdn, $ldappass);
    // verify binding
    if ($ldapbind) {
        echo "LDAP bind successful...";
    } else {
        echo "LDAP bind failed...";
    }
}
*/


	session_start();

//LDAP驗證登入
  
	
  	$ldapServer = 'ldaps://ldapserver';



  $val = str_replace(array('\\', '*', '(', ')'), array('\5c', '\2a', '\28', '\29'), $_POST['user']);
for ($i = 0; $i<strlen($val); $i++) {
    $char = substr($val, $i, 1);
    if (ord($char)<32) {
        $hex = dechex(ord($char));
        if (strlen($hex) == 1) $hex = '0' . $hex;
        $val = str_replace($char, '\\' . $hex, $val);
    }
}
  	$ldapid = $val;
	$ldaprdn  = 'uid='.$ldapid.',ou=,dc=';     // ldap rdn or dn
  $val2 = str_replace(array('\\', '*', '(', ')'), array('\5c', '\2a', '\28', '\29'), $_POST['passwd']);
for ($i = 0; $i<strlen($val2); $i++) {
    $char = substr($val2, $i, 1);
    if (ord($char)<32) {
        $hex = dechex(ord($char));
        if (strlen($hex) == 1) $hex = '0' . $hex;
        $val2 = str_replace($char, '\\' . $hex, $val2);
    }
}

	$ldappass = $val2;  // associated password
    // Handle login requests



    $ds = ldap_connect($ldapServer);
    ldap_set_option($ds,LDAP_OPT_PROTOCOL_VERSION, 3);
	ldap_set_option(NULL, LDAP_OPT_DEBUG_LEVEL, 7);
    if (ldap_bind($ds, $ldaprdn, $ldappass)) {
      // Successful auth
      $_SESSION['lastact'] = time();
      $_SESSION['username'] = $ldapid;
      $_SESSION['password'] = $ldappass;
      header("Location: index.php");
    } else {
      // Auth failed
      header("Location: login_f.php");
    }








?>
