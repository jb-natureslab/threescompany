<!doctype html>
<html lang="en-gb">

<head>
	<meta charset="utf-8">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<?php
	if (perch_get('s')) {
		perch_blog_post_meta(perch_get('s'));
	} else {
	?>
		<title><?php perch_pages_title(); ?></title>
		<?php perch_page_attributes(); ?>
	<?php
	}
	?>

	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="preconnect" href="https://kit.fontawesome.com" crossorigin />

	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,400;0,700;1,400;1,700&display=swap" media="print" onload="this.media='all'" />
	
	<link href="/assets/fonts/fontawesome/css/all.css" rel="stylesheet">
	
	<link rel="stylesheet" href="/assets/css/reset.css?v=<?php echo rand(); ?>">
	<link rel="stylesheet" href="/assets/css/typography.css?v=<?php echo rand(); ?>">
	<link rel="stylesheet" href="/assets/css/styles.css?v=<?php echo rand(); ?>">
</head>

<body>	
	<section class="background_gradient minimal">
		<div>
			<p><i class="fa fa-phone"></i> <a href="tel:+44(0)1947 602 346">+44(0)1947 602 346</a></p>
			<p class="right"><i class="fa fa-envelope"></i> <a href="mailto:hello@threescompany.info">hello@threescompany.info</a></p>
		</div>
	</section>
	<section class="background_white">
		<div>
			<header>
		        <?php
			        perch_content('Header');
			    ?>
				<nav>
					<button class="menu">Menu</button>
		        <?php
			        perch_pages_navigation();
		        ?>
				</nav>
			</header>
		</div>
	</section>

	<main>