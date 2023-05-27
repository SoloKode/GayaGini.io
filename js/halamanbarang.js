// const mysql = require('mysql');
// const connection = mysql.createConnection({
//     host: 'sql302.epizy.com',
//     user: 'epiz_34257998',
//     password: 'nj6hYqBStN',
//     database: 'epiz_34257998_databarang',
//     port: 3306,
//   });
  
//   // Membuka koneksi
//   connection.connect((err) => {
//     if (err) {
//       console.error('Error connecting to MySQL database:', err);
//       return;
//     }
//     console.log('Connected to MySQL database');
//   });
  
//   // Menutup koneksi saat selesai
//   connection.end();
  
  const mysql = require('mysql');
const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'databarang',
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
  
  function getBarangByKategoriId(kategoriId) {
    const query = 'SELECT * FROM barang WHERE kategori_id = ?';
    connection.query(query, [kategoriId], (error, results, fields) => {
      if (error) {
        console.error('Error executing query:', error);
        return;
      }
      console.log(results); // Menampilkan hasil query, Anda dapat memanipulasinya sesuai kebutuhan
      // Panggil fungsi untuk menampilkan hasil ke halaman HTML
    });
  }
  // Menutup koneksi saat selesai
  connection.end();
  