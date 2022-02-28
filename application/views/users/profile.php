<style>
.circular img { 
  width: 150px;
  height: 150px;
  margin-top: 15px;
  margin-bottom: 15px;
  margin-left: 15px;
  border-radius: 50%; 
  border: solid 1px #000000;
}
</style>
<div class="container">
  <section>
    <div class="text-center mt-3">
      <h1>Painel Administrativo</h1>
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
       <div class="card-header">Painel Administrativo</div>
       <div class="card-body">
         <!-- Card Body -->   
         <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-selected="false">Profile</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile">Serviço Agendados</a>
            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-selected="false">Endereço</a>
            <a class="nav-link" id="nav-carro-tab" data-toggle="tab" href="#nav-carro">Carro</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <!-- Star Profile Nav -->
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <!-- Started Nav -->
            <div class="row mb-5 pb-5">
              <div class="col-md-5 mt-5">
                <div class="card" style="background-color:LightGray">
                  <div class="row no-gutters">
                    <div class="col circular">
                      <img src="<?php echo base_url()?>uploads/profile/profile-002.jpg" alt="User Profile">
                    </div>
                    <div class="col circular">
                      <div class="card-body">
                        <h5 class="card-title">Daina Alves</h5>
                        <p class="card-text">Veículo: <strong>LQV-1965</strong></p>
                        <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col mt-5">
                <form>
                  <div class="form-group">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control form-control-sm" id="first_name" readonly>
                  </div>
                  <div class="form-group">
                    <label for="last_name">Sobrenome</label>
                    <input type="text" class="form-control form-control-sm" id="last_name" readonly>
                  </div>
                  <div class="form-group">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control form-control-sm" id="email" readonly>
                  </div>
                  <button type="button" class="btn btn-block btn-primary btn-sm mr-2 mt-2 mb-2" data-toggle="modal" data-target="#AltInfoPessoalModal">Alterar Dados</button>
                </form>
              </div>
              <div class="col mt-5">
                <form>
                  <div class="form-group">
                    <label for="actual_password">Senha Atual</label>
                    <input type="password" class="form-control form-control-sm" id="actual_password" readonly>
                  </div>
                  <div class="form-group">
                    <label for="new_password">Nova Senha</label>
                    <input type="password" class="form-control form-control-sm" id="new_password" readonly>
                  </div>
                  <div class="form-group">
                    <label for="repeat_password">Reetir Senha</label>
                    <input type="password" class="form-control form-control-sm" id="repeat_password" readonly>
                  </div>
                  <button type="button" class="btn btn-block btn-primary btn-sm mr-2 mt-2 mb-2" data-toggle="modal" data-target="#AlterarSenhaModal">Alterar Senha</button>
                </form>
              </div>
            </div>
          </div>
          <!-- End Profile Nav -->
          <!-- Started Service Nav -->
          <div class="tab-pane fade" id="nav-profile">
            <div class="">
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-sm mr-2 mt-2 mb-2" data-toggle="modal" data-target="#ServiceModal">
                <i class="fa-solid fa-square-plus"></i> Agendar Novo Serviço
              </button>
            </div>
            <div class="row mb-5 pb-5">         
              <div class="col">
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-sm">
                    <thead class="thead-dark">
                      <tr>
                        <th scope="col">Serviço</th>
                        <th scope="col">Data do Serviço</th>
                        <th scope="col">Status</th>
                        <th scope="col">Opções</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th>Troca de Óleo</th>
                        <td>22/01/2021</td>
                        <td class="badge badge-success">Executado</td>
                        <td colspan="3">
                          <a href="#" class="btn btn-primary btn-small btn-sm"> <i class="fa-solid fa-eye"></i> </a>
                          <a href="#" class="btn btn-success btn-small btn-sm"> <i class="fa-solid fa-pen-to-square"></i> </a>
                          <a href="#" class="btn btn-danger btn-small btn-sm"> <i class="fa-solid fa-power-off"></i> </a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>

            </div>
          </div>
          <!-- End Services Nav -->

          <!-- Start Endereço Nav -->
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">
            <div class="row mt-5">
              <div class="col">
              <form>
                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control form-control-sm" id="inputEmail4">
                  </div>
                  <div class="form-group col-md-5">
                    <label for="logradouro">Endereço</label>
                    <input type="text" class="form-control form-control-sm" id="logradouro">
                  </div>
                  <div class="form-group col-md-3">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control form-control-sm" id="complemento">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="numero">Numero</label>
                    <input type="text" class="form-control form-control-sm" id="numero">
                  </div>
                </div>

                <div class="form-row">
                  <div class="form-group col-md-2">
                    <label for="inputCity">Cidade</label>
                    <input type="text" class="form-control form-control-sm" id="inputCity">
                  </div>
                  <div class="form-group col-md-2">
                    <label for="inputState">Estado</label>
                    <select id="inputState" class="form-control form-control-sm">
                      <option selected>Escolha estado...</option>
                      <option>...</option>
                    </select>
                  </div>
                </div>
                <div class="d-inline">
                  <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
                  <a href="#" class="btn btn-sm btn-success">Editar</a>
                </div>
              </form>
              </div>
            </div>
          
          
          
          
          </div>
          <!-- End Endereço Nav -->
          
           <!-- Start Cadastrar Carro Nav -->
          <div class="tab-pane fade" id="nav-carro">
            <div class="row mt-5">
              <div class="col">
                <form>
                  <div class="form-row">
                    <div class="form-group col-md-2">
                      <label for="inputEmail4">Placa</label>
                      <input type="email" class="form-control" id="inputEmail4">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputPassword4">Marca</label>
                      <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputPassword4">Modelo</label>
                      <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputPassword4">Ano</label>
                      <input type="password" class="form-control" id="inputPassword4">
                    </div>
                    <div class="form-group col-md-2">
                      <label for="inputPassword4">Kilômetros</label>
                      <input type="password" class="form-control" id="inputPassword4">
                    </div>
                  </div>
                  <button type="submit" class="btn btn-sm btn-primary">Cadastrar</button>
                  <a href="#" class="btn btn-sm btn-success">Editar</a>
                </form>
              </div>
            </div>
          </div>
           <!-- End Cadastrar Carro Nav -->
        </div>
         <!-- End Card Body -->
       </div>
       <div class="card-footer">Criado by Lexlam Electronics Of Brazil &copy</div>
     </div>
   </div>
 </div>
</div>

<!-- Modal Alterar Dados Pessoais -->
<div class="modal fade" id="AltInfoPessoalModal" tabindex="-1" aria-labelledby="UserMAltInfoPessoalModalodal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="UseAltInfoPessoalModalrModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Fechar</button>
        <a href="#" class="btn btn-sm btn-success">Atualizar</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Alterar Dados Pessoais -->

<!-- Modal Alterar Dados Pessoais -->
<div class="modal fade" id="AlterarSenhaModal" tabindex="-1" aria-labelledby="AlterarSenhaModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="AlterarSenhaModal"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Fechar</button>
        <a href="#" class="btn btn-sm btn-success">Atualizar</a>
      </div>
    </div>
  </div>
</div>
<!-- Modal Alterar Dados Pessoais -->


<!-- Modal Cadastrar Serviço-->
<div class="modal fade" id="ServiceModal" tabindex="-1" aria-labelledby="ServiceModal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="ServiceModal">Agendar Serviço</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-info" data-dismiss="modal">Fechar</button>
        <a href="#" class="btn btn-sm btn-primary">Cadastrar</a>
      </div>
    </div>
  </div>
</div>
<!-- End Modal Cadastrar Serviço-->

