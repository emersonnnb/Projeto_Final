<!DOCTYPE html>
<html lang="pt">
<head>
  <title>HomeShop</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="css/estilo2.css">
  <style>
    /* Remove the navbar's default margin-bottom and rounded borders */ 
    .navbar {
      margin-bottom: 0;
      border-radius: 0;
    }

    /*retirando cor do hiperlink comprar*/
    A:link {text-decoration:none; }
    A:visited {text-decoration:none;}
    A:active {text-decoration:none;}
    A:hover {text-decoration:none;}
    
    
    /* Add a gray background color and some padding to the footer */
    footer {
      background-color: #f2f2f2;
      padding: 25px;
    }
    
  .carousel-inner img {
      width: 100%; /* Set width to 100% */
      margin: auto;
      min-height:200px;
  }

  /* Hide the carousel text when the screen is less than 600 pixels wide */
  @media (max-width: 600px) {
    .carousel-caption {
      display: none; 
    }
  }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" id="logo" href="index.php"> <img src="img/logop.png"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item">
        <a class="nav-link" href="comprar.php">Produtos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="fale_conosco.php">Fale conosco</a>
      </li>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Categoria
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="produtocat.php">Ferramentas</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="produtocat2.php">Novidades</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="produtocat3.php">Embarcados</a>
        </div>
      </li>

    </ul>
      <ul class="nav navbar-nav navbar-right">

        <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user-circle"></i>
          Minha Conta
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="login.php"><i class="fa fa-user"></i> login</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="cliente.php"><i class="fa fa-user-plus"></i>Cadastrar</a>
        </div>
      </li>

        <li>
        <a class="nav-link" href="carrinho.php"><i class="fa fa-cart-arrow-down"></i>
        </span>Carrinho</a>
        
	       <li>
         <a class="nav-link" href="admin/index.php">Restrito</a></li>
    </ul>

</nav>



