#!/usr/bin/python

import os
from datetime import datetime
import io
import picamera
from PIL import Image
scan = True
#images1
#images2
threshold=25
color_offset = 25 # Adjusts for slight varitaions in color

while(scan):
	flag=0
#	stream = io.BytesIO()
#	with picamera.PiCamera() as camera:
#		camera.resolution = (64,36) #Low Res For Faster Comparisons
#		camera.start_preview()
#		camera.capture(stream, format='jpeg')
#	stream.seek(0)	

#	if(len(images)!=2):
#		images.append(Image.open(stream))
#	else:
#		images[0] = Image.open(stream)


	#os.system calls
	
	os.system("fswebcam --no-banner -i 0 -q -r 250x120 pixelImage1.jpg")
	os.system("fswebcam --no-banner -i 0 -q  -r 250x120 pixelImage2.jpg")

	
	#capture 2 images store it in pixelImage1.jpg and pixelImage2.jpg
	images1=Image.open("pixelImage1.jpg")
	images2=Image.open("pixelImage2.jpg")
	print "Captured 1 and 2"
	x = 0
	y = 0
	diff = 0

	#if len(images) == 2:
		#Start On X and Move Down Y 
	while(x < images1.size[0]):
		while(y < images1.size[1]):

				#Add Up All RGB Values For Current Pixel
			img1 = images2.getpixel((x,y))
			val = img1[0] + img1[1] + img1[2]
			img2 = images1.getpixel((x,y))
			val2 = img2[0] + img2[1] + img2[2]
				
			pd = abs(val2-val)
				
			if(pd > color_offset):
				diff += 1
			y += 1
			changed  = (diff * 100) / (images1.size[0] * images1.size[1])				
			if(changed > threshold):
				flag=1
				break
			#Move Right 1 & Reset Y For Next Loop
		if(flag==1):
			flag=0
			break
		x+=1
		y=0
		
	changed  = (diff * 100) / (images1.size[0] * images1.size[1])
	print "processed 1 and 2"
	if(changed > threshold):
		now=datetime.now().time()
		cmd="mkdir "+str(now)
		os.system(cmd)
		cmd="sudo cp -rf pixelImage1.jpg "+str(now)+"/"
		os.system(cmd)
		cmd="sudo cp -rf pixelImage2.jpg "+str(now)+"/"
		os.system(cmd)
	#	break
	print str(changed) + "% changed."
	#images[1] = images[0]
