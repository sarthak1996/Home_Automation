import RPi.GPIO as GPIO 
from datetime import datetime
#pin number for pir 2
doorOut=3;
GPIO.setup(doorOut,GPIO.IN);
threshold=0.2
while(True):
    doorOutstate=GPIO.input(doorOut);
    if(doorOutstate==true):
        #getting time
        now =datetime.now()
        time.sleep(threshold)
        hangState=GPIO.input(doorIn)
        if(hangState!=doorInstate):
            f=open('out.txt','w')
            currentDay=now.day
            currentHour=now.hour
            currentMinute=now.minute
            currentSecond=now.second
            currentSecond=currentSecond
            currentMicrosecond=(now.microsecond)
            f.write((str)(currentMonth)+"\n"+(str)(currentDay)+"\n"+(str)(currentHour)+"\n"+(str)(currentMinute)+"\n"+(str)(currentSecond)+"\n"+(str)(currentMicrosecond))
            f.close()

