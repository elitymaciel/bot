
$(function () {
  const url = window.location.origin + window.location.pathname + '/drawflow';
  const urlstatus = window.location.origin + window.location.pathname + '/drawflowresourse';

  var id = document.getElementById("drawflow");
  const editor = new Drawflow(id);
  editor.reroute = true;

  const options = {
    method: 'GET',
    node: 'cors',
    cache: 'default'
  }
  fetch(url, options)
    .then(response => { response.json()
    .then(data => editor.import(data))
  })
    .catch(e => console.log(e.message));

  editor.start();


  // Events!
  

  /* editor.on('nodeCreated', function (id) {
    console.log("Node created " + id);
  }) */

  editor.on('nodeRemoved', function (id) {
    console.log("Node removed " + id);
    const nodeRemoved = new XMLHttpRequest();
    nodeRemoved.open('POST', urlstatus, true);
    nodeRemoved.onload = () => {
      const data = JSON.parse(nodeRemoved.responseText);
      //console.log(data)
      toastr.success(data.status)
    }
    nodeRemoved.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    nodeRemoved.send('id=' + id + '&status=nodeRemoved');

  })

  editor.on('nodeSelected', function (id) {
    console.log("Node selected " + id);
  })

  editor.on('moduleCreated', function (name) {
    console.log("Module Created " + name);
  })

  editor.on('moduleChanged', function (name) {
    console.log("Module Changed " + name);
  })

  editor.on('connectionCreated', function (connection) {
    let dataCreated = 'input_class=' + connection.input_class + '&input_id=' + connection.input_id + '&output_class=' + connection.output_class + '&input_class=' + connection.input_class + '&output_id=' + connection.output_id + '&status=ConnectionCreated';

    $.post(urlstatus, dataCreated, (msg) => { toastr.success(msg.status) }, "json")
      .fail(() => { toastr.error("Error creating connection") });
  })

  editor.on('connectionRemoved', function (connection) {
    let dataConnectionRemoved = 'input_class=' + connection.input_class + '&input_id=' + connection.input_id + '&output_class=' + connection.output_class + '&input_class=' + connection.input_class + '&output_id=' + connection.output_id + '&status=ConnectionRemoved';

    $.post(urlstatus, dataConnectionRemoved, (msg) => { toastr.success(msg.status) }, "json")
      .fail(() => { toastr.error("Error o remover conexão") });

  })

  /* editor.on('mouseMove', function(position) {
     console.log('Position mouse x:' + position.x + ' y:' + position.y);
   })  */

  editor.on('nodeMoved', function (id) {
    let node = document.getElementById('node-' + id);
    let dataNodeMoved = 'id=' + id + '&x=' + node.offsetLeft + '&y=' + node.offsetTop + '&status=nodeMoved';

    $.post(urlstatus, dataNodeMoved, (msg) => { /* toastr.success(msg.status) */ console.log(msg.status) }, "json")
      .fail(() => { toastr.error("Error ao mover conexão") });
  })

  editor.on('zoom', function (zoom) {
    console.log('Zoom level ' + zoom);
  })

  editor.on('translate', function (position) {
    console.log('Translate x:' + position.x + ' y:' + position.y);
  })

  editor.on('addReroute', function (id) {
    console.log("Reroute added " + id);
  })

  editor.on('removeReroute', function (id) {
    console.log("Reroute removed " + id);
  })

  /* DRAG EVENT */

  /* Mouse and Touch Actions */

  var elements = document.getElementsByClassName('drag-drawflow');
  for (var i = 0; i < elements.length; i++) {
    elements[i].addEventListener('touchend', drop, false);
    elements[i].addEventListener('touchmove', positionMobile, false);
    elements[i].addEventListener('touchstart', drag, false);
  }

  var mobile_item_selec = '';
  var mobile_last_move = null;

  function positionMobile(ev) {
    mobile_last_move = ev;

  }

  function allowDrop(ev) {
    ev.preventDefault();
  }

  function drag(ev) {
    if (ev.type === "touchstart") {
      mobile_item_selec = ev.target.closest(".drag-drawflow").getAttribute('data-node');

    } else {
      ev.dataTransfer.setData("node", ev.target.getAttribute('data-node'));
    }
  }

  function drop(ev) {
    if (ev.type === "touchend") {
      var parentdrawflow = document.elementFromPoint(mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY).closest("#drawflow");
      if (parentdrawflow != null) {
        addNodeToDrawFlow(mobile_item_selec, mobile_last_move.touches[0].clientX, mobile_last_move.touches[0].clientY);
      }
      mobile_item_selec = '';
    } else {
      ev.preventDefault();
      var data = ev.dataTransfer.getData("node");
      addNodeToDrawFlow(data, ev.clientX, ev.clientY);

    }

  }

 

  var transform = '';


  function changeModule(event) {
    var all = document.querySelectorAll(".menu ul li");
    for (var i = 0; i < all.length; i++) {
      all[i].classList.remove('selected');
    }
    event.target.classList.add('selected');
  }
}) 

