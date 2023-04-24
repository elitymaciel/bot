const editIcons = document.querySelectorAll('.fa-edit');
const deleteIcons = document.querySelectorAll('.fa-trash');
const spanNomes = document.querySelectorAll('.text');
const url = window.location.origin + window.location.pathname
let meusDados = {
  lista: [],
  adicionarDado: function (dado) {
    this.lista.push(dado);
  }
};
spanNomes.forEach((span) => {
  span.addEventListener('click', (event) => {
    event.preventDefault();

    const nomeCompleto = event.target.textContent;
    const nome = nomeCompleto.substring(nomeCompleto.indexOf('- ') + 2);

    let dados = 'nome=' + nome;
    meusDados.adicionarDado(dados); //captura os dados dessa aqui

    const xhr = new XMLHttpRequest();
    xhr.open('POST', url + '/menubot', true);
    xhr.onload = () => {
      if (xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);
        //const uniqueArr = removeDuplicates(data.item);
        //console.log(uniqueArr);

        const lista = document.querySelector('.minhalista');
        const novoUl = document.createElement('ul');
        novoUl.className = 'todo-list ui-sortable';
        novoUl.setAttribute('data-widget', 'todo-list');
        novoUl.id = 'lista';


        data.forEach((dados, index) => {

          const novoItem = document.createElement('li');
          novoItem.style.cursor = 'pointer';
          novoItem.id = dados.id;

          const span = document.createElement('span');
          span.className = 'text';
          span.textContent = `${index + 1} - ${dados.item}`;


          const div = document.createElement('div');
          div.className = 'tools';

          const editIcon = document.createElement('i');
          editIcon.className = 'fas fa-edit';
          editIcon.setAttribute('data-action', 'editar');

          const trashIcon = document.createElement('i');
          trashIcon.className = 'fas fa-trash';
          trashIcon.setAttribute('data-action', 'excluir');

          div.appendChild(editIcon);
          div.appendChild(trashIcon);

          novoItem.appendChild(span);
          novoItem.appendChild(div);

          novoUl.appendChild(novoItem);
        });

        lista.innerHTML = '';
        lista.appendChild(novoUl);

      } else {
        console.error('Ocorreu um erro na solicitação.');
      }
    };
    xhr.onerror = () => {
      console.error('Ocorreu um erro ao enviar a requisição.');
    };
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send(dados);
  });
});

editIcons.forEach((editIcon) => {
  editIcon.addEventListener('click', (event) => {
    const nomeCompleto = event.target.parentNode.previousElementSibling.textContent;
    const nome = nomeCompleto.substring(nomeCompleto.indexOf('- ') + 2);
    console.log(nome);
    document.getElementById('EditInputNome').value = nome;
    document.getElementById('EditIdNome').value = nome;
    $('#edit_menu1').modal('show');
  });
});

const formEditMenu1 = document.querySelector('#formEditMenu1');
formEditMenu1.addEventListener('submit', function (event) {
  event.preventDefault();
  const formData = new FormData(formEditMenu1);
  const xhr = new XMLHttpRequest();
  xhr.open('POST', url + '/edit');
  xhr.onload = function () {
    if (xhr.status === 200) {
      const data = JSON.parse(xhr.responseText);
      $('#edit_menu1').modal('hide');
      toastr.success(data.status)
      setTimeout(function () {
        location.reload()
      }, 2000);

    } else {

    }
  };
  xhr.onerror = function () {
    console.error('Erro na requisição.');
  };
  xhr.send(formData); // envia os dados do formulário
});

deleteIcons.forEach((deleteIcon) => {
  deleteIcon.addEventListener('click', (event) => {
    const nome = event.target.parentNode.previousElementSibling.textContent;
    // Faça algo com o nome, como exibir em um alerta ou enviar para o servidor
    console.log('Clicou no ícone delete:', nome);
    $('#confirm-delete').modal('show');
  });
});

const lista = document.querySelector('.minhalista');

lista.addEventListener('click', (event) => {
  if (event.target.classList.contains('text')) {
    const texto = event.target.textContent;
    console.log('Clicou no texto:', texto);
  } else if (event.target.classList.contains('fas')) {
    const icone = event.target;
    const acao = icone.getAttribute('data-action');

    const div = icone.parentNode; // navega para a div que contém os ícones
    const span = div.previousElementSibling; // pega o elemento irmão anterior (que é o span com o nome)
    const nome = span.textContent;
    console.log('Clicou no ícone:', acao + ' e ' + nome);

  }
});
/* lista.addEventListener('click', (event) => {
    if (event.target.classList.contains('text')) {
      const texto = event.target.textContent;
      console.log(texto);
    } else if (event.target.classList.contains('fas')) {
      const icone = event.target;
      const div = icone.parentNode; // navega para a div que contém os ícones
      const span = div.previousElementSibling; // pega o elemento irmão anterior (que é o span com o nome)
      const nome = span.textContent;
      console.log(nome);
    }
  });
 */
