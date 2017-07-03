import serial
import requests
from json import dumps
from datetime import datetime
ser = serial.Serial('/dev/tty96B0',9600)
while True:
    value = ser.readline()[:-2]
    if value:
        print datetime.now().strftime('%Y-%m-%dT%H:%M:%SZ')
        print value
        headers = {'content-type':'application/json'}
        payload = {"version":"1.0.0", "datastreams" : [ { "id" : "robot1-ldr", "datapoints":[ {"at":datetime.now().strftime('%Y-%m-%dT%H:%M:%SZ'),"value":value}], "current_value" : value } ]}
        r = requests.put('https://api.xively.com/v2/feeds/56185000?key=MLgsNgdZs1fcWOxfrjQgZpfHmZIP7IoLmOTcrWPJsZlUvfyi', data = dumps(payload), headers = headers, verify=False)
        print r.status_code