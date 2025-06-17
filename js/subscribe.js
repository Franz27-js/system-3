// Function to load messages from the status file
function load_colors() {
  const xhr = new XMLHttpRequest();
  xhr.open('GET', './mqtt_status_color.json?_=' + new Date().getTime(), true);
  xhr.responseType = 'json';

  xhr.onload = function () {
    let status_indicator = document.querySelector('.__user_identifier__');

    console.log('Response status:', xhr.status);
    if (xhr.status === 200 && xhr.response) {
      const data = xhr.response;

      status_indicator.style.backgroundColor = '#57a32b';
      
      if (data.messages && data.messages.length > 0) {
        let color = data.messages[0]['message'];
        console.log('Recieved color: ' + color);
        
        update_color(color);
      }
    } else {
      status_indicator.style.backgroundColor = '#8a1c1c';
      // document.getElementById('serviceStatus').textContent = 'Status file not found';
      // document.getElementById('messages').innerHTML = '<div class="message">Unable to load messages.</div>';
    }
  };

  xhr.send();
}

function update_color(color) {
  let colors_container = Array.from(document.querySelectorAll('.colors_container'));
  
  colors_container.forEach(container => {
    container.classList.remove('__selected_color__');
  });

  document.getElementById('color_' + color).classList.add('__selected_color__');
}

document.addEventListener('DOMContentLoaded', function () {
  // Initial load
  load_colors();
  
  // Auto refresh every 5 seconds
  setInterval(load_colors, 5000);
});