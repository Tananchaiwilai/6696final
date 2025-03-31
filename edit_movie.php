<?php
include("conn.php");
include("clogin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: "Kanit", sans-serif;
            background-color: #121212; /* Dark background */
            margin: 0;
            padding: 20px;
            color: #fff; /* White text for the body */
        }

        .page-container {
            background-color: #1e1e1e; /* Dark container */
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.4); /* Red-tinted shadow */
            padding: 30px;
            border: 2px solid #c10000; /* Dark red border */
        }

        h1 {
            color: #ffdd00; /* Bright yellow */
            font-weight: 800;
            margin-bottom: 30px;
            border-bottom: 3px solid #c10000; /* Dark red */
            padding-bottom: 15px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-size: 2.8rem; /* Increased font size */
            text-shadow: 0 0 10px #ffdd00, 0 0 20px #ffdd00, 0 0 30px #ffdd00; /* Yellow glowing effect */
            animation: yellowGlow 1.5s ease-in-out infinite alternate;
            line-height: 1.3;
        }

        @keyframes yellowGlow {
            from {
                text-shadow: 0 0 10px #ffdd00, 0 0 20px #ffdd00;
            }
            to {
                text-shadow: 0 0 15px #ffdd00, 0 0 25px #ffdd00, 0 0 35px #ffdd00, 0 0 45px #ffdd00;
            }
        }

        .form-control, .form-select {
            background-color: #2a2a2a;
            border-radius: 5px;
            border-color: #c10000; /* Dark red */
            color: #fff;
        }

        .form-control:focus, .form-select:focus {
            background-color: #2a2a2a;
            border-color: #ff3333;
            box-shadow: 0 0 0 0.25rem rgba(255, 51, 51, 0.25);
            color: #fff;
        }

        label {
            color: #ff3333; /* Bright red */
            font-weight: 500;
            margin-bottom: 8px;
        }

        .btn-primary {
            background-color: #c10000; /* Dark red */
            border-color: #900000;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #ff3333; /* Bright red */
            border-color: #c10000;
            transform: scale(1.05);
        }

        .btn-danger {
            background-color: #500000; /* Very dark red */
            border-color: #300000;
            transition: all 0.3s ease;
        }

        .btn-danger:hover {
            background-color: #700000;
            border-color: #500000;
            transform: scale(1.05);
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #ff3333; /* Bright red */
            font-size: 0.9em;
        }

        .alert-success {
            background-color: #1e2e1e;
            color: #4CAF50;
            border-color: #4CAF50;
        }

        .alert-danger {
            background-color: #2e1e1e;
            color: #ff3333;
            border-color: #c10000;
        }

        .alert-warning {
            background-color: #2e2e1e;
            color: #FFC107;
            border-color: #FFC107;
        }

        /* ส่วนของ User Info Box */
        .user-info-container {
            margin-bottom: 25px;
        }
        
        .user-info-box {
            display: flex;
            align-items: center;
            background-color: #2a2a2a;
            border: 2px solid #c10000;
            border-radius: 8px;
            padding: 12px 20px;
            margin: 20px 0;
            box-shadow: 0 4px 8px rgba(255, 0, 0, 0.2);
        }
        
        .user-info-title {
            font-weight: 600;
            color: #ffdd00;
            margin-right: 10px;
            white-space: nowrap;
        }
        
        .user-info-data {
            color: #fff;
            border-left: 2px solid #c10000;
            padding-left: 15px;
            margin-left: 5px;
        }

        .edit-form {
            background-color: #2a2a2a;
            border-radius: 10px;
            border: 1px solid #c10000;
            padding: 25px;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(255, 0, 0, 0.2);
        }

        .movie-id-badge {
            background-color: #c10000;
            color: #fff;
            font-weight: 600;
            padding: 5px 15px;
            border-radius: 5px;
            display: inline-block;
        }

        @media (max-width: 768px) {
            .page-container {
                padding: 15px;
            }
            h1 {
                font-size: 2.2rem; /* Slightly smaller on mobile */
            }
        }

        @media (min-width: 992px) {
            h1 {
                font-size: 3.2rem; /* Even larger on desktops */
            }
        }
    </style>

    <title>แก้ไขข้อมูลนักเตะ</title>
</head>

<body>
    <div class="container page-container">
        <div class="user-info-container">
            <h1 class="text-center">แก้ไขข้อมูลนักเตะ</h1>
            
            <div class="user-info-box">
                <div class="user-info-title">ผู้เข้าสู่ระบบ :</div>
                <div class="user-info-data">พัฒนาโดย 664485034 กิตตินันท์ จิระราชวโร </div>
            </div>
        </div>

        <?php
        if(isset($_GET['action_even']) && $_GET['action_even']=='edit'){
            $movie_id = $_GET['id'];
            $sql = "SELECT * FROM นักฟุตบอลแมนยู WHERE id=$id";
            $result = $conn->query($sql);
            
            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
            } else {
                echo "<div class='alert alert-warning text-center'>ไม่พบข้อมูลที่ต้องการแก้ไข กรุณาตรวจสอบ</div>";
                echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'>กลับไปหน้าแสดงข้อมูล</a></div>";
                exit();
            }
        } else {
            echo "<div class='alert alert-danger text-center'>ไม่ได้ระบุข้อมูลที่ต้องการแก้ไข</div>";
            echo "<div class='text-center mt-3'><a href='show.php' class='btn btn-primary'>กลับไปหน้าแสดงข้อมูล</a></div>";
            exit();
        }
        ?>

        <div class="edit-form">
            <form action="edit_1.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ชื่อ</label>
                    </div>
                    <div class="col-sm-8">
                        <div class="ชื่อ"><?php echo $row['ชื่อ']; ?></div>
                    </div>
                </div>
               
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">นามสกุล</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="นามสกุล" class="form-control" maxlength="100" value="<?php echo $row['นามสกุล']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">วันเกิด</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="วันเกิด" class="form-control" maxlength="100" value="<?php echo $row['วันเกิด']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ตำแหน่ง</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ตำแหน่ง" class="form-control" maxlength="100" value="<?php echo $row['ตำแหน่ง']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">หมายเลขเสื้อ</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="หมายเลขเสื้อ" class="form-control" maxlength="10" value="<?php echo $row['หมายเลขเสื้อ']; ?>" required>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">ปีที่เข้าร่วม</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="ปีที่เข้าร่วม" class="form-control" maxlength="50" value="<?php echo $row['ปีที่เข้าร่วม']; ?>" required>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-sm-4">
                        <label class="form-label">สัญชาติ</label>
                    </div>
                    <div class="col-sm-8">
                        <input type="text" name="สัญชาติ" class="form-control" maxlength="50" value="<?php echo $row['สัญชาติ']; ?>" required>
                    </div>
                </div>
               
                <div class="row mb-3 mt-4">
                    <div class="col-sm-12 d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary flex-grow-1 me-2">
                            <i class="bi bi-check-circle me-2"></i>บันทึกข้อมูล
                        </button>
                        <a href="show.php" class="btn btn-danger flex-grow-1">
                            <i class="bi bi-x-circle me-2"></i>ยกเลิก
                        </a>
                    </div>
                </div>
            </form>
        </div>

        <div class="footer mt-4">
            พัฒนาโดย 664485034 กิตตินันท์ จิระราชวโร
        </div>
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>