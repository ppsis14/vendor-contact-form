# vendor-contact-form
lab04 Basic PHP

เป็น form ที่ใช้ในการติดต่อกับ vendor ในการที่จะขอยื่นใบเสนอราคาสินค้าที่จะสั่งซื้อสินค้าจากการ import CSV ไฟล์
หรือการแจ้งปัญหาที่เกิดขึ้นกับสินค้าเมื่อได้รับ โดยการ upload รูปภาพขึ้นไปเพื่อแจ้งปัญหาได้มากกว่า 1 รูป

> วิธีการติดตั้งบน local server
* หากใช้ laragon เมื่อดาวน์โหลด folder ไปแล้ว ให้ extract file laragon/wwww/<โฟลเดอร์ที่โหลดมา>
ต่อมาเปิดหน้า web browser สามารถเข้าถึงเว็บเพจได้ด้วยการ localhost/vendor-contact-form/ หรือ vendor-contact-form.test
* หากใช้ xampp เมื่อดาวน์โหลด folder ไปแล้ว ให้ extract file xampp/htdocs/<โฟลเดอร์ที่โหลดมา>
ต่อมาเปิดหน้า web browser สามารถเข้าถึงเว็บเพจได้ด้วยการ localhost/vendor-contact-form/

ใน folder จะให้ CSV template ใช้สำหรับกรอกข้อมูลสินค้าที่ต้องการเสนอราคาซื้อสินค้ากับ vendor ซึ่งสามารถกรอกได้ผ่าน excel
> วิธีการ import CSV file สามารถดูได้ที่ <https://www.ablebits.com/office-addins-blog/2014/05/01/convert-csv-excel/>
และเมื่อกรอกข้อมูลตาม template ครบแล้ว ให้ save เป็น .csv สามารถดูได้ที่ <https://www.ablebits.com/office-addins-blog/2014/04/24/convert-excel-csv/> โดยอย่าลืมเลือก Save as type -> CSV (comma delimited)
