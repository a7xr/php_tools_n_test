<html>
<script type="text/javascript" src="js/file_test_n_tools.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>

<?php 
require_once 'config_mmt.php';
// phpinfo();

$prompt = array(
	"option" => "-T",
	"values" => array(
		// "test001"
		// "test001"
		// "test_our_tools001"
		// "test_our_tools002"
		"test_conn_pg001"
	)
);

class Person{
	private $name;
	private $pname;

	function __construct(){
		print "this is a test";
	}
}

class Our_Tools {
	function test001(){
		print "inside our_tools";
	}

	function connection_pg(
		$host = "192.168.10.5",
		$db_name = "production",
		$user = "op1",
		$passw = "aa"
	){

	}

	public static function test002(){
		print "this is a public static_method";
	}

	public static function test_conn_pg001(
		$user = PG_10_5_PRODUCTION_USER,
		$pass = PG_10_5_PRODUCTION_PASS
	){
		// print $user;
		// exit();		
		try{
			$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
			// $a = "4";
			// print $a;

			// echo PG_10_5_PRODUCTION;
			// print $pg_10_5_production;
			$connProd = new PDO(PG_10_5_PRODUCTION_IP_DB, 
				$user, 
				$pass, 
				$pdo_options
			); 

			// simple_test();

			print "connex ok ok b";
			// return $connProd;
		}
		catch(Exception $e){
			print "Exception in connection to the database";
		}
	}
}

if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test001" )
){?>

	<script>
		myFunction();
	</script>

<?php
}
else if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test_person" )
){
	$person01 = new Person();
}

else if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test_our_tools001" )
){
	$our_tools = new Our_Tools();
	$our_tools->test001();
}
else if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test_our_tools002" )
){
	Our_Tools::test002();
}
else if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test_conn_pg001" )
){
	Our_Tools::test_conn_pg001();
}
else{
	print "non prise en charge";
}
?>

</html>
