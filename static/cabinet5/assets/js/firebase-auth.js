 // Your web app's Firebase configuration
 const firebaseConfig = {
  apiKey: "AIzaSyBoqf9cbJtmCdh4y9i35qr86kXlAybYmQM",
  authDomain: "rentxx-com.firebaseapp.com",
  databaseURL: "https://rentxx-com.firebaseio.com",
  projectId: "rentxx-com",
  storageBucket: "rentxx-com.appspot.com",
  messagingSenderId: "524341677502",
  appId: "1:524341677502:web:32f985f731c17d9e44bdef"
  };
// Initialize Firebase
firebase.initializeApp(firebaseConfig);


$(document).on('click', '#googleAuth', function(e) {
  var base_provider = new firebase.auth.GoogleAuthProvider();
  firebase.auth().signInWithPopup(base_provider).then( function(result) {
      console.log(result);
  }).catch( function (error) {
      console.log(error());
  });
});