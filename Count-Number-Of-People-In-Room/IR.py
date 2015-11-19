import RPi.GPIO as GPIO
import time
import urllib2
from datetime import datetime
#pin number for pir 1
threshold=0.6
doorIn=29
GPIO.setmode(GPIO.BOARD)
GPIO.setup(doorIn,GPIO.IN)
hangState=0
doorIn1=31
GPIO.setmode(GPIO.BOARD)
GPIO.setup(doorIn1,GPIO.IN)
hangState1=0
value=0
value1=0
count=0
prevcount=0;
def check(var_in,var_out):
        if(var_in<var_out):
            return 1
        else:
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
                        print "entered1"
			value=1
        doorInstate1=GPIO.input(doorIn1)
	if(doorInstate1==GPIO.HIGH and value1==0):
                #getting time
                now1=datetime.now()
                time.sleep(threshold)
                hangState1=GPIO.input(doorIn1)
                if(hangState1!=doorInstate1 and doorInstate1==GPIO.HIGH and hangState1==GPIO.LOW):
                        now3=now1
                        print "entered2"
			value1=1
	if(value==1 and value1==1):
	        x=check(now2,now3)
		value=0
		value1=0
		print "here"+str(x)+"\n"
                if(x==1):
                        count=count+1
                        print "in"
                if(x==0):
                        if(count!=0):	        
                                count=count-1
	                        print "out"
                    
		if(count==0 and prevcount==1):
                        try:
                                response = urllib2.urlopen('http://localhost/EHDLOGIN_rpi/NoPerson.php')
				response1 = urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_num=0')
                                status = response.read()
                                print "States successfully changed No person"
                        except urllib2.HTTPError, e:
                                print e.code
                        except urllib2.URLError, e:
                                print e.args
					
		if(count==1 and prevcount==0):
                        try:
                                response = urllib2.urlopen('http://localhost/EHDLOGIN_rpi/AtleastOnePerson.php')
                                status = response.read()
                                print "States succesfully changed AtLeastOnePerson"
                        except urllib2.HTTPError, e:
                                print e.code
                        except urllib2.URLError, e:
                                print e.args
							
		prevcount=count;
                print count
                 	
