import RPi.GPIO as GPIO
import time
from datetime import datetime
#pin number for pir 1
threshold=0.4
doorIn=7 #to change the pin
doorIn1=13 #to change the pin
#pin number for appliance
a1=7
a2=13
a3=15
a4=8 #to check GPIO.0

GPIO.setmode(GPIO.BOARD)
#setting the pins to input or output
GPIO.setup(doorIn,GPIO.IN)
GPIO.setup(a1,GPIO.OUT)
GPIO.setup(a2,GPIO.OUT)
GPIO.setup(a3,GPIO.OUT)
GPIO.setup(a4,GPIO.OUT)
GPIO.setup(doorIn1,GPIO.IN)

hangState=0
hangState1=0
value=0
value1=0
count=0

def check(var_in,var_out):
        if(var_in<var_out):
            return 1
        elif(var_in>var_out):
             return 0
			
			
while(True):
	doorInstate=GPIO.input(doorIn)
	if(doorInstate==GPIO.HIGH and value==0):
                #getting time
		now=datetime.now()
                time.sleep(threshold)
                hangState=GPIO.input(doorIn)
                if(hangState!=doorInstate and doorInstate==GPIO.HIGH and hangState==GPIO.LOW):
                        now2=now
#                        print "entered1"
			value=1
        doorInstate1=GPIO.input(doorIn1)
	if(doorInstate1==GPIO.HIGH and value1==0):
                #getting time
                now1=datetime.now()
                time.sleep(threshold)
                hangState1=GPIO.input(doorIn1)
                if(hangState1!=doorInstate1 and doorInstate1==GPIO.HIGH and hangState1==GPIO.LOW):
                        now3=now1
#                        print "entered2"
			value1=1
#	print "value:"
#	print value
#	print "\nvalue1:"
#	print value1
	if(value==1 and value1==1):
#		print "here"
		x=check(now2,now3)
#		print "entered if"
		value=0
		value1=0
                if(x==1):
                	count=count+1
 #                       print "in"
                if(x==0):
	        	if(count>0):	        
		        	count=count-1
#	                        print "out"
     
                print count
		#update the table in phpmyadmin
		if(count==0):
			GPIO.output(a1,GPIO.LOW)
			GPIO.output(a2,GPIO.LOW)
			GPIO.output(a3,GPIO.LOW)
			GPIO.output(a4,GPIO.LOW)
                 	
