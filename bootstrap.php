<?php


spl_autoload_register(function( $class ) {
    $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $classPI = pathinfo($classFile);
    $classPath = strtolower($classPI['dirname']);

    include_once( 'application' . DIRECTORY_SEPARATOR . 'model' . 
            DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $classPI['filename'] . '.php' );
});


class View {
    
    function render($viewFileName, $viewData = array())
    {
        include 'application/view/base_header.html.php';
        include 'application/view/' . $viewFileName . '.html.php';
        include 'application/view/base_footer.html.php';
    }
}

$view = new View();
$viewData = array();