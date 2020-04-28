
function showPassword(txBoxPWD_ID) {
    let txBoxPWD = document.getElementById(txBoxPWD_ID);   
    if (txBoxPWD.type === "password") {
        txBoxPWD.type = "text";
    } else {
        txBoxPWD.type = "password";
    }
  }

