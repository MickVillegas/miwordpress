<br>
<br>
<!--El footer de la web, el cual contiene el nombre de la web-->
<footer class = "text-light bg-danger pt-4 pb-4 ps-4">
    <h4>
<?php bloginfo('name'); ?>
</h4>
</footer>
<!--wp_footer() es un hook para imprir el código que WordPress necesita para agregar hojas de estilo y scripts al footer-->
<?php wp_footer(); ?>
    </body>
</html>