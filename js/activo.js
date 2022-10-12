
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
    
    } else {
      alert("Usted no tiene permiso para ingresar a esta página");
      window.location = "index.php";
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
    
  
  