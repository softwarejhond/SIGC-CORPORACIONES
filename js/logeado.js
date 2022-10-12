   var db = firebase.firestore();
   function observadorCaracterizacion(){
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
    //mostramos nombres y credenciales del padrino
    db.collection("Informacion_contratista").where("EMAIL", "==", email).onSnapshot((querySnapshot) => {
        var datos=document.getElementById('datos');
        var nombre=document.getElementById('nombre');
        var email=document.getElementById('email');
        var nombreInput=document.getElementById('nombre_completo_padrino');//campo de texto escondido
        var identificacionInput=document.getElementById('numero_identificacion_padrino');//campo de texto escondido
        var dependenciaInput=document.getElementById('dependencias');//campo de texto escondido
        var EmailInput=document.getElementById('email_padrino');//campo de texto escondido
        querySnapshot.forEach((doc) => {
         console.log(`${doc.id} => ${doc.data()}`);datos.innerHTML +=`${doc.data().NOMBRE}<br>${doc.data().DEPENDENCIA}<br>${doc.data().IDENTIFICACION}`
   });
   //mostramos solo nombre del padrino
   querySnapshot.forEach((doc) => {
     console.log(`${doc.id} => ${doc.data()}`);nombre.innerHTML += `
     ${doc.data().NOMBRE} ${doc.data().PRIMER_APELLIDO} ${doc.data().SEGUNDO_APELLIDO} 
      `
   });
   //mostramos en el input escondido el nombre completo del padrino
querySnapshot.forEach((doc) => {
    console.log(`${doc.id} => ${doc.data()}`);nombreInput.value +=`${doc.data().NOMBRE} ${doc.data().PRIMER_APELLIDO} ${doc.data().SEGUNDO_APELLIDO}`
  });
  querySnapshot.forEach((doc) => {
    console.log(`${doc.id} => ${doc.data()}`);identificacionInput.value +=`${doc.data().EMAIL}`
  });
  querySnapshot.forEach((doc) => {
    console.log(`${doc.id} => ${doc.data()}`);dependenciaInput.innerHTML +=`${doc.data().DEPENDENCIA}`
  });
  querySnapshot.forEach((doc) => {
    console.log(`${doc.id} => ${doc.data()}`);email.innerHTML +=`${doc.data().EMAIL}`
  });
  querySnapshot.forEach((doc) => {
    console.log(`${doc.id} => ${doc.data()}`);EmailInput.value +=`${doc.data().EMAIL}`
  });
});

}
});
   }
   observadorCaracterizacion();