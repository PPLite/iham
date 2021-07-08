<?php
include('security.php'); 
include('includes/header.php'); 
include('includes/navbar.php');
include('database/dbconfig.php')
?>

<!----SUMMON CAK MARKOV-->
<script src="js/markov.js"></script
<script>

var markov = new Markov();

markov.addStates([
  'Today is sunny',
  'Today is rainy',
  'The weather is sunny',
  'The weather for tomorrow might be rainy'
]);
 
// If you are generating numbers
markov.addStates([
  {
    state: 1,
    predictions: [
      2, 3
    ]
  },
  {
    state: 2,
    predictions: [1, 3]
  },
  {
    state: 3,
    predictions: [2, 1]
  }
]);

markov.train(3);

var text = markov.generate();
var states = markov.getStates();
</script>








<?php
include('includes/scripts.php');
include('includes/footer.php');
?>