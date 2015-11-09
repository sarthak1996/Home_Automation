import RPi.GPIO as GPIO

def check(f_in,f_out):
    for i in range(0,7):
        var_in=f_in.readline()
        var_out=f_out.readline()
        #print var_in
        if(var_in=="" and var_out==""):
            f_in=open("in.txt","w")
            f_out=open("out.txt","w")
            f_in.close()
            f_out.close()
            return -1
        if(var_in==""):
            print "in empty"
            return -1
        if(var_out==""):
            print "out empty"
            return -1
        if(var_in<var_out):
            f_in=open("in.txt","w")
            f_out=open("out.txt","w")

            f_in.close()
            f_out.close()
            return 1
        elif(var_in>var_out):
            f_in=open("in.txt","w")
            f_out=open("out.txt","w")

            f_in.close()
            f_out.close()
            return 0
count=0
while(True):
    f_in=open('in.txt','r')
    f_out=open('out.txt','r')
    x=check(f_in,f_out)
    if(x==1):
        count=count+1
        print "in"
        
    elif(x==0):
	if(count!=0):	        
		count=count-1
	#print "out"
    if(x!=-1):
        print count
    f_in.close()
    f_out.close()
