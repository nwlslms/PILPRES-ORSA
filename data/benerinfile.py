import pandas as pd

def generate_username(namalengkap, nis):
    clean_name = namalengkap.replace(".", "")
    parts = clean_name.split()
    namadepan = parts[0]
    namabelakang = parts[1] if len(parts) > 1 else ''

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

    data = pd.read_excel(input_file)

    data[['username', 'namadepan', 'namabelakang']] = data.apply(
        lambda row: generate_username(row['namalengkap'], row['nis']),
        axis=1,
        result_type='expand'
    )

    if is_teacher and is_putra_json:
        data['username'] = data['username'] + '-PA'
    elif is_teacher:
        data['username'] = data['username'] + '-PI'

    data.to_excel(output_file, index=False)
    print(f"File '{output_file}' telah disimpan.")

process_excel_file()