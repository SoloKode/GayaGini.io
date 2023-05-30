const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'databarang'
  });
  
  // Membuka koneksi
  connection.connect((error) => {
    if (error) throw error;
    console.log('Terhubung ke basis data MySQL');
    
    // Lakukan operasi database di sini
    // Misalnya, menjalankan query, menambahkan data, atau mengambil data
  });
  
  // Menutup koneksi ketika selesai
  connection.end();