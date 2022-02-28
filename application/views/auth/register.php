<div class="container">
  <section>
    <div class="text-center mt-3">
      <h1>Cadastro de Usuário</h1>
    </div>
  </section>

  <section>
    <div class="row mt-3">
      <div class="col-md-4 offset-md-4">

      <section>
            <div class="row">
              <div class="col">
                <?php if ($this->session->flashdata('success')) : ?>
                  <div class="alert alert-success alert-dismissible text-center fade show" role="alert">
                  <strong><i class="fas fa-check-circle"></i></strong> <?= $this->session->flashdata('success')  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <?php endif ?>
              <?php if ($this->session->flashdata('danger')) : ?>
                <div class="alert alert-danger alert-dismissible text-center fade show" role="alert">
                  <strong><i class="fas fa-check-circle"></i></strong> <?= $this->session->flashdata('danger')  ?>
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                    <?php endif ?>
                  </div>
                </div>
          </section>

        <div class="card">
          <div class="card-body">
          <form action="<?php echo base_url();?>register" method="post">
          <div class="mb-3">
              <label for="first_name" class="form-label">Nome</label>
              <input type="text" class="form-control" id="first_name" name="first_name">
              <?php echo form_error('first_name');?>
            </div>
            <div class="mb-3">
              <label for="last_name" class="form-label">Sobrenome</label>
              <input type="text" class="form-control" id="last_name" name="last_name">
              <?php echo form_error('last_name');?>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email">
              <?php echo form_error('email');?>
            </div>
            <div class="mb-3">
              <label for="senha" class="form-label">Senha </label>
              <input type="password" class="form-control" id="senha" name="senha">
              <?php echo form_error('senha');?>
            </div>
            <div class="mb-3">
              <label for="senha" class="form-label">Repetir Senha </label>
              <input type="password" class="form-control" id="senha" name="repetirsenha">
              <?php echo form_error('repetirsenha');?>
            </div>
            <div class="d-grid gap-2 mt-5">
              <button class="btn btn-primary btn-block" type="submit">Cadastrar</button>
            </div>
            <div class="d-block mt-4">
              <a href="<?php echo base_url()?>recovery" class="float-left">Recuperar Senha</a>
              <a href="<?php echo base_url()?>login" class="float-right">Tenho Registro</a>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>