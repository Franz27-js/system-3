// const mqtt = require('mqtt');
// const { default: test } = require('node:test');
// const client = mqtt.connect('mqtt://10.100.20.181:1883');  // TCP port 1883

// client.on('connect', () => {
//   console.log('Connected to broker over TCP');
//   client.subscribe('mein/beispiel/topic', () => {
//     client.on('message', (topic, message) => {
//       console.log(`Received message on ${topic}: ${message.toString()}`);
//       update_frontend(message);
//     })
//   })
// });


// function update_frontend(message) {
//   let container = document.getElementById('test_publish');

//   test_publish.innerHTML = message;
//   console.log(message);
//   location.reload();
// }


// console.log('Starting MQTT client...');
// const client = mqtt.connect('mqtt://10.100.20.181:9001', {
//   username: '',
//   password: '',
// })

// const topic = 'mein/beispiel/topic';

// client.on('connect', () => {
//   console.log('Connected to broker');

//   client.subscribe(topic, (err) => {
//     if (!err) {
//       console.log(`Subscribed to ${topic}`)
//     }
//   })
// });

// client.on('message', (topic, message) => {
//   console.log(`Received message on ${topic}: ${message.toString()}`)
// });