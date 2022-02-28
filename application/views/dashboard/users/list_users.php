
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
            <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Profile</a>
            <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Serviços</a>
            <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Endereço</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="row">
              <div class="col">
                <div class="table-responsive">   
                  <table class="table table-striped table-hover table-sm">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">First</th>
                        <th scope="col">Last</th>
                        <th scope="col">Handle</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                      </tr>
                      <tr>
                        <th scope="row">2</th>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                      </tr>
                      <tr>
                        <th scope="row">3</th>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...</div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
        </div>
         <!-- End Card Body -->
       </div>
       <div class="card-footer">Criado by Lexlam Electronics Of Brazil &copy</div>
     </div>
   </div>
 </div>
</div>

