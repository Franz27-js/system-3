// Include the MQTT.js library in your HTML
// <script src="https://unpkg.com/mqtt/dist/mqtt.min.js"></script>

// Connect to an MQTT broker
const client = mqtt.connect('10.100.20.178:27017/mqtt')

// Handle connection events
client.on('connect', function() {
  console.log('Connected to MQTT broker')
  
  // Subscribe to a topic
  client.subscribe('my/topic', function(err) {
    if (!err) {
      // Publish a message
      client.publish('my/topic', 'Hello MQTT from browser!')
    }
  })
})

// Handle incoming messages
client.on('message', function(topic, message) {
  console.log(`Received message on ${topic}: ${message.toString()}`)
})

// Handle errors
client.on('error', function(err) {
  console.error('MQTT error:', err)
})