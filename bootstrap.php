<?php

/**
 * Also loader for classes 
 */
spl_autoload_register(function( $class ) {
    $classFile = str_replace('\\', DIRECTORY_SEPARATOR, $class);
    $classPI = pathinfo($classFile);
    $classPath = strtolower($classPI['dirname']);

    include_once( 'application' . DIRECTORY_SEPARATOR . 'model' . 
            DIRECTORY_SEPARATOR . $classPath . DIRECTORY_SEPARATOR . $classPI['filename'] . '.php' );
});

/**
 *  Very very basic view object
 */
class View {
    
    /**
     * Simply includes header, footer and the file specified from the view
     * folder. Also asign the 2nd paramter as viewData which can be called
     * inside the view.
     * 
     * @param string $viewFileName The name of the file (without ext)
     * @param array $viewData Any values used in the view
     */
    function render($viewFileName, $viewData = array())
    {
        include 'application/view/base_header.html.php';
        include 'application/view/' . $viewFileName . '.html.php';
        include 'application/view/base_footer.html.php';
    }
}

$view = new View();
$viewData = array();