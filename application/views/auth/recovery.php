<div class="container">
  <section>
    <div class="text-center mt-5">
      <h1>Página de Login</h1>
    </div>
  </section>

  <section>
    <div class="row mt-5 py-5">
      <div class="col-md-4 offset-md-4">
          <!-- Alert Messages -->
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
                    <?php endif; ?>
                  </div>
                </div>
          </section>
          <!-- end Alert Messages -->
        <div class="card">
          <div class="card-body">
          <form action="<?php echo base_url()?>recovery" method="post">
            <div class="mb-3">
              <label for="email" class="form-label">E-mail</label>
              <input type="email" class="form-control" id="email" name="email">
              <?php echo form_error('email');?>
            </div>
            <div class="d-grid gap-2 mt-5">
              <button class="btn btn-primary btn-block" type="submit">Enviar</button>
            </div>
            <div class="d-block mt-4">
              <a href="<?php echo base_url()?>login" class="float-left">Tenho Registro</a>
              <a href="<?php echo base_url()?>register" class="float-right">Cadastrar</a>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>