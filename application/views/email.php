
<div class="container">
  <section>
    <div class="text-center mt-3">
      <h1>Pagina de Configurações</h1>
    </div>
  </section>
 <hr style="border: #c3c3c3 solid 1px">
 
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
            <?php endif ?>
          </div>
        </div>
  </section>
  <!-- end Alert Messages -->

 <div class="row">
   <div class="col">
     <div class="card">
       <div class="card-header">Configurações</div>
       <div class="card-body">
         <!-- Card Body -->
         <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">E-mail</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Profile</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Contact</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <!-- Servidor SMTP -->
            <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <div class="">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-sm mr-2 mt-2 mb-2" data-toggle="modal" data-target="#smtpModal">
                  <i class="fa-solid fa-square-plus"></i> Add
                </button>
              </div>
              <div class="row">
                <div class="col-md-8">
                  <div class="table-responsive">
                    <table class="table table-hover table-sm">
                      <thead class="thead-dark">
                        <tr>
                          <th scope="col">Servidor</th>
                          <th scope="col">Conta</th>
                          <th scope="col">Porta</th>
                          <th scope="col">Autenticação</th>
                          <th scope="col">Opções</th>
                        </tr>
                      </thead>
                      <tbody>
                          <tr>
                            <?php if($rows > 0 ): ?>
                              <?php foreach($rows as $row): ?>
                                <td><?= $row->smtp_host ?></td>
                                <td><?= $row->smtp_user ?></td>
                                <td><?= $row->smtp_port ?></td>
                                <td><?= $row->smtp_crypto ?></td>
                                <td colspan="">
                                  <a href="" class="btn btn-success btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                  <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete">
                                    <i class="fa-solid fa-trash-can"></i>
                                  </a>
                                </td>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <td colspan="5" class="text-center">Nenhum servidor cadastrado</td>
                            <?php endif; ?>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="col-md-4">
                  <form action="<?php echo base_url();?>restrict/email/send_email" method="post">
                    <div class="form-group">
                      <label for="send_email">Teste de E-nvio de E-mail</label>
                      <input type="email" class="form-control" id="send_email" name="send_email" placeholder="Enter email">
                      <?php echo form_error('send_email');?>
                    </div>
                    <button type="submit" class="btn btn-success btn-sm btn-block">Enviar</button>
                  </form>
                </div>
              </div>
            </div>
            <!-- End Servidor SMTP -->
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
            <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">...</div>
          </div>
         <!-- End Card Body -->
       </div>
       <div class="card-footer">Criado by Lexlam Electronics Of Brazil &copy</div>
     </div>
   </div>
 </div>
</div>

<!-- Modal -->
<div class="modal fade" id="smtpModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="smtpModal">Cadastrar Servidor de SMTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="<?= base_url();?>restrict/email/resgister_server" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="smtp_host">SMTP Server Address.</label>
                <input type="text" class="form-control form-control-sm" id="smtp_host" name="smtp_host">
                <?php echo form_error('smtp_host');?>
            </div>
            <div class="form-group col-md-6">
                <label for="smtp_user">SMTP Username.</label>
                <input type="email" class="form-control form-control-sm" id="smtp_user" name="smtp_user">
                <?php echo form_error('smtp_user');?>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="smtp_pass">SMTP Password.</label>
                <input type="password" class="form-control form-control-sm" id="smtp_pass" name="smtp_pass">
                <?php echo form_error('smtp_pass');?>
            </div>
            <div class="form-group col-md-6">
                <label for="passconf">Repeat-Password</label>
                <input type="password" class="form-control form-control-sm" id="passconf" name="passconf">
                <?php echo form_error('passconf');?>
            </div>
          </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="smtp_port">SMTP Port.</label>
                <input type="text" class="form-control" id="smtp_port" name="smtp_port">
                <?php echo form_error('smtp_port');?>
              </div>
              <div class="form-group col-md-6">
                <label for="smtp_crypto">SMTP Encryption</label>
                <select id="smtp_crypto" class="form-control" name="smtp_crypto">
                <?php echo form_error('smtp_crypto');?>
                  <option selected>AUTO</option>
                  <option value="ssl">SSL</option>
                  <option value="tls">TLS</option>
                </select>
            </div>            
          </div>    
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary btn-sm">Cadastrar</button>
          </div>
      </form>
    </div>
  </div>
</div>

<!-- MODAL DELETE E-MAIL -->
<div class="modal fade" id="delete" tabindex="-1" aria-labelledby="delete" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info btn-sm" data-dismiss="modal">Cancelar</button>
        <a href="<?= base_url('restrict/email/delete/') . $row->smtp_id ?>" class="btn btn-danger btn-sm">Confirmar</a>
      </div>
    </div>
  </div>
</div>