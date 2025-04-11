import os

def find_file(file_name, search_path):
    for root, dirs, files in os.walk(search_path):
        if file_name in files:
            return os.path.join(root, file_name)
    return None

# 'C:' sürücüsünde dosya araması
file_path = find_file('HomaPageImg.jpg', 'C:/')
if file_path:
    print(f"Dosya bulundu: {file_path}")
else:
    print("Dosya bulunamadı.")

# C:/Users\Eda Ergin\AppData\Local\Temp\9dea8d34-6652-4f2c-a95d-01f74d5f856f_archive.zip.56f\project1_df.csv