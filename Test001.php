<html>
<script type="text/javascript" src="js/file_test_n_tools.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>

<?php 
// phpinfo();

$prompt = array(
	"option" => "-T",
	"values" => array(
		// "test001"
		"test001"
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
?>

</html>
