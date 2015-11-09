import RPi.GPIO as GPIO
import time
from datetime import datetime
#pin number for pir 1
threshold=2
doorIn=7
GPIO.setmode(GPIO.BOARD)
GPIO.setup(doorIn,GPIO.IN)
hangState=0
while(True):
        doorInstate=GPIO.input(doorIn)
	if(doorInstate==GPIO.HIGH):
                #getting time
                now=datetime.now()
                time.sleep(threshold)
                hangState=GPIO.input(doorIn)
                if(hangState!=doorInstate and doorInstate==GPIO.HIGH and hangState==GPIO.LOW):
                        f=open('in.txt','w')
                        currentMonth=now.month            
                        currentDay=now.day
                        currentHour=now.hour
                        currentMinute=now.minute
                        currentSecond=now.second
                        currentSecond=currentSecond
                        currentMicrosecond=(now.microsecond)
                        f.write((str)(currentMonth)+"\n"+(str)(currentDay)+"\n"+(str)(currentHour)+"\n"+(str)(currentMinute)+"\n"+(str)(currentSecond)+"\n"+(str)(currentMicrosecond))
                        print "entered"
                        f.close()
			

