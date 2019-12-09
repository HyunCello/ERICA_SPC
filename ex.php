<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <title>SPC</title>
    <script src="script/main.js"></script>
</head>
<body>
    <div>
    
         <header>
            <p>
                SPC : 정치 공약 모음
            </p>
        </header>

        <nav>
            <div>
                <p>
                    <?php
                        print "정치 공약들을 정리해서 보여드립니다.";
                    ?>
                </p>
            </div>        
        </nav>
        <aside>
        <div id="myTopnav" class="topnav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">
                &times; <!--close 버튼-->
            </a>
            <a href="index.php">
                메인 화면
            </a>
            <a href="ex.php">
                지난 선거 공약
            </a>
            <a href="https://naver.com">
                당선인 공약
            </a>
            <a href="#">
                인물별 공약 분류
            </a>
        </div>
        <span style="font-size:30px;cursor:pointer" onclick="openNav()">
            &#9776; Menu <!--open 버튼-->
        </span>
               
            </aside>
        
        <article>
            <section>
            <?php
				$playlist_m3u = glob("crawling/crawlled/*.m3u");
					foreach($playlist_m3u as $playlist) { ?>
					<?php 
					$files = file($playlist);
						foreach ($files as $file){?>
							<div>
								<?php
								$pos = stripos($file,"#");
								if ($pos !== 0){ ?>
								<p><?= $file ?> <?=stripos($file, "#")?></p>
								<?php } ?>
							</div>
						<?php } ?>
					<?php } ?>
            
            </section>
        </article>

        <footer>
            <p>
                만든 사람 : 김유현, 김현수
            </p>
            

        </footer>

    </div>


</body>
</html>
