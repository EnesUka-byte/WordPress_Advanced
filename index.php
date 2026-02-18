<?php get_header(); ?>

<main>

  <nav>
     


  <h2>Hello Digital School Students</h2>
  <p>This is our custom wordpress theme</p>
</main>

<?php
if(have_posts()):  ?>
<?php while(have_posts()) : the_post()?>


<article>
   <h2>
    <?php the_title();?>
</h2>

<p>

<p>Posted on <?php the_date();?>
at <?php the_time();?>


</p>

 <?php the_content();?>



</article>

 <?php endwhile;?>
 <?php endif;?>


<?php get_footer(); ?>


 


