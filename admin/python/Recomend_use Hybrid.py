import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
import math

from sklearn.cluster import KMeans
from sklearn import metrics
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel
from scipy.stats import pearsonr

#data user profile
df = pd.read_excel ('D:\\Data Rachma\\1_Asset Management for Hospital\\New Data\\Coba_Recom\\REAL.xlsx')
user_prof= pd.DataFrame(df, columns= ['Deskripsi']).values

#data user rating
for j in range (0,68):
    user = pd.DataFrame(df, columns= [j+1])
    if j == 0:
        User_tes = user.values
    else :
        User_tes= np.append(User_tes,user.values,axis=1)
print (User_tes[0][0])
        
df = pd.read_excel ('D:\\Data Rachma\\1_Asset Management for Hospital\\New Data\\Coba_Recom\\Riwayat Rating.xlsx')
for j in range (0,68):
    user = pd.DataFrame(df, columns= [j+1])
    if j == 0:
        User_real = user.values
    else :
        User_real= np.append(User_real,user.values,axis=1)

#data deskripsi ruangan
df = pd.read_excel ('D:\\Data Rachma\\1_Asset Management for Hospital\\New Data\\Coba_Recom\\Data Ruangan.xlsx')
Room_name = pd.DataFrame(df, columns= ['Nama Ruangan']).values
Room = pd.DataFrame(df, columns= ['Kategori Pasien'])


Room_cluster =["BPJS/Umum, Kelas I/II/III, Dewasa, Infeksi, COVID, Biasa",
	       "BPJS/Umum, Kelas I/II/III, Anak, Infeksi, COVID, Biasa",
	       "BPJS/Umum, Kelas I/II/III, Dewasa, Infeksi, Paru, Biasa",
	       "BPJS/Umum, Kelas I/II/III, Anak, Infeksi,Paru, Biasa",
	       "BPJS/Umum, Kelas I/II/III, Dewasa, Infeksi, MDRO, Biasa",
	       "BPJS/Umum, Kelas I/II/III, Anak, Infeksi, MDRO, Biasa",
	       "BPJS, Kelas I, Dewasa, Non-Infeksi, Umum, Biasa",
	       "BPJS, Kelas II, Dewasa, Non-Infeksi, Umum, Biasa",
               "BPJS, Kelas III, Dewasa, Non-Infeksi, Umum, Biasa",
	       "BPJS, Kelas I, Dewasa, Non-Infeksi, Bedah, Biasa",
	       "BPJS, Kelas II, Dewasa, Non-Infeksi, Bedah, Biasa",
	       "BPJS, Kelas III, Dewasa, Non-Infeksi, Bedah, Biasa",
	       "BPJS, Kelas I, Dewasa, Non-Infeksi, Penyakit Dalam, Biasa",
	       "BPJS, Kelas II, Dewasa, Non-Infeksi, Penyakit Dalam, Biasa",
	       "BPJS, Kelas III, Dewasa, Non-Infeksi, Penyakit Dalam, Biasa",
	       "BPJS, Kelas I, Dewasa, Non-Infeksi, Bersalin, Biasa",
	       "BPJS, Kelas II, Dewasa, Non-Infeksi, Bersalin, Biasa",
	       "BPJS, Kelas III, Dewasa, Non-Infeksi, Bersalin, Biasa",
	       "BPJS, Kelas I, Anak, Non-Infeksi, Umum, Biasa",
 	       "BPJS, Kelas II, Anak, Non-Infeksi, Umum, Biasa",
               "BPJS, Kelas III, Anak, Non-Infeksi, Umum, Biasa",
               "BPJS, Kelas I,   Anak, Non-Infeksi, Penyakit Dalam, Biasa",
               "BPJS, Kelas II,  Anak, Non-Infeksi, Penyakit Dalam, Biasa",
               "BPJS, Kelas III, Anak, Non-Infeksi, Penyakit Dalam, Biasa",
               "Umum, -, Dewasa, Non-Infeksi, Bedah, Biasa",
               "Umum, -, Dewasa, Non-Infeksi, Penyakit Dalam, Biasa",
               "Umum, -, Dewasa, Non-Infeksi, Bersalin, Biasa",
               "Umum, -, Anak, Non-Infeksi, Umum, Biasa",
               "Umum, -, Anak, Non-Infeksi, Penyakit Dalam, Biasa",
               "BPJS/UMUM, -, Dewasa, Infeksi/Non-Infeksi, COVID, High Care",
               "BPJS/UMUM, -, Dewasa, Infeksi/Non-Infeksi, Umum, High Care",
               "BPJS/UMUM, -, Dewasa, Infeksi/Non-Infeksi, Bedah, High Care",
               "BPJS/UMUM, -, Anak, Infeksi/Non-Infeksi, COVID, High Care",
               "BPJS/UMUM, -, Anak, Infeksi/Non-Infeksi, Umum, High Care",
               "BPJS/UMUM, -, Anak, Infeksi/Non-Infeksi, Bedah, High Care",
               "BPJS/UMUM, -, Dewasa/Anak, Infeksi/Non-Infeksi, -, Intensive Care"]

