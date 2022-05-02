    </div>
<!-- Display form submission status -->
<footer>
    <!--<div class="status"></div>-->
    
    <!-- Subscription form -->
    <center class="mt-5 pt-5">
        <form action="./db/add_subscriber.php" id="subsFrm" method="post">
            <input type="text" name="name" id="name" placeholder="Full Name" required="">
            <input type="email" name="email" id="email" placeholder="E-mail" required="">
            <!--<input type="button" id="subscribeBtn" value="Subscribe Now">-->
            <button name="submitttt" type="submit">Subscribe Now</button>
        </form>
    </center>
</footer>
<script>
$(document).ready(function(){
    $('#subscribeBtn').on('click', function(){
        // Remove previous status message
        $('.status').html('');

        // Email and name regex
        var regEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;

        // Get input values
        var name = $('#name').val();
        var email = $('#email').val();

        // Validate input fields
        if(name.trim() == '' ){
            alert('Please enter your name.');
            $('#name').focus();
            return false;
        }else if (!regName.test(name)){
            alert('Please enter a valid name (first & last name).');
            $('#name').focus();
            return false;
        }else if(email.trim() == '' ){
            alert('Please enter your email.');
            $('#email').focus();
            return false;
        }else if(email.trim() != '' && !regEmail.test(email)){
            alert('Please enter a valid email.');
            $('#email').focus();
            return false;
        }else{
            // Post subscription form via Ajax
            $.ajax({
                type:'POST',
                url:'subscription.php',
                dataType: "json",
                data:{subscribe:1,name:name,email:email},
                beforeSend: function () {
                    //$('#subscribeBtn').attr("disabled", "disabled");
                    $('.content-frm').css('opacity', '.5');
                },
                success: function(data){
                    if(data.status == 'ok'){
                        $('#subsFrm')[0].reset();
                        $('.status').html('<p class="success">'+data.msg+'</p>');
                    }else{
                        $('.status').html('<p class="error">'+data.msg+'</p>');
                    }
                    $('#subscribeBtn').removeAttr("disabled");
                    $('.content-frm').css('opacity', '');
                }
            });
        }
    });
});

(function($bs) {
  const CLASS_NAME = 'has-child-dropdown-show';
  $bs.Dropdown.prototype.toggle = function(_orginal) {
    return function() {
      document.querySelectorAll('.' + CLASS_NAME).forEach(function(e) {
        e.classList.remove(CLASS_NAME);
      });
      let dd = this._element.closest('.dropdown').parentNode.closest('.dropdown');
      for (; dd && dd !== document; dd = dd.parentNode.closest('.dropdown')) {
        dd.classList.add(CLASS_NAME);
      }
      return _orginal.call(this);
    }
  }($bs.Dropdown.prototype.toggle);

  document.querySelectorAll('.dropdown').forEach(function(dd) {
    dd.addEventListener('hide.bs.dropdown', function(e) {
      if (this.classList.contains(CLASS_NAME)) {
        this.classList.remove(CLASS_NAME);
        e.preventDefault();
      }
      e.stopPropagation(); // do not need pop in multi level mode
    });
  });

  // for hover
  document.querySelectorAll('.dropdown-hover, .dropdown-hover-all .dropdown').forEach(function(dd) {
    dd.addEventListener('mouseenter', function(e) {
      let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
      if (!toggle.classList.contains('show')) {
        $bs.Dropdown.getOrCreateInstance(toggle).toggle();
        dd.classList.add(CLASS_NAME);
        $bs.Dropdown.clearMenus();
      }
    });
    dd.addEventListener('mouseleave', function(e) {
      let toggle = e.target.querySelector(':scope>[data-bs-toggle="dropdown"]');
      if (toggle.classList.contains('show')) {
        $bs.Dropdown.getOrCreateInstance(toggle).toggle();
      }
    });
  });
})(bootstrap);


</script>
<script src="https://raw.githubusercontent.com/dallaslu/bootstrap-5-multi-level-dropdown/master/bootstrap5-dropdown-ml-hack.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>



</body>
</html>
