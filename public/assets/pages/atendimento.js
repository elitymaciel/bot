$(document).ready(function (e) {
  console.log('Olà Mundo!');
});

async function contatos() {
  const url = window.location.origin + window.location.pathname + '/listacontato'
  let response = await fetch(url);
  let data = await response.json();
  console.log(data.response);
  data.response.forEach(item => {
    const li = document.createElement("li");
    li.classList.add("nav-item");
    li.a
    const a = document.createElement("a");
    a.href = "#";
    a.classList.add("nav-link");
    const i = document.createElement("i");
    i.classList.add("fas", "fa-circle", "text-success");
    a.appendChild(i);
    a.appendChild(document.createTextNode(item.formattedName));
    li.appendChild(a);
    if (item.ativo) {
      li.classList.add("active");
    }
    document.getElementById("contato").appendChild(li);
  });
}