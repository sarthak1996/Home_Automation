import RPi.GPIO as GPIO
app1=1
app2=2
app3=3
GPIO.setup(app1,GPIO.OUT);
GPIO.setup(app2,GPIO.OUT);
GPIO.setup(app3,GPIO.OUT);
def check(f_in,f_out):
    for i in range(0,6):
        var_in=f_in.readline()
        var_out=f_out.readline()
        if(var_in=='')
            return -1
        if(var_out=='')
            return -1
        if(var_in<var_out):
            return 1
        else:
            return 0

while(True):
    f_in=open('in.txt','r')
    f_out=open('out.txt','r')
    x=check(f_in,f_out)
    if(x==1):
        GPIO.output(app1,HIGH)
        GPIO.output(app2,HIGH)
        GPIO.output(app3,HIGH)
    else:
        GPIO.output(app1,LOW)
        GPIO.output(app1,LOW)
        GPIO.output(app1,LOW)
    f_in.close()
    f_out.close()
