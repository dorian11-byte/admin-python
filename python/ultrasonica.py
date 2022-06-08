import RPi.GPIO as GPIO
import time

GPIO.setmode(GPIO.BCM)
#dorian raygoza
Trigger = 17
Echo = 27
vibrador = 22

GPIO.setup(Trigger, GPIO.OUT)
GPIO.setup(Echo, GPIO.IN)
GPIO.setup(vibrador, GPIO.OUT)

print("Sensor ultrasonico")

try: 
    while True:
        GPIO.output(Trigger, False)
        time.sleep(0.5)
        GPIO.output(Trigger, True)
        time.sleep(0.00001)
        GPIO.output(Trigger, False)
        inicio=time.time()

        while GPIO.input(Echo) ==0:
            inicio=time.time()
            
        while GPIO.input(Echo)==1:
            final=time.time()

        t_transcurrido=final-inicio

        distancia=t_transcurrido*34000


        distancia=distancia/2
        print("Distancia= %.1fcm"%distancia)


        if distancia <= 5:
            GPIO.output(vibrador, True)
            time.sleep(0.04)

        if distancia > 6 and distancia < 10:
            GPIO.output(vibrador, True)
            time.sleep(0.5)
            GPIO.output(vibrador, False)

        if distancia > 11 and distancia < 20:
            GPIO.output(vibrador, True)
            time.sleep(1)
            GPIO.output(vibrador, False)

        if distancia > 21 and distancia <= 30:
            GPIO.output(vibrador, True)
            time.sleep(1.5)
            GPIO.output(vibrador, False)

        if distancia > 31:
            GPIO.output(vibrador, False)

except KeyboardInterrupt:
    GPIO.cleanup()   


