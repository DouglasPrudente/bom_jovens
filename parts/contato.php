<div id="contato" class="container-fluid bg-grey">
    <h2 class="text-center">CONTATO</h2>
    <div class="row">
        <div class="col-sm-5">
            <p>Contate-nos, entraremos em contato dentro de 24 horas.</p>
            <p><span class="glyphicon glyphicon-map-marker"></span> Araras, SP</p>
            <p><span class="glyphicon glyphicon-phone"></span> +55 1997070-7070</p>
            <p><span class="glyphicon glyphicon-envelope"></span> bom_jovens@gmail.com.br</p>
        </div>
        <div class="col-sm-7 slideanim">
            <form action="sistema/controle/inserircon.php" method="post">
                <div class="row">
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="nome" name="nome" placeholder="Nome" type="text" required>
                    </div>
                    <div class="col-sm-6 form-group">
                        <input class="form-control" id="email" name="email" placeholder="E-mail" type="email" required>
                    </div>
                </div>
                <textarea class="form-control" id="comentario" name="comentario" placeholder="Comentário"
                          rows="5"></textarea><br>
                <div class="row">
                    <div class="col-sm-12 form-group">
                        <button class="btn btn-default pull-right" type="submit">Enviar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<footer class="container-fluid text-center">
    <a href="#myPage" title="To Top">
        <span class="glyphicon glyphicon-chevron-up"></span>
</footer>


<script>

    //script de animação da página
    $(document).ready(function () {
        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function (event) {
            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 900, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });

        $(window).scroll(function () {
            $(".slideanim").each(function () {
                var pos = $(this).offset().top;

                var winTop = $(window).scrollTop();
                if (pos < winTop + 600) {
                    $(this).addClass("slide");
                }
            });
        });
    })
</script>
