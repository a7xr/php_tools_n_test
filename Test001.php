<html>
<script type="text/javascript" src="js/file_test_n_tools.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>

<?php 
require_once 'config_mmt.php';
// phpinfo();

$prompt = array(
	"option" => "-T",	// this is going to contain all_tests which i_m going to do
	// "option" => "-h",
	"values" => array(
		// "test001"
		// "test001"
		// "test_our_tools001"
		// "test_our_tools002"
		// "test_conn_pg001" 		// when i wrote the first time to connect to pg_db with php
		// "test_formulaire001"		// my first test of php_form
		"test_ajax001"
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

	public static function test_ajax001() {
		?>
			<style>
				label{ width:70px; float:left; }
				form{ width:320px; }
				input, textarea{ width:200px;
				border:1px solid black; float:right; padding:5px; }
				input[type=submit] { cursor:pointer;
				background-color:green; color:#FFF; }
				input[disabled=disabled], input[disabled] {
				background-color:#d1d1d1; }
				fieldRow { margin:10px 10px; overflow:hidden; }
				failed { border: 1px solid red; }
			</style>

			<body>
				<h1>Validating form using Ajax</h1>
				<?php
				if ( !isset($_POST['url']) ){
				?>
					<form class="simpleValidation" method="post" action="Test001.php">
						<div class="fieldRow">
							<label>Title *</label>
							<input type="text" id="title" name="title"
							class="required" />
						</div>
						<div class="fieldRow">
							<label>Url</label>
							<input type="text" id="url" name="url"
							value="http://" />
						</div>
						<div class="fieldRow">
							<label>Labels</label>
							<input type="text" id="labels" name="labels" />
						</div>
						<div class="fieldRow">
							<label>Text *</label>
							<textarea id="textarea" class="required"></textarea>
						</div>
						<div class="fieldRow">
							<input type="submit" id="formSubmitter" value="Submit"/>
							<!-- disabled="disabled"  -->

						</div>
					</form>
					<script>
						var ajaxValidation = function(object){
						var $this = $(object);
						var param = $this.attr('name');
						var value = $this.val();
						$.get("ajax/inputValidation.php",
						{'param':param, 'value':value }, function(data) {
						if(data.status=="OK")
						validateRequiredInputs();
						else
						$this.addClass('failed');
						},"json");
						}
						var validateRequiredInputs = function (){
						var numberOfMissingInputs = 0;
						$('.required').each(function(index){
						var $item = $(this);
						var itemValue = $item.val();
						if(itemValue.length) {
						$item.removeClass('failed');
						} else {
						$item.addClass('failed');
						numberOfMissingInputs++;
						}
						});
						var $submitButton = $('#formSubmitter');
						if(numberOfMissingInputs > 0){
						$submitButton.attr("disabled", true);
						} else {
						$submitButton.removeAttr('disabled');
						}
						}

						$(document).ready(function(){
						var timerId = 0;
						$('.required').keyup(function() {
						clearTimeout (timerId);
						timerId = setTimeout(function(){
						ajaxValidation($(this));
						}, 200);
						});
						});
					</script>

				</body>
		<?php
			}else{
				print "set" . $_POST['url'];
			}
	}

	public static function test_formulaire001(){	
		if ( !isset($_POST['prenom']) ){
			?>
				<form method="post" action="Test001.php">
					<p>
						<input type="text" name="prenom" />
						<input type="submit" value="Valider" />
					</p>
				</form>
			<?php
		}else{
			print "Le prénom que vous avez entree est: " . $_POST['prenom'];
		}
	}
	public static function usage(){
		?>
		<html>
			<body>
				<p>
					<ul>
						<li style="color: blue">
							-h
						</li>
						Pour que cette page d'aide va s'afficher

						<li style="color: blue">
							-T test_conn_pg001
						</li>
						Pour la faire une test de connection au PostGresSQL

						<li style="color: blue">
							-T test_formulaire001
						</li>
						Pour faire une test de Formulaire avec Php
					</ul>

				</p>
			</body>
		</html>
		<?php
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
			$connProd = new PDO(
				PG_10_5_PRODUCTION_IP_DB, 
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
	($prompt["option"] == "-h") 
	// && ($prompt["values"][0] == "test_person" )
){
	Our_Tools::usage();
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
else if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test_formulaire001" )
){
	Our_Tools::test_formulaire001();
}
else if (
	($prompt["option"] == "-T") 
	&& ($prompt["values"][0] == "test_ajax001" )
){
	Our_Tools::test_ajax001();
}
else{
	print "non prise en charge";
}
?>

</html>
