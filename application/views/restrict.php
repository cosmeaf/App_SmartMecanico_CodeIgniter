<div class="container">
  <!-- Alert Messages -->
  <section>
    <div class="row mt-5 py-5">
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
  <!-- end Alert Messages -->
  <section>
    <div class="text-center">
      <h1>Área Restrita</h1>
      <p> Bem Vindo </p>
      <p>Você esta logado como(a): <strong><?= $this->session->userdata('username');?> </strong></p>
    </div>
  </section>
</div>