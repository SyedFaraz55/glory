// Your web app's Firebase configuration
var firebaseConfig = {
  apiKey: "AIzaSyC3lhwMpkd1aWWgKGgyJ3r6a81bGissw-o",
  authDomain: "mjapp-1553013921599.firebaseapp.com",
  databaseURL: "https://mjapp-1553013921599.firebaseio.com",
  projectId: "mjapp-1553013921599",
  storageBucket: "mjapp-1553013921599.appspot.com",
  messagingSenderId: "1059987297796",
  appId: "1:1059987297796:web:fe454d83c583d1066dc751",
  measurementId: "G-NR6C8NPK9N"
};
// Initialize Firebase
firebase.initializeApp(firebaseConfig);
firebase.analytics();

var storageRef = firebase.storage().ref('images/');
