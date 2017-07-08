<?php
class add_subcategory{
	public function fn_add_subcategory(){
		$uploadresult="Subcategorey added Sucessfully";
		if(isset($_POST["submit"])){	
			$category=$_POST["category"];
			$subcategory=$_POST["subcategory"];
			include 'phpmongodb/vendor/autoload.php';
			$conn = new MongoDB\Client;
			$gp = $conn->gp;
			$content=$gp->category;
			$document = (array(
								"name" => $category,
								"category" => $subcategory,
							)	
						);
			$content->insertOne($document);
		}
		return $uploadresult;
	} 
}
