const editIcons = document.querySelectorAll('.fa-edit');
const deleteIcons = document.querySelectorAll('.fa-trash');
const spanNomes = document.querySelectorAll('.text');
let meusDados = {
    lista: [],
    adicionarDado: function(dado) {
      this.lista.push(dado);
    }
  };
spanNomes.forEach((span) => {
    span.addEventListener('click', (event) => {
        event.preventDefault();
        const url = window.location.origin + window.location.pathname
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
                    console.log(dados)
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
function removeDuplicates(arr) {
    return arr.filter(function(item, index) {
      return arr.indexOf(item) === index;
    });
  }
editIcons.forEach((editIcon) => {
    editIcon.addEventListener('click', (event) => {
        const nome = event.target.parentNode.previousElementSibling.textContent;
        // Faça algo com o nome, como exibir em um alerta
        console.log('Clicou no ícone edit:',nome); 
        
    });
});

deleteIcons.forEach((deleteIcon) => {
    deleteIcon.addEventListener('click', (event) => {
        const nome = event.target.parentNode.previousElementSibling.textContent;
        // Faça algo com o nome, como exibir em um alerta ou enviar para o servidor
        console.log('Clicou no ícone delete:',nome); 
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
      console.log('Clicou no ícone:', acao + ' e '+ nome);
      
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
  