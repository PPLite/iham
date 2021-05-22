import mysql.connector
#Library di https://github.com/pravodev/uhf-rfid-reader-sdk/blob/master/rfid_reader/reader.py
from rfid_reader import RFIDReader
#import PySimpleGUI as sg

#layout = [[sg.Text("Hello from PySimpleGUI")], [sg.Button("START")], [sg.Button("STOP")]]

# Create the window
#window = sg.Window("Demo", layout)

# Create an event loop
while True:
   i = 0
   j = 0
   db = mysql.connector.connect(
      host="localhost",
      user="root",
      passwd="",
      database="mjdr3247_adminpanel"
      )
   #Konversi data dari matrix ke string
   def converttostr(input_seq, seperator):
      final_str = seperator.join(input_seq)
      return final_str
   
   #event, values = window.read()
    # End program if user closes window or
    # presses the OK button
    
   #while event == "START" or event == sg.WIN_CLOSED:
      
   #Inisialisasi
   reader  = RFIDReader('socket', host="192.168.0.180", port=6000, addr="FF")
   reader2 = RFIDReader('socket', host="192.168.0.190", port=6000, addr="FF")

   #connect
   reader.connect()
   
   #Perintah untuk mengambil data reader 1
   #data = reader.getResponse(True)
   tag = reader.scantags()
   reader.disconnect()
   jml = len (tag)

   #Perintah untuk mengambil data reader 2
   reader2.connect()
   #data2 = reader2.getResponse(True)
   tag2 = reader2.scantags()
   reader2.disconnect()
   jml2 = len (tag2)

   #Hasil konversi data
   seperator = ' '
   new_data = converttostr(tag, seperator)
   new_data2 = converttostr(tag2, seperator)

   #Input data rfid ke database
   cursor = db.cursor()
   #Reader 1
   if (jml > 1):
      for i in range (0,jml) :
         new_data = tag [i]
         sql = "INSERT INTO tb_reader_scan (rfid_uid, reader_id) VALUES (%s, %s)"
         val = (new_data, "1")
         cursor.execute(sql, val)
         db.commit()
         #print (new_data)
   if (jml == 1) :
      new_data = converttostr(tag, seperator)
      sql = "INSERT INTO tb_reader_scan (rfid_uid, reader_id) VALUES (%s, %s)"
      val = (new_data, "1")
      cursor.execute(sql, val)
      db.commit()
      
   #Reader 2
   if (jml2 > 1):
      for j in range (0,jml2) :
         new_data2 = tag2 [j]
         sql = "INSERT INTO tb_reader_scan2 (rfid_uid, reader_id) VALUES (%s, %s)"
         val2 = (new_data2, "2")
         cursor.execute(sql, val2)
         db.commit()
         #print (new_data)
   if (jml2 == 1) :
      new_data2 = converttostr(tag2, seperator)
      sql = "INSERT INTO tb_reader_scan2 (rfid_uid, reader_id) VALUES (%s, %s)"
      val2 = (new_data2, "2")
      cursor.execute(sql, val2)
      db.commit()


   #Kirim data ke database

   #event, values = window.read()
   #print (event)
   #if event == "STOP" :
   #   break


  # if event == "STOP" :
  #      break

#window.close()





