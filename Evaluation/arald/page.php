<?php 
// on inclus le fichier header.php
get_header(); 
?>

<!-- Affichage de la page -->
<?php while ( have_posts() ) : the_post(); ?>
	<?php //the_ID(); ?>
	<?php //the_title(); ?>
	<?php the_post_thumbnail(); ?>
	<?php the_content(); ?>
<?php endwhile; ?>


<?php 
// on inclus le fichier sidebar.php (widget)
//get_sidebar(); 
?>

<?php 
// on inclus le fichier footer.php
get_footer(); 
?>