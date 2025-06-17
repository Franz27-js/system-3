# System 3

## Anforderungen
- Server zur Ausführung von PHP -> zum Beispiel XAMPP (https://www.apachefriends.org/index.html)

## Anweisungen
### Konfiguration
Um das System-3 im Frontend benutzen zu können muss das DocumentRoot auf den Ordner "System-3", auf dem PC, zeigen.
Dazu muss die httpd.conf (C:\xampp\apache\conf\httpd.conf) angepasst werden. 
Folgend kann die Seite im Frontend unter http://localhost aufgerufen werden.

### Frontend
Um sicher zu stellen, dass der MQTT-Service läuft, muss im Seitenmenü neben dem User-Icon die Farbe Grün leuchten.
Ein Entwickler kann es zusätzlich in der Web-Console prüfen (F12 -> Konsole). Es muss der folgende Log erscheinen "Response status: 200".

Wenn anstelle der grünen Farbe, die gelbe Farbe leuchtet, dann ist der Service noch nicht gestartet. 
Um den Service zu starten, muss im Menü der Link "Start Service" aufgerufen werden. Die Farbe sollte auf Grün wechseln.

Wenn anstelle der grünen Farbe, die rote Farbe leuchtet, dann hat das System-3 Problem sich mit dem MQTT-Server zu verbinden.
In meisten Fällen behebt der Neustart den Fehler. 
Um sicher zu gehen, sollte der Service manuel gestartet werden. Dazu sollte im neunen Fenster folgende URL aufgerufen werden: http://localhost/background_service.php. Nach 10-15 Sekunden kann die Seite (http://localhost/background_service.php) geschlossen werden. Die Farbe sollte auf Grün wechseln.

### Seiten
