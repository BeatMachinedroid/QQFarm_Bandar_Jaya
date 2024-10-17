<?php
if(isset($_GET['kode'])){
            $kode = base64_decode($_GET['kode']);
            $delstmt = $koneksi->prepare("DELETE FROM tb_pakan_masuk where id = ?");
            $delstmt->bind_param("i", $kode);

            if ($delstmt->execute()) {
                echo "<script>
                Swal.fire({title: 'Hapus Data Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pakan-masuk';
                    }
                })</script>";
                }else{
                echo "<script>
                Swal.fire({title: 'Hapus Data Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.value) {
                        window.location = 'index.php?page=data-pakan-masuk';
                    }
                })</script>";
            }
        }

