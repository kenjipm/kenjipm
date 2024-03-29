// service worker

if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('sw.js').then(function(registration) { 
		// Registration was successful
		console.log('ServiceWorker registration successful with scope: ', registration.scope);
	}).catch(function(err) {
	   // registration failed :(
	});
}

let deferredPrompt;

window.addEventListener('beforeinstallprompt', function(event) {
  // Prevent Chrome 67 and earlier from automatically showing the prompt
  e.preventDefault();
  // Stash the event so it can be triggered later.
  deferredPrompt = e;
  
  showAddToHomeScreen();
});

function showAddToHomeScreen() {

  var a2hsBtn = document.querySelector(".ad2hs-prompt");

  a2hsBtn.style.display = "block";

  a2hsBtn.addEventListener("click", addToHomeScreen);

}

function addToHomeScreen() {
  var a2hsBtn = document.querySelector(".ad2hs-prompt");  // hide our user interface that shows our A2HS button
  a2hsBtn.style.display = 'none';  // Show the prompt
  deferredPrompt.prompt();  // Wait for the user to respond to the prompt
  deferredPrompt.userChoice
    .then(function(choiceResult){

  if (choiceResult.outcome === 'accepted') {
    console.log('User accepted the A2HS prompt');
  } else {
    console.log('User dismissed the A2HS prompt');
  }

  deferredPrompt = null;

});}