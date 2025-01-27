document.getElementById('registrationForm').addEventListener('submit', function (e) {
  const name = document.getElementById('name').value.trim();
  const registration = document.getElementById('registration').value.trim();
  const session = document.getElementById('session').value.trim();

  if (!name || !registration || !session) {
    e.preventDefault();
    alert('Please fill out all fields!');
  }
});

