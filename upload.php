<?php
	$tmp_file = $_FILES['image']['tmp_name'];
	$filename = $_FILES['image']['name'];

	$proyecto=$_REQUEST["proyecto"];
	$dni=$_REQUEST["dni"];
	$entidad=$_REQUEST["entidad"];	
	$establecimiento=$_REQUEST["establecimiento"];
	$visita=$_REQUEST["visita"];
	

/*	$grupo="G18001";
	$programa="P001";
	$curso="1";*/

	

/*	if(!is_dir("upload-folder/")){

		mkdir("upload-folder/", 0777);
	} 
        
	move_uploaded_file($tmp_file, "upload-folder/". $filename);



	if(!is_dir("upload-folder/$programa/$grupo/$curso/")){

		mkdir("upload-folder/$programa/", 0777);
		mkdir("upload-folder/$programa/$grupo/", 0777);
		mkdir("upload-folder/$programa/$grupo/$curso/", 0777);
	} 
*/

	if(!is_dir("upload-folder/$proyecto/$dni/$entidad - $establecimiento/$visita")){

		mkdir("upload-folder/$proyecto/", 0777);
		chown("upload-folder/$proyecto/", "altargetperu");
		mkdir("upload-folder/$proyecto/$dni/", 0777);
		chown("upload-folder/$proyecto/$dni/", "altargetperu");
		mkdir("upload-folder/$proyecto/$dni/$entidad - $establecimiento/", 0777);
		chown("upload-folder/$proyecto/$dni/$entidad - $establecimiento/", "altargetperu");
		mkdir("upload-folder/$proyecto/$dni/$entidad - $establecimiento/$visita", 0777);
		chown("upload-folder/$proyecto/$dni/$entidad - $establecimiento/$visita", "altargetperu");
		
	} 
        
	move_uploaded_file($tmp_file, "upload-folder/$proyecto/$dni/$entidad - $establecimiento/$visita/". $filename);
	chown("upload-folder/$proyecto/$dni/$entidad - $establecimiento/$visita". $filename, "altargetperu");


?>

<!-- //https://stackoverflow.com/questions/24114676/git-error-failed-to-push-some-refs-to -->

