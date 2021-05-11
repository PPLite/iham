import mysql.connector
#Library di https://github.com/pravodev/uhf-rfid-reader-sdk/blob/master/rfid_reader/reader.py
from rfid_reader import RFIDReader
import PySimpleGUI as sg

layout = [[sg.Text("Hello from PySimpleGUI")], [sg.Button("START")], [sg.Button("STOP")]]

# Create the window
window = sg.Window("Demo", layout)

# Create an event loop
while True:
   db = mysql.connector.connect(
      host="localhost",
      user="root",
      passwd="",
      database="data_rfid"
      )
   #Konversi data dari matrix ke string
   def converttostr(input_seq, seperator):
      final_str = seperator.join(input_seq)
      return final_str
   event, values = window.read()
    # End program if user closes window or
    # presses the OK button
    
   while event == "START" or event == sg.WIN_CLOSED:
      
      #Inisialisasi
      reader  = RFIDReader('socket', host="192.168.0.180", port=6000, addr="FF")
      reader2 = RFIDReader('socket', host="192.168.0.190", port=6000, addr="FF")
      #connect
      reader.connect()
      #Perintah untuk mengambil data reader 1
      reader.sendCommand (0x01)
      data = reader.getResponse(True)
      tag = reader.scantags()
      print (tag)
      reader.disconnect()

      #Perintah untuk mengambil data reader 2
      reader2.connect()
      reader2.sendCommand (0x01)
      data2 = reader2.getResponse(True)
      tag2 = reader2.scantags()
      reader2.disconnect()

      #Hasil konversi data
      seperator = ' '
      new_data = converttostr(tag, seperator)
      new_data2 = converttostr(tag2, seperator)

      #Input data rfid ke database
      cursor = db.cursor()
      sql = "INSERT INTO rfid (uid, nama_bayi) VALUES (%s, %s)"
      val = (new_data, "Guling")
      cursor.execute(sql, val)
      val2 = (new_data2, "Guling")
      cursor.execute(sql, val2)



         #Kirim data ke database
         #if (tag != []):
      db.commit()
      #event, values = window.read()
      #print (event)
      #if event == "STOP" :
      #   break


   if event == "STOP" :
        break

window.close()