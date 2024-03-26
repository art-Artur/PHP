function appendToDisplay(value) {
    document.getElementById('display').value += value;
}

function clearDisplay() {
    document.getElementById('display').value = '';
}

function calculate() {
    var expression = document.getElementById('display').value;
    fetch('backend.php', {
        method: 'POST',
        body: JSON.stringify({ expression: expression }),
        headers: {
            'Content-Type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => {
        document.getElementById('display').value = data.result;
    })
    .catch(error => console.error('Error:', error));
}
