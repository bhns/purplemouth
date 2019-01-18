<?php
  //iniciar sempre a sessão
  session_start();
 
  if (empty($_SESSION['carrinho'])) {
    // se não houver um carrinho definido, criamos um para exemplo
    $_SESSION['carrinho'] = array( 'cliente' => 'Maria' ,
                                   'data' => '3/11/2009',
                                   'produtos' => array( 'Laranjas' => 0.50,
								   'tomate' => 70.50,
								   'cebola' => 3.50,
								   'melao' => 9.50,
                                   'Talho' => 4.35
                                                      )
                                 );
  }
 
  // Imprimir conteúdos do carrinho de compras
  // construir uma tabela para os dados

  echo $_SESSION['carrinho']['cliente'];
   echo "<br>";
  echo $_SESSION['carrinho']['data'];
   echo "<br>";

 
  // percorrer todos os produtos
  $total = 0.0;
  foreach ($_SESSION['carrinho']['produtos'] as $p => $c) {
	    echo "<br>Total do P =";
  echo $p;
   echo "<br> total do c = ";
  echo $c;
  echo "<br>";
    echo "<li>$p - $c</li>";
    $total += $c;
  }
 
  echo "<br>Total do P =";
  echo $p;
   echo "<br> total do c = ";
  echo $c;
  echo "<br>";
  echo $total;
?>