<?php get_header(); ?>

<?php 
if( get_query_var('busca', '') != '' || get_query_var('category_name', '') != '' )
{
    get_template_part('page-busca');
}
else
{
    get_template_part('content-onde-encontrar');
}
?>

<?php get_footer(); ?>