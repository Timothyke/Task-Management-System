const openFormButton = document.getElementById('openFormButton');
const closeFormButton = document.getElementById('closeFormButton');
const overlay = document.getElementById('overlay');

openFormButton.addEventListener('click', function() {
  overlay.style.display = 'block';
});

closeFormButton.addEventListener('click', function() {
  overlay.style.display = 'none';
});