# README

## Instructions
 - Go to index.php then click on one of the links in the header.
 - Start playing the game.


## Implementation
 - Create a simple folder structure to separate business logic and views. Almost MVC but without the router or full OOP or proper controllers/action and with a very stripped down (not best practice) bootstrap.
 - Bootstrap has a simple spl autoloader and a view object class with it being instantiated and set to a global variable ($view) again not best practice but quick. Also created a $viewData variable to be passed information to views (again not best practice but quick and easy).
 - This is where I spent the time doing things properly. Namespace classes with interfaces for type of game (two player) and type of user (Human or Machine) and abstract classes/method to enable games to be extendable and still work with existing code.
 - Unit tests for all model methods. 
 - Dockblock for all methods
 - Class const to ensure future developers understand and can reference string to avoid mistyping.
 - There are a couple of methods which might look out of place however were purposely used because of design decisions (one static method in RockPaperScissors and get/set player1/2). It mainly revolves around ensuring the code is extendable.


## Improvements
 - Spend time building a proper MVC with router and proper view object.
 - HTML: Remove inline styles and move to stylesheet, change title for each page and meta description. Possibly add ajax 
 - Create behat tests for the most important pages
 - Save the game result into cookie, session, database for a leader board or possible a war games easter egg e.g. if a user looses 10 times in a row print the message "The only winning move is not to play. How about a nice game of chess?"