patient_id = 49;
c = 0.8;

#define variabel
jml_user = np.size(user_prof)
jml_room = len(Room)
jml_clus = 36;
gr_sim = np.zeros((jml_room,jml_clus))
gr_rate = np.zeros((jml_room,jml_clus))
user_rate = np.zeros(jml_clus)
max_sim_item = 0;
id_room_max = 0;

#Gabung matrix ruangan
for j in range (0,jml_room):
    if j == 0:
        All_Room = np.append(Room_cluster,Room.loc[j].values,axis=0)
    else :
        All_Room = np.append(All_Room,Room.loc[j].values,axis=0)
print (All_Room)

#________Tahap 1: Item Clustering_________#

tf = TfidfVectorizer(analyzer='word', ngram_range=(1, 1), min_df=0, stop_words='english')
tfidf_matrix = tf.fit_transform(All_Room)
cosine_similarities = linear_kernel(tfidf_matrix, tfidf_matrix)

#get Group Rating   
for j in range (0, jml_clus):
    for k in range (0, jml_room):
        pos = k + jml_clus 
        value = cosine_similarities[j][pos]
        gr_rate [k][j] = (value/1)*10
print ("group rating:", gr_rate)

#print(np.shape(gr_rate))

#____Tahap 2: Identify Similarity between User Profile and Cluster___#
        
#Identify similarity between user profile and kluster
user_rate = np.zeros( (1,jml_clus))
ds = [All_Room[0],All_Room[1],All_Room[2],All_Room[3],All_Room[4],All_Room[5],All_Room[6],All_Room[7],All_Room[8],All_Room[9],
      All_Room[10],All_Room[11],All_Room[12],All_Room[13],All_Room[14],All_Room[15],All_Room[16],All_Room[17],All_Room[18],All_Room[19],
      All_Room[20],All_Room[21],All_Room[22],All_Room[23],All_Room[24],All_Room[25],All_Room[26],All_Room[27],All_Room[28],All_Room[29],
      All_Room[30],All_Room[31],All_Room[32],All_Room[33],All_Room[34],All_Room[35]]
ds = np.append(user_prof[patient_id],ds, axis=0)

tfidf_matrix = tf.fit_transform(ds)
user_item_sim = linear_kernel(tfidf_matrix, tfidf_matrix)

#get similarity rating from user profile
for k in range (0, jml_clus):
    user_rate [0][k] = (user_item_sim [0][k+1]/1)*10



#Get All Group Rating
All_data = np.append(gr_rate,user_rate,axis=0)


#______Tahap 3: Get Similarity Room with Same Content_____#
#get mean rating of each room
rat_ = np.zeros(jml_room + 1)
sum_ = np.zeros(jml_room + 1)
for j in range (0,jml_room + 1):
    count = 0;
    for k in range (0,jml_clus):
        if All_data[j][k] != 0:
            sum_[j] = All_data[j][k] + sum_[j]
            count = count + 1
    rat_[j] = sum_[j]/count
#print (rat_)

#identify similarity room based on grup rating
sim_item = np.zeros(jml_room )
for j in range (0,jml_room):
    jml_ = 0;jml_k =0; jml_k2 =0;
    for k in range (0,jml_clus):
        diff   = All_data[jml_room][k] - rat_[jml_room]
        diff_2 = All_data [j][k] - rat_[j]
        jml_ = (diff*diff_2) + jml_
        jml_k = (diff*diff) + jml_k
        jml_k2 = (diff_2*diff_2) + jml_k2
    sim_item [j] = jml_/(math.sqrt(jml_k)*math.sqrt(jml_k2))
    if math.isnan(sim_item [j]) == True :
        sim_item [j] = 0;

