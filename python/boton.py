from gpiozero import Button
import time
import requests
import math
import random

TOKEN = "BBFF-Sa3n3mJK3270ECK84DvykW4I8K8w2t"  # Put your TOKEN here
DEVICE_LABEL = "raspberry"  # Put your device label here 
VARIABLE_LABEL_4 = "boton"

def build_payload(variable_4):
	button = Button(21)
	boton = 0
	suma = 1
	if button.is_pressed:
		boton = suma
	else:
		boton
	time.sleep(1)
	
	value_4 = boton
	
	if value_4 == 0:
	    payload = {variable_4: {"value":value_4,"context":{"alert":"Se a activado el boton de panico, asistir a la persona !!!"}}}
	    return payload
	else:
	    payload = {variable_4 : value_4}
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
    payload = build_payload(VARIABLE_LABEL_4)

    print("[INFO] Attemping to send data")
    post_request(payload)
    print("[INFO] finished")

if __name__ == '__main__':
    while (True):
        main()
        time.sleep(1)

