$(document).ready(function () {
    /*  const socket = io('https://api.digmarcas.com.br/');
      
     socket.on('qrCode', (qrCode) => {
       console.log(qrCode)
       // selecione o elemento onde a imagem será exibida
       const imgElement = document.getElementById('image');
 
       // exiba uma mensagem de carregamento
       const loadingMsg = document.createElement('p');
       loadingMsg.textContent = 'Carregando...';
       imgElement.appendChild(loadingMsg);
 
       // crie um objeto Image
       const img = new Image();
 
       // defina a fonte da imagem como a string base64
       img.src = qrCode.data;
 
       // escute o evento 'load' para a imagem
       img.addEventListener('load', () => {
         // remova a mensagem de carregamento
         imgElement.removeChild(loadingMsg);
 
         // exiba a imagem
         imgElement.src = img.src;
       });
 
       // adicione o objeto Image à página
       document.body.appendChild(img);
 
     })
           
 }); */
    var intervalId = setInterval(function () {
        const qrcode = window.location.origin + window.location.pathname + '/qrcode';
        const xhr = new XMLHttpRequest()
        xhr.open('GET', qrcode, true)
        xhr.onload = async () => {
            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                var data = JSON.parse(xhr.responseText);
                console.log(data);
                if (data.status == 'QrCode') {
                    document.getElementById("servicoButton").setAttribute("style", "display: block;");
                    if (data.qrcode) {
                        const div = document.querySelector('#imgGif');
                        const img = div.querySelector('img');
                        if (img) {
                            div.removeChild(img);
                        }
                        removeElements();
                        desconectado();
                        var qrcode = new QRCode(document.getElementById("imgQR"), {
                            text: data.qrcode,
                            width: 296,
                            height: 256,
                            colorDark: "#000000",
                            colorLight: "#ffffff",
                            correctLevel: QRCode.CorrectLevel.M
                        });

                    }
                }
                if (data.status == 'qrReadSuccess') {
                    removeElements()
                    document.getElementById("servicoButton").setAttribute("style", "display: none;");
                    conectado()
                    clearInterval(intervalId);
                    console.log('Intervalo cancelado');
                }
                if (data.status == 'browserClose') {
                    removeElements()
                    desconectado()
                    //carregarGif()
                    /* clearInterval(intervalId);
                    console.log('Intervalo cancelado'); */
                }

                if (data.status == 'errorSession') {
                    console.log(data.menssage)
                }

            }
        }
        xhr.send()

    }, 5000); // executa a cada 1000 milissegundos (1 segundo)

});

function carregarGif() {
    var div = document.getElementById("imgGif");
    const image = document.createElement("img");
    image.src = 'http://localhost/painelwhatspp.local/public/assets/img/cartoon-snail-loading-loading.png';
    image.width = 296;
    image.height = 256;
    image.id = "imagemGif";
    div.appendChild(image);
}

function iniciarSession() {
    const url = window.location.origin + window.location.pathname + '/start';
    document.getElementById("servicoButton").setAttribute("style", "display: none;");
    const xhr = new XMLHttpRequest()
    xhr.open('GET', url, true)
    xhr.onload = async () => {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            const data = JSON.parse(xhr.responseText);
            console.log(data);
            carregarGif()
        }
    }
    xhr.send()

}

function removeElements() {

    const qrcodeDiv = document.getElementById('imgQR');
    const canvasElement = qrcodeDiv.querySelector('canvas'); // selecionando o canvas dentro da div com id qrcode
    const imgElement = qrcodeDiv.querySelector('img'); // selecionando a imagem dentro da div com id qrcode
    if (canvasElement) {
        canvasElement.remove();
    }

    if (imgElement) {
        imgElement.remove();
    }
}

function conectado() {
    const servicowhats = document.getElementById('servicowhats')
    const servicoAlert = document.getElementById('servicoAlert')
    if (!servicowhats.classList.contains('callout-success') || servicoAlert.classList.contains('badge-success')) {
        servicoAlert.classList.remove('badge-danger');
        servicowhats.classList.remove('callout-danger');

        servicowhats.classList.add('callout-success');
        servicoAlert.classList.add('badge-success');
        const i = document.querySelector("#servicoAlert i");
        i.classList.remove('badge-danger');
        i.classList.add('badge-success');
        i.innerHTML = '';
        i.innerHTML = 'Serviço Conectado';
    }
}

function desconectado() {
    const servicowhats = document.getElementById('servicowhats')
    const servicoAlert = document.getElementById('servicoAlert')
    if (!servicowhats.classList.contains('callout-danger') || servicoAlert.classList.contains('badge-danger')) {
        servicoAlert.classList.remove('badge-success');
        servicowhats.classList.remove('callout-success');

        servicoAlert.classList.add('badge-danger');
        servicowhats.classList.add('callout-danger');

        const i = document.querySelector("#servicoAlert i");
        i.classList.remove('badge-success');
        i.classList.add('badge-danger');
        i.innerHTML = '';
        i.innerHTML = 'Serviço Desconectado';
    }

}
