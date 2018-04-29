<?php
if (!file_exists('private'))
	mkdir('private');

if (!file_exists('img'))
	mkdir('img');

if (!file_exists('private/passwd'))
{
	$fd = fopen("private/passwd", "w");
	fclose($fd);

	$admin = array(
		"login" => "admin",
		"first" => "admin",
		"last" => "admin",
		"passwd" => hash("sha256", "admin"),
		"email" => "admin@admin.com",
		"address" => "admin",
		"type" => "admin"
	);
	file_put_contents("private/passwd", serialize(array($admin)));
}

function generate_random_id()
{
	$i = 0;
	$res = "";

	while ($i < 12)
	{
		if ($i % 2 == 0)
			$char = chr(rand(97, 122));
		else
			$char = rand(0, 9);
		$res = $res.$char;
		$i++;
	}
	return $res;
}

if (!file_exists('private/categories'))
{
	$fd = fopen("private/categories", "w");
	fclose($fd);
	file_put_contents("private/categories", serialize(array("Ulei de Masline","Ulei de Palmier","Ulei de Susan")));
}


$p1 = array(
	"id" => generate_random_id(),
	"name" => "Ulei de Masline",
	"photo" => "img/masline.jpg",
	"description" => "Ulei de Masline extra virgin",
	"quantity" => 20,
	"price" => 30,
	"category" => "Ulei de Masline"
);

$p2 = array(
	"id" => generate_random_id(),
	"name" => "Ulei de Palmier",
	"photo" => "img/palmier.png",
	"description" => "Ulei de Palmier BIO 100%",
	"quantity" => 50,
	"price" => 100,
	"category" => "Ulei de Palmier"
);

$p3 = array(
	"id" => generate_random_id(),
	"name" => "Ulei de Susan",
	"photo" => "img/susan.png",
	"description" => "Ulei de Susan din Patagonia",
	"quantity" => 20,
	"price" => 200,
	"category" => "Ulei de Susan"
);

if (!file_exists('private/products'))
	file_put_contents("private/products", serialize(array($p1, $p2, $p3)));

header('Location: login.php');

?>
