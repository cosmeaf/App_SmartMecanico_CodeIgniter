const BASE_URL = "http://localhost/codeigniter01"

  function clearErros(){
    $(".has-error").removeClass("has-error")
    $(".help-block").html("");
  }


  function showErros(error_list){
    clearErros();
    $.each(error_list, function(id, message){
      $(id).parent().parent().addClass("has-error");
      $(id).parent().siblings(".help-block").html(message)
    })
  }

  function loadingImg(message=""){
    return '<i class="fas fa-spinner fa-pulse"></i>&nbsp' + message
  }