import json
import pandas as pd

def json_to_excel():
    print("Created by: NaiulaID")
    print("==========================================================")
    print("Untuk informasi lebih lanjut, hubungi: @nwlslms")
    print("==========================================================")

    input_file = input("Masukkan nama file .json: ")
    output_file = input_file.split('.')[0] + '_print.xlsx'

    # Baca file JSON
    with open(input_file, 'r', encoding='utf-8') as f:
        data = json.load(f)

    # Ambil data yang diperlukan
    rows = []
    for key, value in data.items():
        rows.append({
            'NIS': value['nis'],
            'Username': value['username'],
            'Password': value['password']
        })

    # Buat DataFrame dan simpan ke Excel
    df = pd.DataFrame(rows)
    df.to_excel(output_file, index=False)

    print(f"File '{output_file}' berhasil dibuat dan siap untuk dicetak.")

# Jalankan fungsi
json_to_excel()