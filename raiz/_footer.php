        <!-- Footer -->
        <footer class="large-12 columns">
            <hr>
            <div class="large-4 columns logo">
                <img src="images/logo-footer.png" width="188" height="130">
            </div>
            <div class="large-4 columns">
                <h2>AllCred Matriz</h2>
                <p>
                    Rua Major Mendonça, 1369 - Vila Santo Antônio<br />
                    Franca - Sao_Paulo<br>
                    14401-161<br />
                    <a href="tel:16 3722 0269"><strong>(16) 3030-7055</strong></a><br>
                    sac@allcredpromotora.com.br
                </p>
            </div>
            <!--
            <div class="large-4 columns">
                <h2>Outras Unidades</h2>
                <ul class="left fifty">
                    <li>Monte Alto - SP</li>
                    <li>Morro Agudo - SP</li>
                    <li>Franca - SP</li>
                    <li>São Joaquim da Barra - SP</li>
                    <li>Orlândia - SP</li>
                    <li>Igarapava - SP</li>
                </ul>
                <ul>
                    <li>Ituverava - SP</li>
                    <li>São Carlos - SP</li>
                    <li>Araraquara - SP</li>
                    <li>Sertãozinho - SP</li>
                    <li>Batatais - SP</li>
                    <li>Ribeirão Preto - SP</li>
                </ul>
            </div>
            -->
            <div class="large-4 columns">
                <p class="big-phone center"><a href="tel:16 3722 0269">(16) 3030-7055</a></p>
                <p class="center">
                    © 2022 - ALL Cred Promotora.<br>
                    Todos os direitos reservados.<br>
                    Desenvolvido por <a href="http://www.dinaweb.com.br" target="_blank">Dinaweb Marketing Digital</a><br>
                    IP: <strong><?php echo $ip; ?></strong>
                </p>
            </div>
        </footer>
    </div>
    <!--[if (!IE)|(gt IE 8)]><!-->
        <script src="javascripts/jquery-2.1.0.min.js"></script>
    <!--<![endif]-->
    <!--[if lte IE 8]>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <![endif]-->
    <script src="javascripts/foundation.min.js"></script>
    <script src="javascripts/modernizr.js"></script>
    <script src="javascripts/jquery.magnific-popup.min.js" async="" defer=""></script>
    <script src="javascripts/app.js" async="" defer=""></script>
    <script src="javascripts/jquery.inputmask.bundle.min.js"></script>
    <script src="javascripts/cidades-estados-1.4-utf8.js"></script>
    <script type="text/javascript"> 
        /*
        window.onload = function() {
  			new dgCidadesEstados({
    			estado: document.getElementById('proposal_estado'),
    			cidade: document.getElementById('proposal_cidade')
  			});
        }
        */
        /* Slide menu
        $(document).ready(function(){
            $("#mainmenu li.has-dropdown").hover(
                function(){ 
                    $("#mainmenu ul ul").slideDown();
                },
                function(){ 
                    $("#mainmenu ul ul").slideUp();
                }
            )
        })
        */
        $(document).ready(function() {
            $(".toggle-topbar a").click(
                function(){
                    $("#mainmenu").toggle("slow");
                }
            )
        });

        $(document).ready(function(){
            $("#proposal_value").inputmask({
                alias:"numeric",
                prefix: "R$ ",
                placeholder: "0",
                groupSeparator: ".",
                digits: 2,
                radixPoint: ",",
                autoGroup: !0,
                digitsOptional: !1,
                clearMaskOnLostFocus: !1
            });  //static mask
        
            $("#proposal_cpf").inputmask("999.999.999-99");

            $("#proposal_phone").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", ], 
                keepStatic: true
            });
            $("#proposal_celwhats").inputmask({
                mask: ["(99) 9999-9999", "(99) 99999-9999", ], 
                keepStatic: true
            });
            $("#proposal_zipcode").inputmask("99999-999");
            $("#proposal_birth").inputmask("99/99/9999");
        });

        $(window).ready(function() {
            var wi = $(window).width();
            $(window).resize(function() {
                var wi = $(window).width();
                var newcont = wi - 250;
                if (wi > 600 && wi < 1240){
                    $('.content').css('width', newcont);
                } 
            });            
        });
        </script>
        <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1582680181980778'); // Insert your pixel ID here.
fbq('track', 'PageView');
fbq('track', 'ViewContent');
</script>
<noscript><img height="1" width="1" style="display:none"
src="https://www.facebook.com/tr?id=1582680181980778&ev=PageView&noscript=1"
/></noscript>
<!-- DO NOT MODIFY -->
<!-- End Facebook Pixel Code -->

    <!-- Remarketing Facebook -->
    <script>
        (function() {
            var _fbq = window._fbq || (window._fbq = []);
            if (!_fbq.loaded) {
                var fbds = document.createElement('script');
                fbds.async = true;
                fbds.src = '//connect.facebook.net/en_US/fbds.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(fbds, s);
                _fbq.loaded = true;
            }
            _fbq.push(['addPixelId', '1582680181980778']);
        })();
        window._fbq = window._fbq || [];
        window._fbq.push(['track', 'PixelInitialized', {}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=1582680181980778&amp;ev=PixelInitialized" /></noscript>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-62593540-1', 'auto');
        ga('send', 'pageview');
    </script>

</body>
</html>