<?php 
// phpinfo();

$prompt = array(
	"option" => "-T",
	"values" => array(
		// "test001"
		"test_person"
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

// $person01 = new Person();

if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test001" )
){
	print "this is very important test";
}
else if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test_person" )
){
	$person01 = new Person();
}
?>