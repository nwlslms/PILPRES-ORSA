import json
import pandas as pd
import random
import string

def buatpw(length=8):
    characters = string.ascii_lowercase + string.digits
    return ''.join(random.choice(characters) for _ in range(length))

print("Auto DBASE!")
print("Created by: NaiulaID")
print("==========================================================")
print("For more information, contact me at: @nwlslms")
print("==========================================================")
print("Pilih mau dimasukkan kemana: ")
print("1. putra.json")
print("2. putri.json")

choice = None
while choice not in ['1', '2']:
    choice = input("Tulis '1' atau '2': ")

if choice == '1':
    json_file = 'putra.json'
else:
    json_file = 'putri.json'

file_name = input("Masukkan nama file beserta ekstensinya (contoh: siswa.xlsx): ")

with open(json_file, 'r') as file:
    existing_data = json.load(file)

new_data = pd.read_excel(file_name)

for index, row in new_data.iterrows():
    username = str(row['username']).strip()
    if 'namadepan' in row and 'namabelakang' in row:
        namadepan = str(row['namadepan']).strip()
        namabelakang = str(row['namabelakang']).strip() if pd.notna(row['namabelakang']) else ""
        if not namabelakang or namabelakang.lower() == 'nan':
            namabelakang = ""
    elif 'nama' in row:
        nama = str(row['nama']).strip()
        split_nama = nama.split()
        namadepan = split_nama[0]
        namabelakang = split_nama[1] if len(split_nama) > 1 else ""
    else:
        namadepan = ""
        namabelakang = ""

    nis = str(row['nis']).strip()
    password = buatpw()

    user_data = {
        'username': username,
        'namadepan': namadepan,
        'namabelakang': namabelakang,
        'nis': nis,
        'password': password,
        'hasVote': False
    }

    existing_data[username] = user_data

with open(json_file, 'w') as file:
    json.dump(existing_data, file, indent=4)

print(f"User data has been successfully added to '{json_file}'.")