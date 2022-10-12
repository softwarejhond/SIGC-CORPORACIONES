
function ingresa(){
    var email=document.getElementById('email').value;
    var password=document.getElementById('password').value;
    
  firebase.auth().signInWithEmailAndPassword(email, password).catch(function(error) {
  // Handle Errors here.
  var errorCode = error.code;
  var errorMessage = error.message;
  // ...
     
}
);   
}
function enter(e) {
  tecla = (document.all) ? e.keyCode : e.which;
    if (tecla == 13){
        ingreso();
    }
    kc=e.keyCode?e.keyCode:e.which;
sk=e.shiftKey?e.shiftKey:((kc==16)?true:false);
if(((kc>=65&&kc<=90)&&!sk)||((kc>=97&&kc<=122)&&sk))
document.getElementById('mayuscula').style.display='block';
    else{
        document.getElementById('mayuscula').style.display='none';
        
    }

    }



function cerrar(){
firebase.auth().signOut().then(function() {

}).catch(function(error) {
  // An error happened.
});
    
}

function observador(){
    firebase.auth().onAuthStateChanged(function(user) {
  if (user) {
        
    // User is signed in.
    var displayName = user.displayName;
    var email = user.email;
    var emailVerified = user.emailVerified;
    var photoURL = user.photoURL;
    var isAnonymous = user.isAnonymous;
    var uid = user.uid;
    var providerData = user.providerData;
    openInvestigacion();
 
  } else {

  }
});
}
observador();

function openInvestigacion(){
     window.location = "main.php"; 
    
}

function cerrar(){
firebase.auth().signOut().then(function() {

    window.location = "index.php"; 

      
}).catch(function(error) {
  // An error happened.
});
}

function recoverPass(){
var auth = firebase.auth();
var emailAddress = document.getElementById('LoginEmail').value;

auth.sendPasswordResetEmail(emailAddress).then(function() {
  alert("Se ha enviado un correo para restablecer la contraseña, ábralo y siga los pasos que le solicitan gracias.");
}).catch(function(error) {
  alert("Su correo no hace parte del sistema de Ceri Fundación.");
});
}

