import RPi.GPIO as GPIO
import time
import urllib2
GPIO.setmode(GPIO.BOARD)

MATRIX = [	[1,2,3,'A'],
			[4,5,6,'B'],
			[7,8,9,'C'],
			['*',0,'#','D']	]
ROW = [12,16,18,22]
COL = [32,36,38,40]
count =0
password=[1,5,9]
a=['$','$','$','$']
flag=0
tries=0
buzzer=37
GPIO.setup(buzzer,GPIO.OUT)
threshold=0.2
def LockedPosition(var):
        if(var==1):
                print "Wrong Password"
        elif(var==0):
                print "Correct Password Security System disabled"
                try:
                        response = urllib2.urlopen('http://localhost/EHDLOGIN_rpi/buttonstatus5.php')
                        status = response.read()
                        if (status=='1') :
                                try:
                                        response = urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatesecurity.php')
                                        status = response.read() 
                                except urllib2.HTTPError, e:
                                        print e.code
                                except urllib2.URLError, e:
                                        print e.args
                except urllib2.HTTPError, e:
                        print e.code
                except urllib2.URLError, e:
                        print e.args
        elif(var==-1):
                GPIO.output(buzzer,GPIO.HIGH)
                #ON ONE LED
for j in range(4):
	GPIO.setup(COL[j],GPIO.OUT)
	GPIO.output(COL[j],GPIO.HIGH)

for i in range(4):
	GPIO.setup(ROW[i],GPIO.IN,pull_up_down = GPIO.PUD_UP)
	
try:
	while(True):
		for j in range(4):
			GPIO.output(COL[j],GPIO.LOW)
			for i in range(4):
				if GPIO.input(ROW[i])==GPIO.LOW:
					key=MATRIX[i][j]
					time.sleep(threshold)
					print key
					if(key==1 or key==2 or key==3 or key==4 or key==5 or key==6 or key==7 or key==8 or key==9 or key==0 or key =='#' or key=='*'):
                                                a[count]=key
                                                #print key
                                                count=count+1
                                                if(key=='*'):
                                                        count=0
                                                        #LockedPosition(1)
                                                if(a[3]=='#' and count==4):
                                                        flag=1
                                                        for i in range(0,3):
                                                                #print "hey"+str(i)
                                                                if(a[i]!=password[i]):
                                                                        flag=0
                                                        if(flag==1):
                                                                tries=0
                                                                count=0
                                                                LockedPosition(0)
                                                        else:
                                                                tries+=1
                                                                count=0
                                                                LockedPosition(1)
                                                elif(count==4):
                                                        count=0
                                                        tries+=1
                                                        LockedPosition(1)
                                        if(tries>=3):
                                                count=0
                                                print "Trying to breakin"
                                                LockedPosition(-1)
					while(GPIO.input(ROW[i])==GPIO.LOW):
						pass
						
			GPIO.output(COL[j],GPIO.HIGH)
except KeyboardInterrupt:
	GPIO.cleanup()
	