#identify most similirty room with user profile
for j in range (0,jml_room):
    if sim_item [j] > max_sim_item :
        max_sim_item = sim_item [j]
        id_room_max = j



#identify similarity room based on user rating
    
#get mean rating of each room

rat_ = np.zeros(jml_room)
sum_ = np.zeros(jml_room)
for j in range (0,jml_room):
    for k in range (0,jml_user):
       # print (User_tes[k][j])
        sum_[j] = User_tes[k][j] + sum_[j]
    rat_[j] = sum_[j]/jml_user   
    
    
#identify similarity room based on user rating
sim_item_2 = np.zeros(jml_room)
#print ("ukuran all_user_rate:",np.shape(All_user_rate))
for j in range (0,jml_room):
    jml_ = 0;jml_k =0; jml_k2 =0;
    for k in range (0,jml_user):
        diff   = User_tes[k][id_room_max] - rat_[id_room_max]
        diff_2 = User_tes [k][j] - rat_[j]
        jml_ = (diff*diff_2) + jml_
        jml_k = (diff*diff) + jml_k
        jml_k2 = (diff_2*diff_2) + jml_k2
    sim_item_2 [j] = jml_/(math.sqrt(jml_k)*math.sqrt(jml_k2))
    if math.isnan(sim_item_2 [j]) == True :
        sim_item_2 [j] = 0;

#get linear combination of similarity
for j in range (0,jml_room):
    sim_item [j] = (sim_item [j]*c) + (sim_item_2 [j]*(1-c))

#print ( "Similarity room based on user rating:")
#print (sim_item_2)
print ("Hasil similarity kolaborasi :")
print (sim_item)

#________Tahap 4 : get Nearest Neighbour______#

predict = np.zeros(jml_room)
posisi = np.zeros(jml_room)
near = 0; sum_nn = 0; x=0;
for j in range (0,jml_room):
    if sim_item [j] >= 0.4 :
        near = near + 1
        predict [x] = sim_item [j]
        posisi [x] = j
        sum_nn = sum_nn + sim_item[j]
        x = x+1;
        
#Get mean item rating of each NN
rat_nn = np.zeros(near);count =0;
for j in range (0,near):
    sum_rate = 0;
    for k in range (0,jml_user):
        pos = int (posisi[j]);
        sum_rate = User_tes[k][pos] + sum_rate
        
    #print (pos)
    rat_nn [j] = sum_rate/jml_user
    
    
#_________Tahap 5 : Identify prediction and Give Recommendation_______#
prediction = np.zeros(near)
num = 0;    max_predict = 0;
room_pos = 0;

#get sum of different rating for each nearest item
tot_dif_user_rating = 0;
for k in range (0,near):
    pos = int (posisi[k]);
    diff = User_tes[patient_id][pos]-rat_nn[k]
    #print (User_tes[patient_id][pos], rat_nn[k])
    tot_dif_user_rating = tot_dif_user_rating + diff
    if math.isnan(tot_dif_user_rating) == True :
        tot_dif_user_rating = 0;

#get prediction rating for each nearest item

for j in range (0,near):
    prediction [j]= rat_nn [j]+(tot_dif_user_rating*predict[j]/sum_nn)
    print (rat_nn[j],sum_nn,tot_dif_user_rating,posisi[j])
    if prediction [j] > max_predict :
        max_predict = prediction [j]
        room_pos = int (posisi[j]) + 1
        pos_near = j;


print ("Prediksi Rating dari Ruangan yang serupa :", prediction)
print ("Posisi Ruangan Termirip:", posisi)
print ("Recommended Room : ", room_pos )

#______Tahap 6: Evaluation Performance______#
#measure diff
diff = prediction[pos_near] - User_real[patient_id][pos_near]

with open('hasl.txt', 'a+') as f:
    f.write('{}'.format(diff))
    f.write('\n')
    f.close


print ("nilai dif :", diff)

