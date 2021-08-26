import pandas as pd
import numpy as np
import seaborn as sns
import matplotlib.pyplot as plt
import math

from surprise import Dataset, Reader
from surprise import SVD, NMF
from surprise.model_selection import cross_validate, train_test_split, GridSearchCV

from sklearn.cluster import KMeans
from sklearn import metrics
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.metrics.pairwise import linear_kernel
from scipy.stats import pearsonr

#Data Collection
All_user= [[9,7,8,5,0,0,0,0,0,0,9,7,8,5,0,0,0,0,0,0,9,7,8,5,0,0,0,0,0,0,9,7,8,5,0,0,0,0,0,0,9,7,8,5,0,0,0,0,0,0,9,7,8,5,0,0,0,0,0,0,9,7,8,5,0,0,0,0],
           [0,0,0,0,6,5,0,0,0,0,0,0,0,0,6,5,0,0,0,0,0,0,0,0,6,5,0,0,0,0,0,0,0,0,6,5,0,0,0,0,0,0,0,0,6,5,0,0,0,0,0,0,0,0,6,5,0,0,0,0,0,0,0,0,6,5,0,0],
           [5,8,6,10,0,0,0,0,0,0,5,8,6,10,0,0,0,0,0,0,5,8,6,10,0,0,0,0,0,0,5,8,6,10,0,0,0,0,0,0,5,8,6,10,0,0,0,0,0,0,5,8,6,10,0,0,0,0,0,0,5,8,6,10,0,0,0,0],
           [0,0,0,0,5,8,0,0,0,0,0,0,0,0,5,8,0,0,0,0,0,0,0,0,5,8,0,0,0,0,0,0,0,0,5,8,0,0,0,0,0,0,0,0,5,8,0,0,0,0,0,0,0,0,5,8,0,0,0,0,0,0,0,0,5,8,0,0],
           [0,0,0,0,0,0,7,8,8,7,0,0,0,0,0,0,7,8,8,7,0,0,0,0,0,0,7,8,8,7,0,0,0,0,0,0,7,8,8,7,0,0,0,0,0,0,7,8,8,7,0,0,0,0,0,0,7,8,8,7,0,0,0,0,0,0,7,8],
           [4,5,9,4,0,0,0,0,0,0,4,5,9,4,0,0,0,0,0,0,4,5,9,4,0,0,0,0,0,0,4,5,9,4,0,0,0,0,0,0,4,5,9,4,0,0,0,0,0,0,4,5,9,4,0,0,0,0,0,0,4,5,9,4,0,0,0,0],
           [8,4,3,3,0,0,0,0,0,0,8,4,3,3,0,0,0,0,0,0,8,4,3,3,0,0,0,0,0,0,8,4,3,3,0,0,0,0,0,0,8,4,3,3,0,0,0,0,0,0,8,4,3,3,0,0,0,0,0,0,8,4,3,3,0,0,0,0],
           [3,3,4,9,0,0,0,0,0,0,3,3,4,9,0,0,0,0,0,0,3,3,4,9,0,0,0,0,0,0,3,3,4,9,0,0,0,0,0,0,3,3,4,9,0,0,0,0,0,0,3,3,4,9,0,0,0,0,0,0,3,3,4,9,0,0,0,0],
           [6,9,5,2,0,0,0,0,0,0,6,9,5,2,0,0,0,0,0,0,6,9,5,2,0,0,0,0,0,0,6,9,5,2,0,0,0,0,0,0,6,9,5,2,0,0,0,0,0,0,6,9,5,2,0,0,0,0,0,0,6,9,5,2,0,0,0,0],
           [0,0,0,0,7,4,0,0,0,0,0,0,0,0,7,4,0,0,0,0,0,0,0,0,7,4,0,0,0,0,0,0,0,0,7,4,0,0,0,0,0,0,0,0,7,4,0,0,0,0,0,0,0,0,7,4,0,0,0,0,0,0,0,0,7,4,0,0],
           [0,0,0,0,3,7,0,0,0,0,0,0,0,0,3,7,0,0,0,0,0,0,0,0,3,7,0,0,0,0,0,0,0,0,3,7,0,0,0,0,0,0,0,0,3,7,0,0,0,0,0,0,0,0,3,7,0,0,0,0,0,0,0,0,3,7,0,0],
           [0,0,0,0,0,0,6,9,8,8,0,0,0,0,0,0,6,9,8,8,0,0,0,0,0,0,6,9,8,8,0,0,0,0,0,0,6,9,8,8,0,0,0,0,0,0,6,9,8,8,0,0,0,0,0,0,6,9,8,8,0,0,0,0,0,0,6,9],
           [6,6,7,1,0,0,0,0,0,0,6,6,7,1,0,0,0,0,0,0,6,6,7,1,0,0,0,0,0,0,6,6,7,1,0,0,0,0,0,0,6,6,7,1,0,0,0,0,0,0,6,6,7,1,0,0,0,0,0,0,6,6,7,1,0,0,0,0],
           [7,2,6,1,0,0,0,0,0,0,7,2,6,1,0,0,0,0,0,0,7,2,6,1,0,0,0,0,0,0,7,2,6,1,0,0,0,0,0,0,7,2,6,1,0,0,0,0,0,0,7,2,6,1,0,0,0,0,0,0,7,2,6,1,0,0,0,0],
           [0,0,0,0,8,6,0,0,0,0,0,0,0,0,8,6,0,0,0,0,0,0,0,0,8,6,0,0,0,0,0,0,0,0,8,6,0,0,0,0,0,0,0,0,8,6,0,0,0,0,0,0,0,0,8,6,0,0,0,0,0,0,0,0,8,6,0,0]]

