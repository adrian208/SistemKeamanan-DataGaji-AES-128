<?= $this->extend('templates/index'); ?>

<?= $this->Section('page-content'); ?>
<header class="text-" style="background-color: #3a9c6f;">
    <div class="container px-50">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6">
                <div class="my-5 text-center text-xl-start">
                    <h1 class="display-5 fw-bolder text-drak mb-2">Centro Futsal </h1>
                    <p class="lead fw-normal text-drak mb-4">Centro Futsal terletak di jogja </p>
                    <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                        <a class="btn btn-primary btn-lg px-4 me-sm-3" href="#features">Boking Sekarang</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5 img-thumbnail" src="<?= base_url(); ?>/img/istanaratuboko.jpg" alt="Centro jogja" /></div>

        </div>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,96L8.9,122.7C17.8,149,36,203,53,218.7C71.1,235,89,213,107,176C124.4,139,142,85,160,80C177.8,75,196,117,213,154.7C231.1,192,249,224,267,224C284.4,224,302,192,320,202.7C337.8,213,356,267,373,250.7C391.1,235,409,149,427,133.3C444.4,117,462,171,480,197.3C497.8,224,516,224,533,213.3C551.1,203,569,181,587,170.7C604.4,160,622,160,640,176C657.8,192,676,224,693,250.7C711.1,277,729,299,747,298.7C764.4,299,782,277,800,250.7C817.8,224,836,192,853,192C871.1,192,889,224,907,245.3C924.4,267,942,277,960,256C977.8,235,996,181,1013,154.7C1031.1,128,1049,128,1067,144C1084.4,160,1102,192,1120,176C1137.8,160,1156,96,1173,96C1191.1,96,1209,160,1227,170.7C1244.4,181,1262,139,1280,128C1297.8,117,1316,139,1333,176C1351.1,213,1369,267,1387,266.7C1404.4,267,1422,213,1431,186.7L1440,160L1440,320L1431.1,320C1422.2,320,1404,320,1387,320C1368.9,320,1351,320,1333,320C1315.6,320,1298,320,1280,320C1262.2,320,1244,320,1227,320C1208.9,320,1191,320,1173,320C1155.6,320,1138,320,1120,320C1102.2,320,1084,320,1067,320C1048.9,320,1031,320,1013,320C995.6,320,978,320,960,320C942.2,320,924,320,907,320C888.9,320,871,320,853,320C835.6,320,818,320,800,320C782.2,320,764,320,747,320C728.9,320,711,320,693,320C675.6,320,658,320,640,320C622.2,320,604,320,587,320C568.9,320,551,320,533,320C515.6,320,498,320,480,320C462.2,320,444,320,427,320C408.9,320,391,320,373,320C355.6,320,338,320,320,320C302.2,320,284,320,267,320C248.9,320,231,320,213,320C195.6,320,178,320,160,320C142.2,320,124,320,107,320C88.9,320,71,320,53,320C35.6,320,18,320,9,320L0,320Z"></path>
    </svg>
</header>

<div class="py-5 " style="background-color: #ffffff;">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-10 col-xl-7">
                <div class="text-center">
                    <div class="fs-4 mb-4 fst-italic">"Working with Start Bootstrap templates has saved me tons of development time when building new projects! Starting with a Bootstrap template just makes things easier!"</div>
                    <div class="d-flex align-items-center justify-content-center">
                        <img class="rounded-circle me-3" src="<?= base_url(); ?>/img/logo.jpg" alt="..." />
                        <div class="fw-bold">
                            Tom Ato
                            <span class="fw-bold text-primary mx-1">/</span>
                            CEO, Pomodoro
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>