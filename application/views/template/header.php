<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>JC Tecnology</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="#">
        <img src="<?php echo base_url()?>public/images/logo-white.png" width="100"alt="">
      </a>
       <!-- INICIO Menu Pagina principal -->
      <?php if (empty($this->session->userdata('username'))): ?>

      <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>">Como Funciona</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>">Serviços</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>">Institucional</a>
          </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
            Buscar
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>
        <ul class="navbar-nav">
          <li class="nav-item">         
            <a href="<?php echo base_url();?>login" class="btn btn-outline-light my-2 my-sm-0 ml-2">
              Minha Conta
            <i class="fa-solid fa-right-to-bracket"></i>
          </a>
          </li>
        </ul>
      </div>
       <!-- FIM Menu Pagina principal -->

        <!-- INICIO MENU AREA RESTRITA -->
       <?php else: ?>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>restrict/users">Dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>email">Configurações</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="<?php echo base_url();?>">Profile</a>
            </li>
          </ul>
            <form class="form-inline my-2 my-lg-0">
              <input class="form-control mr-sm-2" type="search" placeholder="Buscar..." aria-label="Search">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit">
                Buscar
                <i class="fa-solid fa-magnifying-glass"></i>
              </button>
            </form>
            <ul class="navbar-nav">
              <button type="button" class="btn btn-outline-light my-2 my-sm-0 ml-2" data-toggle="modal" data-target="#LogoutModal">
                Sair <i class="fa-solid fa-right-from-bracket"></i>
              </button>
              </li>
            </ul>
          </div>
        <?php endif; ?>
    </div>
  </nav>


  <!-- Modal Logout -->
  <div class="modal fade text-center" id="LogoutModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="text-center">Atenção</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Tem certeza que Gostaria de Sair?</p>
          <p>Para sair, Clique no botão <strong>SAIR</strong></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Cancelar</button>
          <a href="<?php echo base_url()?>logout" class="btn btn-sm btn-danger">Sair</a>
        </div>
      </div>
    </div>
  </div>