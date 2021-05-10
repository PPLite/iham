#Library di https://github.com/pravodev/uhf-rfid-reader-sdk/blob/master/rfid_reader/reader.py
from rfid_reader import RFIDReader

# iniate
reader = RFIDReader('socket', host="192.168.0.190", port=6000, addr="FF")

#connect
reader.connect()

#info = reader.getInfo()
#print("INFO ", info)
reader.sendCommand (0x01)
data = reader.getResponse(True)
print(data)

tag = reader.scantags()
print('tag', tag)
reader.disconnect()