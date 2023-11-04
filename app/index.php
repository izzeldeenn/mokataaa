
<?php
// الخطوة 2: الاتصال بقاعدة البيانات والبحث فيها
// تعيين متغيرات الاتصال
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mokataaa";

// إنشاء اتصال
$conn = new mysqli($servername, $username, $password, $dbname);

// التحقق من الاتصال
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// تعيين الترميز
$conn->set_charset("utf8");

// الحصول على الكلمة الرئيسية من صندوق البحث
$keyword = $_GET["text"];

// كتابة استعلام SQL للبحث عن البيانات التي تحتوي على الكلمة الرئيسية
$sql = "SELECT * FROM company WHERE stutes LIKE '%$keyword%' or country LIKE '%$keyword%' or name LIKE '%$keyword%' or type LIKE '%$keyword%' or dis LIKE '%$keyword%'";

// تنفيذ الاستعلام والحصول على النتائج
$result = $conn->query($sql);

// إغلاق الاتصال
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>مقاطعة | مقاطعة المنتجات الإسرائيلية</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />

    </head>
    <body>
              <!-- Navigation-->
              <nav class="navbar navbar-expand-lg navbar-light fixed-top shadow-sm" id="mainNav">
            <div class="container px-5">
                <a class="navbar-brand fw-bold" href="#page-top">مقاطعة</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    القائمة
                    <i class="bi-list"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto me-4 my-3 my-lg-0">
                        <li class="nav-item"><a class="nav-link me-lg-3" href="../">الشركات</a></li>
                        <li class="nav-item"><a class="nav-link me-lg-3" href="../">تحميل التطبيق</a></li>
                    </ul>
                    <button class="btn btn-primary rounded-pill px-3 mb-2 mb-lg-0" data-bs-toggle="modal" data-bs-target="#feedbackModal">
                        <span class="d-flex align-items-center">
                            <i class="bi-chat-text-fill me-2"></i>
                            <span class="small">ارسال تعليق</span>
                        </span>
                    </button>
                </div>
            </div>
        </nav>
        <style>

            

.input {
  width: 100%;
  height: 40px;
  padding: 10px;
  transition: .2s linear;
  border: 2.5px solid black;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 2px;
}

.input:focus {
  outline: none;
  border: 0.5px solid black;
  box-shadow: -5px -5px 0px black;
}

.input-container:hover > .icon {
  animation: anim 1s linear infinite;
}

@keyframes anim {
  0%,
  100% {
    transform: translateY(calc(-50% - 5px)) scale(1);
  }

  50% {
    transform: translateY(calc(-50% - 5px)) scale(1.1);
  }
}
.button {
  background-color: #ffffff00;
  color: #000;
  width: 8.5em;
  height: 2.9em;
  border: #3654ff 0.2em solid;
  border-radius: 11px;
  text-align: right;
  transition: all 0.6s ease;
  transform: translateX(250px);
  margin-top:10px
}

.button:hover {
  background-color: #3654ff;
  cursor: pointer;
  color: #fff;
}

.button svg {
  width: 1.6em;
  margin: -0.2em 0.8em 1em;
  position: absolute;
  display: flex;
  transition: all 0.6s ease;
}

.button:hover svg {
  transform: translateX(5px);
}

.text {
  margin: 0 1.5em
}

        </style>
        <header class="masthead">
            <div class="container px-5">
                <div class="row gx-5 justify-content-center">
                    <div class="col-xl-8">
                    <div class="h1 fs-1 text-black mb-4 text-center">اعثر على الشركة الداعمة للاحتلال الصهيوني</div>
                        <form action="" method="get">

                        <input type="text" name="text" class="input" placeholder="بحث">
                        
<button class="button">

  
<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
  <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"></path>
</svg>


<div class="text">
  بحث
</div>

</button>
                        </form>
    <?php
    // الخطوة 2: عرض النتائج كصفوف في الجدول
    // التحقق من وجود نتائج
    if ($result->num_rows > 0) {
      // عرض كل صف كمصفوفة مقترنة
      while($row = $result->fetch_assoc()) {
        ?>
        <div class="result">
<div class="card">
    <div class="infos">
        <div class="image">
         <img src="img/<?php echo $row['photo'] ?>" alt="">
        </div>
        <div class="info">
            <div>
                <p class="name">
                <?php echo $row['name'] ?>
                </p>
                <p class="function">
                <?php echo $row['dis'] ?> 
                </p>
            </div>
            <div class="stats">
                    <p class="flex flex-col">
                        المقر الرئيسي
                        <span class="state-value">
                        <?php echo $row['country'] ?>
                        </span>
                    </p>
                    <p class="flex">
                        الحالة
                        <span class="state-value">
                        <?php echo $row['stutes'] ?>
                        </span>
                    </p>
                    
            </div>
        </div>
    </div>

</div>
</div>
<?php
}
    }
?>
                    </div>
                </div>
            </div>
        </header>
    </body>
    </html>
