import pandas as pd

def generate_username(namalengkap, nis):
    # Hilangkan titik dari nama
    clean_name = namalengkap.replace(".", "")
    parts = clean_name.split()
    namadepan = parts[0]
    namabelakang = parts[1] if len(parts) > 1 else ''

    # Buat username tanpa spasi dan huruf kecil semua
    username = (namadepan + str(nis) + namabelakang).lower().replace(" ", "")
    return username, namadepan, namabelakang

def process_excel_file():
    print("Created by: NaiulaID")
    print("==========================================================")
    print("For more information, contact me at: @nwlslms")
    print("==========================================================")

    input_file = input("Masukkan file .xlsx: ")
    output_file = input_file.split('.')[0] + '_baru.xlsx'

    is_teacher = input("File berisi guru? (Y/N): ").lower() == 'y'
    is_putra_json = input("Apakah file ini adalah 'putra.json'? (Y/N): ").lower() == 'y'

    # Baca file Excel
    data = pd.read_excel(input_file)

    # Buat kolom username, nama depan, nama belakang
    data[['username', 'namadepan', 'namabelakang']] = data.apply(
        lambda row: generate_username(row['namalengkap'], row['nis']),
        axis=1,
        result_type='expand'
    )

    # Tambahkan suffix jika file guru
    if is_teacher and is_putra_json:
        data['username'] = data['username'] + '-PA'
    elif is_teacher:
        data['username'] = data['username'] + '-PI'

    # Simpan ke file baru
    data.to_excel(output_file, index=False)
    print(f"File '{output_file}' telah disimpan.")

# Jalankan proses
process_excel_file()