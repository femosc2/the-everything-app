<?php
header("Access-Control-Allow-Origin: *");
$db = mysqli_connect("localhost", "USERNAME", "PASSWORD", "USERNAME");

$return = new ArrayObject();

if(isset($_FILES['media']['tmp_name'])){
	$path = $_POST['type']."/";
	$fileName = $path.rand().$_FILES['media']['name'];

	if(move_uploaded_file($_FILES['media']['tmp_name'], $fileName)){
		$title = "";
		if(isset($_POST['title'])){
			$title = $_POST['title'];
		}
		if(mysqli_query($db, "INSERT INTO media (title, type, path) VALUES ('".$title."', '".$_POST['type']."', '".$fileName."')")){
			$return['success'] = true;
			$return['path'] = $fileName;
			$return['message'] = "Fil uppladdad & sparad i db";
			echo json_encode($return);
		}else{
			$return['success'] = false;
			$return['path'] = $fileName;
			$return['message'] = "Fil uppladdad men inte sparad i db";
			echo json_encode($return);
		}

	}else{
		$return['success'] = false;
		$return['message'] = "Kunde inte ladda upp filen";
		echo json_encode($return);
	}
}

if(isset($_GET['action']) and $_GET['action'] == "getMedia"){
	if(isset($_GET['type'])){
		$res = mysqli_query($db, "SELECT * FROM media WHERE type = '".$_GET['type']."' ORDER BY id DESC");
	}else{
		$res = mysqli_query($db, "SELECT * FROM media ORDER BY id DESC");
	}
	$media = new ArrayObject();
	while($row = mysqli_fetch_assoc($res)){
		$m = new ArrayObject();
		$m['path'] = $row['path'];
		$m['type'] = $row['type'];
		$m['title'] = $row['title'];
		$m['timestamp'] = $row['timestamp'];
		//$m['id'] = $row['id'];
		$media['files'][] = $m;
	}
	echo json_encode($media);
}


?>
