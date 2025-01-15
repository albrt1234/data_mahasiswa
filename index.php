<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">

    <nav class="bg-gray-800 text-white p-4">
        <div class="container mx-auto">
            <span class="text-xl font-bold">INPUT DATA MAHASISWA</span>
        </div>
    </nav>

    <div class="container mx-auto mt-8">
        <h4 class="text-center text-2xl font-semibold mb-4">DATA MAHASISWA</h4>

        <?php
            include "koneksi.php";

            if (isset($_GET['id'])) {
                $id = htmlspecialchars($_GET["id"]);

                $sql = "delete from peserta where id='$id'";
                $hasil = mysqli_query($kon, $sql);

                if ($hasil) {
                    header("Location:index.php");
                } else {
                    echo "<div class='bg-red-500 text-white p-4 rounded'>Data Gagal dihapus.</div>";
                }
            }
        ?>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="py-2 px-4">No</th>
                        <th class="py-2 px-4">Nama</th>
                        <th class="py-2 px-4">NPM</th>
                        <th class="py-2 px-4">Kelas</th>
                        <th class="py-2 px-4">Jurusan</th>
                        <th class="py-2 px-4">Fakultas</th>
                        <th class="py-2 px-4">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        include "koneksi.php";
                        $sql = "select * from peserta order by id desc";
                        $hasil = mysqli_query($kon, $sql);
                        $no = 0;
                        while ($data = mysqli_fetch_array($hasil)) {
                            $no++;
                    ?>
                    <tr class="border-b hover:bg-gray-100">
                        <td class="py-2 px-4 text-center"><?php echo $no; ?></td>
                        <td class="py-2 px-4"><?php echo $data["nama"]; ?></td>
                        <td class="py-2 px-4"><?php echo $data["npm"]; ?></td>
                        <td class="py-2 px-4"><?php echo $data["kelas"]; ?></td>
                        <td class="py-2 px-4"><?php echo $data["jurusan"]; ?></td>
                        <td class="py-2 px-4"><?php echo $data["fakultas"]; ?></td>
                        <td class="py-2 px-4 flex space-x-2">
                            <a href="update.php?id=<?php echo htmlspecialchars($data['id']); ?>" class="bg-yellow-500 hover:bg-yellow-600 text-white py-1 px-3 rounded">Update</a>
                            <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>?id=<?php echo $data['id']; ?>" class="bg-red-500 hover:bg-red-600 text-white py-1 px-3 rounded">Delete</a>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            <a href="create.php" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Tambah Data</a>
        </div>
    </div>
</body>
</html>