user_prof =["BPJS, Kelas I, Dewasa, Non-Infeksi, Umum, Biasa",
            "Umum, -,  Dewasa, Non-Infeksi, Umum, Biasa",
            "BPJS, Kelas III, Dewasa, Non-Infeksi, Umum, High Care",
            "BPJS, Kelas III, Dewasa, Non-Infeksi, Umum, High Care"]

User_tes=  [[9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0],
            [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            [9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0],
	    [7,5,9,9,8,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,7,9,5,8,6,6,4,6,4,5,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0]
            ]
#print (np.shape(User_tes))
User_real = [[9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0],
            [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,8,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0],
            [9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0,0,0,9,6,5,8,7,0,0,0],
	    [7,5,9,9,8,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,7,9,5,8,6,6,4,6,4,5,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,8,0,0,0,0,0,0,0]
            ]

df = pd.read_excel (r'D:\Dokumen\System Shortcut\Desktop\IHAM_TEAM_DATA\Coba_Recom\Data Ruangan.xlsx')
Room_name = pd.DataFrame(df, columns= ['Nama Ruangan'])
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

patient_id = 3;

c = 0.8;
data = np.zeros((1,68))
for j in range (0,68):
    data[0][j] = User_tes [patient_id][j]

All_user_rate= np.append (All_user,data, axis=0);
#print ("jumlah pengguna gab:", np.shape(All_user_rate)[0])

#define variabel
jml_user = np.shape(All_user)[0]#get
jml_user_tes = np.size(user_prof)

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



#________Tahap 1: Item Clustering_________#


#calculate similarity
tf = TfidfVectorizer(analyzer='word', ngram_range=(1, 1), min_df=0, stop_words='english')
tfidf_matrix = tf.fit_transform(All_Room)
cosine_similarities = linear_kernel(tfidf_matrix, tfidf_matrix)


#get Group Rating for each cluster

for j in range (0, jml_clus):
    for k in range (0, jml_room):
        pos = k + jml_clus 
        value = cosine_similarities[j][pos]
        gr_rate [k][j] = (value/1)*10

#print ("group rating:", gr_rate)


#____Tahap 2: Identify Similarity between User Profile and Cluster___#
#Identify similarity between user profile and kluster
user_rate = np.zeros( (1,jml_clus))
ds = [user_prof[patient_id],All_Room[0],All_Room[1],All_Room[2],All_Room[3],All_Room[4],All_Room[5],All_Room[6],All_Room[7],All_Room[8],All_Room[9],
      All_Room[10],All_Room[11],All_Room[12],All_Room[13],All_Room[14],All_Room[15],All_Room[16],All_Room[17],All_Room[18],All_Room[19],
      All_Room[20],All_Room[21],All_Room[22],All_Room[23],All_Room[24],All_Room[25],All_Room[26],All_Room[27],All_Room[28],All_Room[29],
      All_Room[30],All_Room[31],All_Room[32],All_Room[33],All_Room[34],All_Room[35]]

tfidf_matrix = tf.fit_transform(ds)
user_item_sim = linear_kernel(tfidf_matrix, tfidf_matrix)

#get similarity rating from user profile
for k in range (0, jml_clus):
    user_rate [0][k] = (user_item_sim [0][k+1]/1)*10

#print ("rating similarity between up and gr:", user_rate)

#Get Similarity Room with User Profile
#print ("All rating:",user_item_sim)
#print ("rating similarity between up and gr:", user_rate)
All_data = np.append(gr_rate,user_rate,axis=0)
#print (np.shape(All_data), jml_room)





#______Tahap 3: Get Similarity Room with Same Content_____#
#get mean rating of each room
rat_ = np.zeros(jml_room + 1)
sum_ = np.zeros(jml_room + 1)
for j in range (0,jml_room + 1):
    for k in range (0,jml_clus):
        sum_[j] = All_data[j][k] + sum_[j]
    rat_[j] = sum_[j]/jml_clus
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


#print ( "Similarity room based on group rating:")
#print (sim_item)

#________Tahap 4 : get Nearest Neighbour______#

predict = np.zeros(jml_room)
posisi = np.zeros(jml_room)
near = 0; sum_nn = 0; x= 0;
for j in range (0,jml_room):
    if sim_item [j] >= 0.5 :
        near  = near + 1
        predict [x]= sim_item [j]
        posisi [x] = j
        sum_nn = sum_nn  + sim_item[j]
        x  = x +1;
        
#Get mean item rating of each NN
rat_nn = np.zeros(near);
count =0;

for j in range (0,near):
    sum_rate = 0;
    for k in range (0,jml_clus):
        pos = int (posisi[j]);
        sum_rate = All_data[pos][k] + sum_rate 
    rat_nn [j] = sum_rate/jml_clus
    
    
#_________Tahap 5 : Identify predicion and Give Recommendation_______#
prediction = np.zeros(near); 
pos_clus_ = 0; room_pos = 0;

# Find Cluster most similarity with user Profile

sim_clus =0;
for j in range (0, jml_clus):
    if user_rate [0][j] > sim_clus:
        sim_clus = user_rate [0][j]
        pos_clus = j;
        # print ("tr_usr_rate:",sim_clus, j)
        print ("most similarity cluster:", pos_clus + 1);

tot_dif_user_rating = 0;
max_predict =0;
#get sum of different rating for each nearest item
for k in range (0,near):
    pos = int (posisi[k]);
    diff = All_data[pos][pos_clus]-rat_nn[k]
    tot_dif_user_rating = tot_dif_user_rating + diff

#get prediction rating for each nearest item
for j in range (0,near):
    prediction [j]= rat_nn [j]+(tot_dif_user_rating*predict[j]/sum_nn)
        
    if prediction [j] > max_predict :
        max_predict = prediction [j]
        room_pos  = int (posisi[j]) + 1
        pos_near = j;
  #      num = num + 1;
print ("Prediksi Rating dari Ruangan yang serupa :", prediction)
print ("Posisi Ruangan Termirip:", posisi)
print ("Recommended Room : ", room_pos )
#print (All_user_rate)
#print (rat_)

            


    
#______Tahap 4: Get Similarity Room Based on User Rating______#
diff = prediction[pos_near] - User_real[patient_id][pos_near]
#with open('Rating hasil uji.txt','w') as f:
 #   f.writelines(diff)

#for j in range (0, jml_user_tes):
  #  sum_diff = sum_diff + diff [j][0]

#MAE = sum_diff/jml_user_tes

#diff_ = prediction [room_pos-1] - All_user_rate [patient_id][room_pos-1]
#sum_dif_r [patient_id]= abs(diff_)
#sum_dif = 0;
#for j in range (0, jml_user_tes):
#    sum_dif = sum_dif + sum_dif_r [j]
#MAE = abs(sum_dif)/jml_user_tes
print ("nilai dif :", diff)

