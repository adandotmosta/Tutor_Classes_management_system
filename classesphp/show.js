new MultiSelectTag('countries');

document.getElementById("dialogBox").style.display = "none";

function showDialog(i) {
    // Show the dialog box
    document.getElementById("dialogBox").style.display = "block";
    let cid =document.getElementsByClassName('rrssrr');

    let classid = cid[i].getAttribute('value');
    let inputhidden = document.getElementById("classid");
    console.log(classid);
    inputhidden.value = classid ;
    
  }
  
  function hideDialog() {
    // Hide the dialog box
    document.getElementById("dialogBox").style.display = "none";
  }