function createMessage() {
    let urlstatus = window.location.origin + window.location.pathname + '/drawflowresourse';
    let data = 'status=nodeCreated&titulo=facebook&html='+`
     
  <div>
            <div class="title-box"><i class="fas fa-comments"></i> Mensagem</div>
              <div class="box"">
                Sua msg aquiMensagem 
              </div>
            </div>
    `;
    $.post(urlstatus, data, (msg) => { 
        console.log(msg);
        toastr.success(msg.status)
        location.reload()
    })
    .fail(() => { 
        console.log('error');
        /* toastr.error("Error ao Cadastrar Mensagem")  */
    }); 
  }
