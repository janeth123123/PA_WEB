<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travels</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <nav>
      <div class="layar-dalam">
        <div class="logo">
          <a href=""><img src="/project_PA/asset/logo-white.png" class="putih" /></a>
          <a href=""><img src="/project_PA/asset/logo-black.png" class="hitam" /></a>
        </div>
        <div class="menu">
          <a href="#" class="tombol-menu">
            <span class="garis"></span>
            <span class="garis"></span>
            <span class="garis"></span>
          </a>
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#aboutus">Tentang Kami</a></li>
            <li><a href="#support">Support</a></li>
            <li><a href="#blog">Blog</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="layar-penuh">
      <header id="home">
        <div class="overlay"></div>
        <video autoplay muted loop>
          <source src="/project_PA/asset/traveldunia.mp4" type="video/mp4" />
        </video>
        <div class="intro">
          <h3>Visit Indonesia</h3>
          <p>
          "Siapa yang hidup melihat, tetapi yang bepergian melihat lebih banyak." 
          </p>
          <p>
            <a href="/project_PA/user/login.php" class="tombol">LOGIN</a>
          </p>
        </div>
      </header>
      <main>
        <section id="aboutus">
          <div class="layar-dalam">
            <h3>Tentang Kami</h3>
            <p class="ringkasan">
            “Siap untuk mengubah impian petualangan menjadi kenyataan? 
            Wujudkan mimpi Anda untuk menjelajahi tempat-tempat eksotis 
            dan menciptakan kenangan tak terlupakan.”
            </p>
            <div class="konten-isi">
              <p>
              “Tunggu apa lagi untuk memulai petualangan Anda? Temukan keindahan 
              tempat-tempat eksotis dan ciptakan kenangan yang tak terlupakan. Kami 
              menawarkan berbagai destinasi wisata yang menakjubkan, mulai dari pantai 
              yang indah, pegunungan yang memukau, hingga kota-kota bersejarah yang kaya 
              akan budaya. Dengan layanan yang penuh perhatian, kami akan memastikan 
              setiap perjalanan Anda menjadi pengalaman yang tak terlupakan.”
              </p>
            </div>
          </div>
        </section>
        <section class="abuabu" id="support">
          <div class="layar-dalam support">
            <div>
              <img src="/project_PA/asset/matahari.png" />
              <h6>Dalam Setiap Kondisi</h6>
              <p>
              "Dalam setiap kondisi, kami siap memberikan layanan terbaik, memastikan 
              kenyamanan dan kepuasan Anda, meski dalam tantangan yang paling sulit sekalipun."
              </p>
            </div>
            <div>
              <img src="/project_PA/asset/tas.png" />
              <h6>Pengalaman Terbaik</h6>
              <p>
              "Kami menawarkan pengalaman terbaik yang dirancang untuk memenuhi setiap kebutuhan Anda, 
              memberikan kenyamanan dan kepuasan dalam setiap langkah perjalanan."
              </p>
            </div>
            <div>
              <img src="/project_PA/asset/kompas.png" />
              <h6>Rekomendasi Terpercaya</h6>
              <p>
              "Kami memberikan rekomendasi terpercaya untuk setiap perjalanan Anda, memastikan 
              Anda mendapatkan pengalaman yang terbaik dan paling memuaskan di setiap destinasi."
              </p>
            </div>
          </div>
        </section>
        <section class="quote">
          <div class="layar-dalam">
            <p>Jogja terbuat dari rindu, pulang dan angkringan.</p>
          </div>
        </section>
        <section class="abuabu" id="blog">
          <div class="layar-dalam">
            <h3>Blog Terbaru</h3>
            <p class="ringkasan">
            "Temukan artikel terbaru kami yang penuh wawasan dan inspirasi, 
            memberikan informasi terkini seputar dunia perjalanan."
            </p>
            <div class="blog">
              <div class="area">
                <div
                  class="gambar"
                  style="background-image: url('/project_PA/asset/grand_canyon.jpg')"
                ></div>
                <div class="text">
                  <article>
                    <h4><a href="#">Bagaimana dengan AS?</a></h4>
                    <p>
                    “Keajaiban Grand Canyon tidak dapat digambarkan secara memadai melalui 
                    simbol-simbol ucapan, atau melalui ucapan itu sendiri.” 
                    </p>
                  </article>
                </div>
              </div>
              <div class="area">
                <div
                  class="gambar"
                  style="background-image: url('/project_PA/asset/pantai_kuta.jpg')"
                ></div>
                <div class="text">
                  <article>
                    <h4><a href="#">Bagaimana dengan Bali?</a></h4>
                    <p>
                    "Pantai memberikan pengalaman romantis yang tak terlupakan."
                    </p>
                  </article>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
    </div>
    <script
      src="https://code.jquery.com/jquery-3.6.0.min.js"
      integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
      crossorigin="anonymous"
    ></script>
    <script src="javascript.js"></script>
  </body>
</html>
