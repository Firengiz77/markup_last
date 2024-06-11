const navLink = document.getElementById('navLink');
const modal = document.getElementById('modal');

// Function to show the modal
function showModal() {
  modal.style.display = 'block';
}

// Event listener for nav link click
navLink.addEventListener('click', showModal);

// Close the modal when clicking outside of it
window.addEventListener('click', function(event) {
  if (event.target == modal) {
    modal.style.display = 'none';
  }
});