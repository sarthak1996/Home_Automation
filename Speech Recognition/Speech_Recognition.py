import speech_recognition as sr
import urllib2
#from espeak import espeak


r=sr.Recognizer()


for i in range(1,1000):
    with sr.Microphone() as source:
        print "say"
        audio=r.listen(source)
        try:
           audio1=r.recognize_google(audio) 
           print("you said"+audio1)
           if audio1=="on 3":
                  print("done")
                  urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?app_n=3')
 #                 espeak.synth("hello world")
                  print("done1")
        except sr.UnknownValueError:
           print("Google did not understand")
       # audio1=r.recognize_google(audio)
       # print("I think you said "+ audio1)
       # if audio1=="on 3":
       #           urllib2.urlopen('http://localhost/EHDLOGIN_rpi/updatestate.php?3')          
       #           print "switchedon light 3"
