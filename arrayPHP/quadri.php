<html>
<head>
<title>Quadri</title>
</head>
<body>
<?php
  //DICHIARAZIONE DEL NOSTRO PRIMO VETTORE

  $quadri1 = array('monnalisa', 'ragazza con con il turbante', 'ninfee', 'guernica', 'il bacio');
  $quadri2 = ['monnalisa', 'ragazza con con il turbante', 'ninfee', 'guernica', 'il bacio'];

  //print_r($quadri1);
  //print_r($quadri2);

  //vettore associativo
  $autoreQuadri = [
      'Vincent van Gogh' => 'notte stellata',
      'Leonardo da Vinci' => 'La Gioconda',
      'Jan Vermeer' => 'Ragazza col turbante',
      'Claude Monet' => 'Ninfee'
      ];

     // print_r($autoreQuadri);

  //quarto metodo
  
  $quadri3[0] = 'Notte stellata';
  $quadri3[1] = 'La Gioconda';
  $quadri3[2] = 'Ragazza col turbante';
  $quadri3[3] = 'Nifee';

  //print_r($quadri3);


  
 

  echo "Array quadri 1 :" . '<br>';
  foreach ($quadri1 as $item){
    
    echo $item . '<br>';
  }

  '<br>';

  echo "Array quadri 2 :" . '<br>';
  foreach ($quadri2 as $item){
    
    echo $item . '<br>';
  }


  '<br>';

  echo "Array quadri 3 :" . '<br>';
  foreach ($quadri3 as $item){
    
    echo $item . '<br>';
  }

  '<br>';


  echo "Array quadri Associativi :" . '<br>';
  foreach ($autoreQuadri as $item){
    
    echo $item . '<br>';
  }
  
  '<br>';

?>
</body>
</html>