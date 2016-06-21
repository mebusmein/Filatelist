</body>

<footer>

    <!--copyright footer-->
    <div class="col-md-11">
        <p class="text-right" style="font-size: 12px;">&copy; 2016 - Project thema 2.4</p>
    </div>

    <!-- Loads JS files -->
    <script src="<?php echo base_url('assets/js/jquery.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/lodash.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/bootstrap.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/js/clean-blog.min.js') ?>"></script>

</footer>

<!-- Makes carousel do its magic -->

<script language="JavaScript" type="text/javascript">
    $(document).ready(function(){
        $('.carousel').carousel({
            interval: 10000
        })
    });
</script>

<script>
    $(function() {

        $('#login-form-link').click(function(e) {
            $("#login-form").delay(100).fadeIn(100);
            $("#register-form").fadeOut(100);
            $('#register-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });
        $('#register-form-link').click(function(e) {
            $("#register-form").delay(100).fadeIn(100);
            $("#login-form").fadeOut(100);
            $('#login-form-link').removeClass('active');
            $(this).addClass('active');
            e.preventDefault();
        });

    });

</script>


</html>