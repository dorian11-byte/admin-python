import serial
import pynmea2
import time
import requests
import math
import random

TOKEN = "BBFF-Sa3n3mJK3270ECK84DvykW4I8K8w2t"  # Put your TOKEN here
DEVICE_LABEL = "raspberry"  # Put your device label here 
VARIABLE_LABEL_1 = "temperature"  # Put your first variable label here
VARIABLE_LABEL_2 = "humidity"  # Put your second variable label herered
VARIABLE_LABEL_3 = "position"  # Put your second variable label here

def build_payload(variable_1, variable_2, variable_3):
    # Creates two random values for sending data
    value_1 = random.randint(-10, 50)
    value_2 = random.randint(0, 85)
   
# Creates a gps coordinates at the location 

	
    gps = serial.Serial("/dev/serial0", 9600, timeout= 1)
    line = gps.readline()
    data = line.split(",".encode())
    
    lat=0
    lng=0
    
    if data[0] == "$GPRMC".encode():
        if data[2] == "A".encode():
                         
            latgps = float(data[3].decode())
            if data[4] == "S".encode():
                latgps = -latgps
            latdeg = int(latgps/100)
            latmin = latgps - latdeg*100
            lat = round((latdeg+(latmin/60)),6)
            
            longps = float(data[5].decode())
            if data[6] == "W".encode():
                longps = -longps
            longdeg = int(longps/100)
            longmin = longps - longdeg*100
            lng = round((longdeg+(longmin/60)),6)
        time.sleep(1)
    
    if lat == 0 or lng == 0:
            payload = {variable_1: value_1,
               variable_2: value_2,
               variable_3: {"value": 1, "context": {"lat": 19.124039, "lng": -104.400}}       
               }
            return payload
    else:
            payload = {variable_1: value_1,
                       variable_2: value_2,
                       variable_3: {"value": 1, "context": {"lat": lat, "lng": lng}}       
                       }

            return payload


def post_request(payload):
    # Creates the headers for the HTTP requests
    url = "http://industrial.api.ubidots.com"
    url = "{}/api/v1.6/devices/{}".format(url, DEVICE_LABEL)
    headers = {"X-Auth-Token": TOKEN, "Content-Type": "application/json"}

    # Makes the HTTP requests
    status = 400
    attempts = 0
    while status >= 400 and attempts <= 5:
        req = requests.post(url=url, headers=headers, json=payload)
        status = req.status_code
        attempts += 1

    # Processes results
    print(req.status_code, req.json())
    if status >= 400:
        print("[ERROR] Could not send data after 5 attempts, please check \
            your token credentials and internet connection")
        return False

    print("[INFO] request made properly, your device is updated")
    return True


def main():
    payload = build_payload(VARIABLE_LABEL_1, VARIABLE_LABEL_2, VARIABLE_LABEL_3)

    print("[INFO] Attemping to send data")
    post_request(payload)
    print("[INFO] finished")


if __name__ == '__main__':
    while (True):
        main()
        time.sleep(2)

