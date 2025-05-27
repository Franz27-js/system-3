// Function to load messages from the status file
function loadMessages() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', './mqtt_status.json?_=' + new Date().getTime(), true);
  xhr.responseType = 'json';

  let messages_container = document.getElementById('test_upload');

  xhr.onload = function () {
    console.log('Response status:', xhr.status);
    if (xhr.status === 200 && xhr.response) {
      const data = xhr.response;
      
      if (data.messages && data.messages.length > 0) {
        messages_container.innerHTML = data.messages[0]['message'];
      } else {
        messagesDiv.innerHTML = '<div class="message">No messages received yet.</div>';
      }
    } else {
      // document.getElementById('serviceStatus').textContent = 'Status file not found';
      // document.getElementById('messages').innerHTML = '<div class="message">Unable to load messages.</div>';
    }
  };

  xhr.send();
}

document.addEventListener('DOMContentLoaded', function () {
  // Initial load
  loadMessages();
  
  // Auto refresh every 5 seconds
  setInterval(loadMessages, 5000);
});