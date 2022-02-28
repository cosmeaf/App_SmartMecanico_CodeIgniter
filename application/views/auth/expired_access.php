<div class="container">
  <section>
    <div class="row mt-5 py-5">
      <div class="col-md-12">
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
      </div>
    </div>
  </section>

  <section>
    <div class="row text-center">
      <div class="col">
        <h1>OPS! Algo Aconteceu.</h1>
        <h2>Pagina expirada...</h2>
        <p>Será necessário recuperar a senha novamente</p>
        <a href="<?php echo base_url();?>recovery" class="btn btn-danger btn-sm">Clique Aqui</a>
      </div>
    </div>
  </section>
</div>

