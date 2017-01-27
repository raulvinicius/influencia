<?php get_header(); ?>

<?php 
if(isset($_GET['b']) || isset($_GET['c']))
{
    get_template_part('page-busca');
}
else
{
    get_template_part('content-onde-encontrar');
}
?>

<?php get_footer(); ?>