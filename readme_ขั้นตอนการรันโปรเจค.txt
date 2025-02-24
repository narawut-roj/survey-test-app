
ก่อนที่จะรันโปรเจคนี้, จะต้องติดตั้งซอฟต์แวร์ต่อไปนี้บนเครื่อง:

- **PHP** (>= 7.4)
- **Composer** (สำหรับจัดการแพ็กเกจของ PHP)
- **MySQL** (หรือ MariaDB สำหรับจัดการฐานข้อมูล)
- **XAMPP** (แนะนำสำหรับการพัฒนาในเครื่อง)
- **Node.js** (สำหรับจัดการ dependencies ของ frontend)
- **Git** (สำหรับจัดการโค้ดเวอร์ชัน)

## 🔹 ขั้นตอนการติดตั้ง

### 1️. โคลนโปรเจคจาก GitHub
เปิด **Terminal / Command Prompt** และรันคำสั่ง:
# โคลนโปรเจคจาก GitHub
git clone https://github.com/narawut-roj/survey-test-app.git
cd survey-test-app

### 2.️ ติดตั้ง dependencies ของ Laravel
composer install

### 3.️ ตั้งค่าไฟล์ .env
คัดลอกไฟล์ `.env.example` และเปลี่ยนชื่อเป็น `.env`
cp .env.example .env  # Linux / Mac
mv .env.example .env   # Windows (ใช้ Git Bash)
จากนั้นเปิดไฟล์ `.env` และตั้งค่าการเชื่อมต่อฐานข้อมูล:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=surveydb
DB_USERNAME=root  # ปกติค่าเริ่มต้นของ XAMPP
DB_PASSWORD=      # ปกติเป็นค่าว่างใน XAMPP

### 4️. สร้างฐานข้อมูล และ Migrate ตาราง
ใช้ไฟล์ SQL ที่ให้มา
`surveydb.sql` และต้องการนำเข้าฐานข้อมูล:
1. เปิด **phpMyAdmin** (`http://localhost/phpmyadmin`)
2. สร้างฐานข้อมูลใหม่ ชื่อ `surveydb`
3. นำเข้าไฟล์ `surveydb.sql`

### 5️. ติดตั้ง dependencies ของ Frontend
npm install

### 6️. รันโปรเจค Laravel
php artisan serve หรือ composer run dev

แอปจะทำงานที่ **http://127.0.0.1:8000** 

ขอบคุณครับ ได้ลองทำ laravel ครั้งเเรกปวดหัว แต่สนุกดีครับ
---

