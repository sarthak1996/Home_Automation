import os
import speech_recognition as sr
import urllib2

r=sr.Recognizer()


while True :
    print "say"
    os.system("arecord -D plughw:0,0 --duration=3 test.wav")
    with sr.WavFile("/home/pi/new/test.wav") as source:
        #print "say"
        audio=r.record(source)
        try:
           audio1=r.recognize_google(audio) 
           print("you said"+audio1)
           if audio1=="start one" or audio1=="start 1" or audio1=="tart 1" or audio1=="tart one":
                  print("Doing light 1 on")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=11')
                  print("Done light 1 on")
	   if audio1=="stop one" or audio1=="stop 1" or audio1=="top 1" or audio1=="top one":
                  print("Doing light 1 off")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=10')
                  print("Done light 1 off")
           if audio1=="start two" or audio1=="start 2" or audio1=="tart 2" or audio1=="tart two":
                  print("Doing light 2 on")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=21')
                  print("Done light 2 on")
	   if audio1=="stop two" or audio1=="stop 2" or audio1=="top 2" or audio1=="top two":
                  print("Doing light 2 off")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=20')
                  print("Done light 2 off")
           if audio1=="start three" or audio1=="start 3" or audio1=="tart 3" or audio1=="tart three":
                  print("Doing light 3 on")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=31')
                  print("Done light 3 on")
	   if audio1=="stop three" or audio1=="stop 3" or audio1=="top 3" or audio1=="top three":
                  print("Doing light 3 off")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=30')
                  print("Done light 3 off")	
           if audio1=="start four" or audio1=="start 4" or audio1=="tart 4" or audio1=="tart four":
                  print("Doing light 4 on")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=41')
                  print("Done light 4 on")
	   if audio1=="stop four" or audio1=="stop 4" or audio1=="top 4" or audio1=="top four":
                  print("Doing light 4 off")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=40')
                  print("Done light 4 off")					  
        except sr.UnknownValueError:
           print("Google did not understand")
      
