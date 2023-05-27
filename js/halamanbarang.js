const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'sql302.epizy.com',
    user: 'epiz_34257998',
    password: 'nj6hYqBStN',
    database: 'epiz_34257998_databarang',
    port: 3306,
  });
  
  // Membuka koneksi
  connection.connect((err) => {
    if (err) {
      console.error('Error connecting to MySQL database:', err);
      return;
    }
    console.log('Connected to MySQL database');
  });
  
  // Menutup koneksi saat selesai
  connection.end();
  