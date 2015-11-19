import RPi.GPIO as GPIO
import urllib2
GPIO.setwarnings(False)
GPIO.setmode(GPIO.BOARD)
GPIO.setup(7,GPIO.OUT)
GPIO.setup(11,GPIO.OUT)
GPIO.setup(13,GPIO.OUT)
GPIO.setup(15,GPIO.OUT)
true = 1
while(true):
                try:
                        response = urllib2.urlopen('http://www.amithamiabhishek.tk/buttonstatus1.php')
                        status = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                print status
                if status=='1':
                                GPIO.output(7,GPIO.LOW)
                elif status=='0':
                                GPIO.output(7,GPIO.HIGH)


                try:
                        response = urllib2.urlopen('http://www.amithamiabhishek.tk/buttonstatus2.php')
                        status = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                print status
                if status=='1':
                                GPIO.output(11,GPIO.LOW)
                elif status=='0':
                                GPIO.output(11,GPIO.HIGH)

                try:
                        response = urllib2.urlopen('http://www.amithamiabhishek.tk/buttonstatus3.php')
                        status = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                print status
                if status=='1':
                                GPIO.output(13,GPIO.LOW)
                elif status=='0':
                                GPIO.output(13,GPIO.HIGH)
								
		try:
                        response = urllib2.urlopen('http://www.amithamiabhishek.tk/buttonstatus4.php')
                        status = response.read()
                except urllib2.HTTPError, e:
                                        print e.code

                except urllib2.URLError, e:
                                        print e.args

                print status
                if status=='1':
                                GPIO.output(15,GPIO.LOW)
                elif status=='0':
                                GPIO.output(15,GPIO.HIGH)				
