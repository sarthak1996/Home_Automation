import RPi.GPIO as GPIO
import time
from datetime import datetime
#pin number for pir 1
threshold=0.2
doorIn=1;
GPIO.setup(doorIn,GPIO.IN)
hangState=0
while(True):
    doorInstate=GPIO.input(doorIn)
    if(doorInstate==true):
        #getting time
        now =datetime.now()
        time.sleep(threshold)
        hangState=GPIO.input(doorIn)
        if(hangState!=doorInstate):
            f=open('in.txt','w')
            currentDay=now.day
            currentHour=now.hour
            currentMinute=now.minute
            currentSecond=now.second
            currentSecond=currentSecond
            currentMicrosecond=(now.microsecond)
            f.write((str)(currentMonth)+"\n"+(str)(currentDay)+"\n"+(str)(currentHour)+"\n"+(str)(currentMinute)+"\n"+(str)(currentSecond)+"\n"+(str)(currentMicrosecond))
            f.close()

